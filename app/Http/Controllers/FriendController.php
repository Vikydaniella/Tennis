<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Friend;
use App\Mail\FriendRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\FriendsRequest;
use App\Http\Resources\FriendResource;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

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

    public function store(FriendRequest $request, User $id)
    {
        $user = User::findOrFail($id);
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

    public function show(User $user, $id)
    {
       $user = User::findOrFail($id);
       if($user){
            return response()->json([
            'status' => 200,
            'message' => 'Successful',
            'data' => $user,
            ]);
        }
        return response()->json([
            'status' => 500,
            'message' => 'Can not see tournament'
        ]);  
    }

    public function update(FriendRequest $request, Friend $friend, $name)
    {
        $friend = User::findOrFail($name);
        if($friend){
            $friend->update([
                $request->$name
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

    public function inviteFriend()
    {
        $sender    = createUser();
        $recipient = createUser();
        
        $sender->befriend($recipient);
        
        $this->assertCount(1, $recipient->getFriendRequests());
    }
}
