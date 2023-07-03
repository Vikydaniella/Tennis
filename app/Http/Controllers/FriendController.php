<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\FriendRequest;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\FriendResource;


class FriendController extends Controller
{
    public function index()
    {
        return FriendResource::collection(User::all());
    }

    public function inviteFriend(FriendRequest $request, User $user)
    {
        $user = [
            'title' => 'Tournament Invitation',
            'body' => 'Hi there, could you join my tournament. Let us play.'
        ];
        Mail::to($request->user())->send(new FriendRequest($user));
   
        return response()->json([
            'status' => 200,
            'message' => 'Friend Request sent',
            'data' => $user
        ]);
    }
}
