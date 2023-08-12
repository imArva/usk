<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function showMembers() {
        return view('members', [
            'members' => User::where('isMember', '1')->get(),
        ]);
    }

    public function showMember(User $user) {
        if (!$user->isMember) {
            return abort(404);
        }

        return view('member', [
            'member' => $user
        ]);
    }

    public function addMember() {
        return view('addmember', [
            'users' => User::where('isMember', '0')->get(),
        ]);
    }
}
