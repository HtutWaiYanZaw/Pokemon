<?php

namespace App\Http\Controllers\API\Card;

use App\Http\Controllers\Controller;
use App\Http\Requests\Card\StoreCardRequest;
use App\Http\Requests\Card\UpdateCardRequest;
use App\Http\Resources\CardResource;
use App\Models\Card;
use Illuminate\Http\Request;

class CardApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Card::select(
            'cards.id',
            'cards.name',
            'cards.photo',
            'cards.price',
            'cards.qty',
            'cards.hp',
            'cards.status',
            'super_types.name as super_type_name',
            'sub_types.name as sub_type_name',
            'types.name as type_name',
            'types.photo as type_photo',
            'resistances.name as resistance_name',
            'resistances.photo as resistance_photo',
            'weaknesses.name as weakness_name',
            'weaknesses.photo as weakness_photo'
        )->leftJoin('super_types', 'cards.superType_id', 'super_types.id')
            ->leftJoin('sub_types', 'cards.subType_id', 'sub_types.id')
            ->leftJoin('types', 'cards.type_id', 'types.id')
            ->leftJoin('resistances', 'cards.resistance_id', 'resistances.id')
            ->leftJoin('weaknesses', 'cards.weakness_id', 'weaknesses.id')
            // ->where('status', 'selected')
            ->paginate('10');
        // ->get();
        return CardResource::collection($cards);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCardRequest $request)
    {

        $validated = $request->validated();

        $imagePath = $request->file('photo')->store('card-photos', 'public');

        $card = Card::create([
            'name' => $validated['name'],
            'photo' => $imagePath,
            'price' => $validated['price'],
            'qty' => $validated['qty'],
            'hp' => $validated['hp'],
            'status' => $validated['status'],
            'superType_id' => $validated['superType_id'],
            'subType_id' => $validated['subType_id'],
            'type_id' => $validated['type_id'],
            'resistance_id' => $validated['resistance_id'],
            'weakness_id' => $validated['weakness_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // $card->load(['superType', 'subType', 'type', 'resistance', 'weakness']);
        return response()->json(['message' => 'Record created successfully', 'data' => $card], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cardId)
    {
        $card = Card::select(
            'cards.id',
            'cards.name',
            'cards.photo',
            'cards.price',
            'cards.qty',
            'cards.hp',
            'cards.status',
            'super_types.name as super_type_name',
            'sub_types.name as sub_type_name',
            'types.name as type_name',
            'types.photo as type_photo',
            'resistances.name as resistance_name',
            'resistances.photo as resistance_photo',
            'weaknesses.name as weakness_name',
            'weaknesses.photo as weakness_photo'
        )
            ->leftJoin('super_types', 'cards.superType_id', 'super_types.id')
            ->leftJoin('sub_types', 'cards.subType_id', 'sub_types.id')
            ->leftJoin('types', 'cards.type_id', 'types.id')
            ->leftJoin('resistances', 'cards.resistance_id', 'resistances.id')
            ->leftJoin('weaknesses', 'cards.weakness_id', 'weaknesses.id')
            ->find($cardId);

        if (!$card) {
            return response()->json(['message' => 'Card not found'], 404);
        }

        return new CardResource($card);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cardId)
    {
        $card = Card::find($cardId);
        // dd($card);
        if (!$card) {
            return response()->json(['error' => 'Card not found'], 404);
        }
        $validatedData = $request->validate([
            'name' => 'required|string',
            'photo' => 'nullable|string',
            'price' => 'required|numeric',
            'qty' => 'required|integer',
            'hp' => 'nullable|integer',
            'status' => 'required|string',
            'superType_id' => 'required|exists:super_types,id',
            'subType_id' => 'nullable|exists:sub_types,id',
            'type_id' => 'nullable|exists:types,id',
            'resistance_id' => 'nullable|exists:resistances,id',
            'weakness_id' => 'nullable|exists:weaknesses,id',

        ]);

        $updateResult = $card->update($validatedData);
        if ($updateResult) {
            return response()->json(['message' => 'Card updated successfully', 'data' => $card]);
        } else {
            return response()->json(['error' => 'Failed to update card'], 500);
        }
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cardId)
    {
        $card = Card::find($cardId);
        if (!$card) {
            return response()->json(['error' => 'Card not found'], 404);
        }
        $deleteResult = $card->delete();
        if ($deleteResult) {
            return response()->json(['message' => 'Card deleted successfully']);
        } else {
            return response()->json(['error' => 'Failed to delete card'], 500);
        }
    }

    public function search(Request $request)
    {
        $cards = Card::query();

        if ($request->has('keyword')) {
            $keyword = $request->input('keyword');
            $cards->where('name', 'LIKE', '%' . $keyword . '%');
        }

        $result = $cards->get();

        return response()->json(['data' => $result]);
    }

    public function filter(Request $request)
    {
        $cards = Card::with('superType');
        // dd($cards);
        if ($request->superType) {
            $cards->whereHas('superType', function ($query) use ($request) {
                $query->where('name', $request->superType);
            });
        }
        $result = $cards->select(
             'name', 'photo', 'price', 'qty', 'hp', 'status','superType_id'
        )->get();

        return response()->json(['data' => $result]);
    }
}
