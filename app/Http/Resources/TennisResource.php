<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TennisResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => (string)$this->id,
            'id' => 'Tennis',
            'attributes'=> [
                'tournament_name'=> $this->tournament_name,
                'tournament_point'=> $this->tournament_point,
                'created_at'=> $this->created_at,
                'updated_at'=> $this->updated_at,
            ]];
    }
}
