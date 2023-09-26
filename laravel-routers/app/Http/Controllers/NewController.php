<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewController extends Controller
{
    public function actions($id) {
        return "Actions id $id";
    }

    public function test_user() {
        return view('test_user', [
            'username' => "Jani",
        ]);
    }
}
