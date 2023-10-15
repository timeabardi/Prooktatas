<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller {
    public function index() {
        return view('cart.index', [
            'page' => 'cart'
        ]);
    }
    public function count() {
        return response()->json([
            'count' => 10
        ]);
    }

    public function add(Request $request) {
        return response()->json([
            'status' => 'succes',
            'message' => 'Termék hozzáadva a kosárhoz'
        ]);
    }

    public function update(Request $request) {
        return response()->json([
            'status' => 'succes',
            'message' => 'Termék frissítve a kosárban'
        ]);
    }

    public function remove($id) {
        return response()->json([
            'status' => 'succes',
            'message' => 'Termék törölve a kosárból'
        ]);
    }
}