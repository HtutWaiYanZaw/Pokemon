<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\SubType;
use App\Models\SuperType;
use App\Models\Type;
use App\Models\Resistance;
use App\Models\Weakness;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Card::select(
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
            ->get();

        // dd($data);

        return view('admin.project.cards.index')
            ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $superTypes = SuperType::get();
        $subTypes = SubType::get();
        $types = Type::get();
        $resistances = Resistance::get();
        $weaknesses = Weakness::get();

        return view('admin.project.cards.create')
            ->with('supertypes', $superTypes)
            ->with('subtypes', $subTypes)
            ->with('types', $types)
            ->with('resistances', $resistances)
            ->with('weaknesses', $weaknesses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'photo' => 'required|image|mimes:png,jpg,jpeg,svg',
                'price' => 'required',
                'qty' => 'required',
                'hp' => 'required',
                'status' => 'required',
                'superType_id' => 'required',
                'subType_id' => 'required',
                'type_id' => 'required',
                'resistance_id' => 'required',
                'weakness_id' => 'required'
            ]
        );
        if ($validator->fails()) {
            return redirect('admin/cards/create')
                ->withErrors($validator);
            // ->withInputs();
        }


        $imagePath = $request->file('photo')->store('cards', 'public');

        $cards =  new Card;
        $cards['name'] = $request->name;
        $cards['photo'] = $imagePath;
        $cards['price'] = $request->price;
        $cards['qty'] = $request->qty;
        $cards['hp'] = $request->hp;
        $cards['status'] = $request->status;
        $cards['superType_id'] = $request->superType_id;
        $cards['subType_id'] = $request->subType_id;
        $cards['type_id'] = $request->type_id;
        $cards['resistance_id'] = $request->resistance_id;
        $cards['weakness_id'] = $request->weakness_id;
        $cards['created_at'] = Carbon::now();
        $cards['updated_at'] = Carbon::now();
        // $cards->touch();
        $cards->save();


        session()->flash('message', "You saved the record successfully.");

        return redirect('admin/cards');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        $data = Card::select(
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
            ->where('cards.id', $card->id)
            ->first();

        // dd($data);

        return view('admin.project.cards.show')
            ->with('card', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        $superTypes = SuperType::get();
        $subTypes = SubType::get();
        $types = Type::get();
        $resistances = Resistance::get();
        $weaknesses = Weakness::get();
        return view('admin.project.cards.edit')
            ->with('supertypes', $superTypes)
            ->with('subtypes', $subTypes)
            ->with('types', $types)
            ->with('resistances', $resistances)
            ->with('weaknesses', $weaknesses)
            ->with('cards', $card);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'price' => 'required',
                'qty' => 'required',
                'hp' => 'required',
                'status' => 'required',
                'superType_id' => 'required',
                'subType_id' => 'required',
                'type_id' => 'required',
                'resistance_id' => 'required',
                'weakness_id' => 'required'
            ]
        );
        if ($validator->fails()) {
            return redirect('admin/cards/create')
                ->withErrors($validator);
            // ->withInputs();
        }




        $cards = [];
        $cards['name'] = $request->name;

        $cards['price'] = $request->price;
        $cards['qty'] = $request->qty;
        $cards['hp'] = $request->hp;
        $cards['status'] = $request->status;
        $cards['superType_id'] = $request->superType_id;
        $cards['subType_id'] = $request->subType_id;
        $cards['type_id'] = $request->type_id;
        $cards['resistance_id'] = $request->resistance_id;
        $cards['weakness_id'] = $request->weakness_id;
        $cards['created_at'] = Carbon::now();
        $cards['updated_at'] = Carbon::now();
        // $cards->touch();

        Card::where('id',$card->id)->update($cards);


        session()->flash('message', "You updates the record successfully.");

        return redirect('admin/cards');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        Storage::delete('public/' . $card->photo);
        Card::where('id',$card->id)->delete();
    }
}
