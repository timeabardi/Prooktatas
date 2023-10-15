<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishController extends Controller {
    public function index() {
        return view('wishlist.index', [
            'page' => 'wishlist'
        ]);
    }
    public function count() {
        return response()->json([
            'count' => 8
        ]);
    }

    public function add(Request $request) {
        return response()->json([
            'status' => 'succes',
            'message' => 'Termék hozzáadva a kívánságlistához'
        ]);
    }

    public function remove($id) {
        return response()->json([
            'status' => 'succes',
            'message' => 'Termék törölve a kívánságlistából'
        ]);
    }
}