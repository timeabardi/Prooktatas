<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\WishlistProduct;
use App\Models\Product;

class WishController extends Controller {
    public function index() {
        $wishlistProducts = Wishlistproduct::whereHas('wishlist', function ($query) {
            $query->where('session_token', request()->session()->token());
        })->get();

        return view('wishlist.index', [
            'page' => 'wishlist',
            'wishlist_products' => $wishlistProducts
        ]);
    }
    public function count() {
        //'count' => 8
        return response()->json([
            'count' => Wishlistproduct::whereHas('wishlist', function($query){
                $query->where('session_token', request()->session()->token());
            })->count()
        ]);
    }

    public function add(Request $request) {

        $wishlist = Wishlist::firstorCreate([
            'session_token' => $request->session()->token(),
        ]);

        $wishlistProduct = WishlistProduct::where([
            'wishlist_id' => $wishlist->id,
            'product_id' => $request->product_id,
            'unit_price' => Product::where('id', $request->product_id)->first()->unitPrice()
        ])->first();

        if($wishlistProduct){
            $wishlistProduct->save();

            return response()->json([
                'status' => 'success',
                'message' => 'A termék már hozzá lett adva a kívánságlistához'
            ]);
        }

        $wishlistProduct = WishlistProduct::create([
            'wishlist_id' => $wishlist->id,
            'product_id' => $request->product_id,
            'unit_price' => Product::where('id', $request->product_id)->first()->unitPrice()
        ])->first();

        if( ! $wishlistProduct){
            return response()->json([
                'status'=> 'error',
                'message'=> 'Hiba történt a kívánságlistába helyezés során!',
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Termék hozzáadva a kívánságlistához'
        ]);
    }

    public function remove($id) {
        $findproduct = WishlistProduct::find($id);
        if (!$findproduct) {
            return response()->json([
                'status' => 'error',
                'message' => 'Nem található termék a kívánságlistádban'
            ], 404);
        } else {
        $findproduct->delete();
        return response()->json([
            'status' => 'succes',
            'message' => 'Termék törölve a kívánságlistából'
        ]);
        }
    }
}