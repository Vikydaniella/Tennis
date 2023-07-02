<?php

namespace App\Http\Controllers;

use App\Http\Requests\FriendsRequest;
use App\Mail\FriendRequest;
use App\Models\Friend;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Http\Resources\FriendResource;

class FriendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    public function index()
    {
        return FriendResource::collection(User::all());
    }

    public function store(FriendRequest $request, $name)
    {
        $user = User::findOrFail($name);
        if($user){
            Mail::to($request->user())->send(new FriendRequest($user));
            return response()->json([
                'status' => 200,
                'message' => 'Friend Request sent',
                'data' => $user
            ]);
        }
        return response()->json([
            'status' => 500,
            'message' => 'Can not send friend request'
        ]); 
    }

    public function show(Friend $friend, $name)
    {
        $user = User::findOrFail($name);
        if($user){
           
        }

    }

    public function update(FriendRequest $request, Friend $friend, $name)
    {
        $friend = User::findOrFail($name);
        if($friend){
            $friend->update([
                $request->name
            ]);
            return response()->json([
            'status' => 200,
            'message' => 'Friend request updated successfully',
            'data' => $friend,
            ]);
    }
        return response()->json([
            'status' => 500,
            'message' => 'Can not update friend request',
        ]);
    }

    public function destroy(Friend $friend, $name)
    {
        $friend = User::findOrFail($name);
        if ($friend){
            $friend->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Friend request deleted successfully',
                'data' => $friend,
            ]);
    }
        return response()->json([
            'status' => 500,
            'message' => 'Can not delete friend request',
        ]);
    }
}
