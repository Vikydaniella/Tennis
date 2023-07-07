<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TennisResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => (string)$this->id,
            'type' => 'Tennis',
            'attributes'=> [
                'tournament_name'=> $this->tournament_name,
                'tournament_point'=> $this->tournament_point,
                'number_of_players'=> $this->number_of_players,
                'user_id'=>$this->user_id,
                'created_at'=> $this->created_at,
                'updated_at'=> $this->updated_at
            ]];
    }
}
