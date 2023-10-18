<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cartProducts = Cartproduct::whereHas('cart', function ($query) {
            $query->where('session_token', request()->session()->token());
        })->get();

        $cartProducts->transform(function ($cartProduct) {
            $cartProduct->total_price = $cartProduct->totalPrice();
            return $cartProduct;
        });

        return view('cart.index', [
            'page' => 'cart',
            'cart_products' => $cartProducts
        ]);
    }

    public function count()
    {
        return response()->json([
            'count' => CartProduct::whereHas('cart', function($query){
                $query->where('session_token', request()->session()->token());
            })->count()
        ]);
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'quantity' => ['required', 'integer', 'min:1'],
        ], [
            'product_id.required' => 'A termék azonosítója kötelező!',
            'product_id.integer' => 'A termék azonosítója csak szám lehet!',
            'product_id.exists' => 'A termék nem létezik!',
            'quantity.required' => 'A mennyiség kötelező!',
            'quantity.integer' => 'A mennyiség csak szám lehet!',
            'quantity.min' => 'A mennyiség legalább 1 kell legyen!'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 'error',
                'message'=> $validator->errors()->first(),
            ]);
        }

        $cart = Cart::firstorCreate([
            'session_token' => $request->session()->token(),
        ]);

        $cartProduct = CartProduct::where([
            'cart_id' => $cart->id,
            'product_id' => $request->product_id,
            'unit_price' => Product::where('id', $request->product_id)->first()->unitPrice()
        ])->first();

        if($cartProduct){
            $cartProduct->quantity += $request->quantity;
            $cartProduct->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Termék frissítve a kosárban'
            ]);
        }

        $cartProduct = CartProduct::create([
            'cart_id' => $cart->id,
            'product_id' => $request->product_id,
            'unit_price' => Product::where('id', $request->product_id)->first()->unitPrice(),
            'quantity'=> $request->quantity
        ])->first();

        if( ! $cartProduct){
            return response()->json([
                'status'=> 'error',
                'message'=> 'Hiba történt a kosárba helyezés során!',
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Termék hozzáadva a kosárhoz'
        ]);
    }

    public function update(Request $request)
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Termék frissítve a kosárban'
        ]);
    }

    public function remove($id)
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Termék törölve a kosárból'
        ]);
    }
}