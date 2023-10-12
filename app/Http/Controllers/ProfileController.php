<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    public function update_details(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email,' . Auth::id() . ',id'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        $is_updated = User::find(Auth::id())->update($data);

        if ($is_updated) {
            return back()->with(['success' => 'User details has been successfully updated!']);
        } else {
            return back()->with(['failure' => 'User details has failed to update!']);
        }
    }

    public function update_picture(Request $request)
    {
        $request->validate([
            'picture' => ['required', 'image', 'mimes:png,jpg,jpeg'],
        ]);

        if (!empty(Auth::user()->picture)) {
            unlink('template/img/photos/' . Auth::user()->picture);
        }

        $file_name = "ACI-" . microtime(true) . "." . $request->picture->extension();

        if ($request->picture->move(public_path('template/img/photos'), $file_name)) {
            $data = [
                'picture' => $file_name,
            ];

            $is_updated = User::find(Auth::id())->update($data);

            if ($is_updated) {
                return back()->with(['success' => 'Profile picture has been successfully updated!']);
            } else {
                return back()->with(['failure' => 'Profile picture has failed to update!']);
            }
        } else {
            return back()->with(['failure' => 'Profile picture has failed to upload!']);
        }
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed'],
            'old_password' => ['required'],
        ]);

        if (Hash::check($request->old_password, Auth::user()->password)) {
            $data = [
                'password' => Hash::make($request->password),
            ];

            $is_updated = User::find(Auth::id())->update($data);

            if ($is_updated) {
                return back()->with(['success' => 'User password has been successfully updated!']);
            } else {
                return back()->with(['failure' => 'User password has failed to update!']);
            }
        } else {
            return back()->withErrors(['old_password' => 'Old password does not match with records']);
        }
    }
}
