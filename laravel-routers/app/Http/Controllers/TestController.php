<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller {

        private $name = 'Rizky Khapdvdc';
    public function index() {
        return 'Test Controller';
    }

    public function showUser() {
        return $this->name;
    }

}