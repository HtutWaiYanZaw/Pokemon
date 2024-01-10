<?php

namespace App\Http\Controllers\Api\ShoppingCart;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use App\Models\Card;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{

    public function index(Request $request)
    {
        $user = $request->user();

        $cardsInCart = $user->shoppingCart()->with('card.superType', 'card.subType', 'card.type', 'card.resistance', 'card.weakness')->get();

        $result = $cardsInCart->pluck('card');

        return response()->json(['data' => $result]);
    }

    public function addToCart(Request $request, $cardId)
    {
        if (!$user = auth()->user()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        $card = Card::find($cardId);
        // dd($card);
        if (!$card) {
            return response()->json(['error' => 'Card not found.'], 404);
        }

        $user = auth()->user();
        if ($user->shoppingCart()->where('card_id', $cardId)->exists()) {
            return response()->json(['error' => 'Card is already in the cart.'], 400);
        }

        $user->shoppingCart()->create(['card_id' => $cardId]);

        $card->update(['status' => 'selected']);

        return response()->json([
            'message' => 'Card added to the shopping cart successfully.',
            'cart' => $user->shoppingCart,
        ]);
    }

    public function removeFromCart(Request $request, $cardId)
    {
        $user = $request->user();

        $cartEntry = $user->shoppingCart()->where('card_id', $cardId)->first();

        if (!$cartEntry) {
            return response()->json(['error' => 'Card not found in the shopping cart.'], 404);
        }

        $cartEntry->delete();

        return response()->json(['message' => 'Card removed from the shopping cart.']);
    }

    public function checkout()
    {
        $user = auth()->user();

        $shoppingCartItems = $user->shoppingCart;

        if ($shoppingCartItems->isEmpty()) {
            return response()->json(['message' => 'Shopping cart is empty. Nothing to checkout.'], 400);
        }

        $totalPrice = 0;

        foreach ($shoppingCartItems as $cartItem) {
            $totalPrice += $cartItem->card->price;
        }

        // Clear the shopping cart after checkout
        $user->shoppingCart()->delete();

        return response()->json([
            'message' => 'Checkout successful.',
            'total_price' => $totalPrice,
        ]);
    }
}
