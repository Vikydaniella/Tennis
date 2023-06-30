<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResultsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => (string)$this->id,
            'type' => 'Results',
            'attributes'=> [
                'tournament_name'=> $this->tournament_name,
                'player_one_score'=> $this->player_one_score,
                'player_two_score'=> $this->player_two_score,
                'winner'=> $this->winner,
                'created_at'=> $this->created_at,
                'updated_at'=> $this->updated_at
            ]];
    }
}
