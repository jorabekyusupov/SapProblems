<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(15);
        return view('user.index', compact('users'));

    }

    public function update($id, Request $request)
    {
        $data = Validator::make($request->all(), [
            'employee' => 'nullable',
            'is_admin' => 'nullable',
        ])->validated();
        $user = User::findOrFail($id);
        $user->update($data);
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
}
