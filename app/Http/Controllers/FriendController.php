<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\FriendRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\FriendResource;
use App\Http\Requests\FriendshipRequest;

class FriendController extends Controller
{
    public function index()
    {
        return FriendResource::collection(User::all());
    }

   public function inviteFriend(FriendshipRequest $request, int $id)
    {
        $user = $user = User::find($id);
        $user = [
            'title' => 'Tournament Invitation',
            'body' => 'Hi there, could you join my tournament. Let us play.'
            ];
            
        //Mail::to($request->user())->send(new FriendRequest($user));
        
        //return 'Invitation sent';*/
        //$user = Auth::user();
        //echo $user->email;

        Mail::to($request->user())->send(new FriendRequest($user));
        return 'Invitation sent!';
    }
}
