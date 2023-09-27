<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function list() {
        return view('users.list');
    }

    public function datatable(?int $limit = null) {
        return response()->json([
            'limit' => $limit,
        ]);
    }

    public function show($id) {
        return view('users.show', [
            'id' => $id,
        ]);

        //compact
        //return view('users.show', compact('id'));
    }
    public function add() {
        return view('users.add');
    }
    public function edit($id) {
        return view('users.edit', [
            'id' => $id
        ]);
    }
    public function delete($id) {
        return "User deleted successfully $id";
    }
    public function addProcess(Request $request) : JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'message' => 'User added successfully',
        ]);
    }
    public function editProcess(Request $request) : JsonResponse 
    {
        return response()->json([
            'status' => 'success',
            'message' => 'User edited successfully'
        ]);
    }

    public function username_show($username) {
        return view('username_show', [
            'username' => $username,
        ]);
    }

    public function cars() {
        return view('admin.cars');
    }
    public function bmw() {
        return view('admin.bmw');
    }
    public function mercedes() {
        return view('admin.mercedes');
    }
    public function honda() {
        return view('admin.honda');
    }
    public function volvo() {
        return view('admin.volvo');
    }

    public function test_post(Request $request) : JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Test post works fine',
        ]);
    }
}
