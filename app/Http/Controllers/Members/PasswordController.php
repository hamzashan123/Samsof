<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function edit(Request $request)
    {
        return view('members.password', [
            'member' => $request->user(),
        ]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'password' => ['required', 'min:8'],
        ]);

        $request->user()->update([
            'password' => Hash::make($request->get('password')),
        ]);
    }
}
