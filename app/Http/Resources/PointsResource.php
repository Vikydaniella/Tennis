<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PointsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => (string)$this->id,
            'type' => 'Points',
            'attributes'=> [
                'tournament_name'=> $this->tournament_name,
                'win_points'=> $this->win_points,
                'draw_points'=> $this->draw_points,
                'loss_point'=> $this->loss_point,
                'created_at'=> $this->created_at,
                'updated_at'=> $this->updated_at
            ]];
    }
}
