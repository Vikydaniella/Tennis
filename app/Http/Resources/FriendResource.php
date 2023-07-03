<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FriendResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => (string)$this->id,
            'type' => 'User',
            'attributes'=> [
                'name'=> $this->name,
                'email'=> $this->email,
                'email_verified_at'=> $this->email_verified_at,
                'password'=> $this->password,
                'remember_token'=> $this->remember_token,
                'created_at'=> $this->created_at,
                'updated_at'=> $this->updated_at
            ]];
    }
}
