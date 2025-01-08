<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NavigationController extends Controller
{
    public function showHomePage()
    {
        $users = User::where('id', '!=', Auth::id())->get();

        return view('home', compact('users'));
    }

    public function showFriendsPage()
    {
        $user = Auth::user();

        // Retrieve accepted friends
        $acceptedFriends = Friend::where('status', 'Accepted')
            ->where(function ($query) use ($user) {
                $query->where('sender_id', $user->id)
                      ->orWhere('receiver_id', $user->id);
            })
            ->with(['sender', 'receiver'])
            ->get();

        // Retrieve pending requests sent to the user
        $pendingRequests = Friend::where('status', 'Pending')
            ->where('receiver_id', $user->id)
            ->with('sender')
            ->get();

        return view('friend', compact('acceptedFriends', 'pendingRequests'));
    }

}
