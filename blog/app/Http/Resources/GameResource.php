<?php

namespace BayesBall\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id'  =>  $this->id,
            'date'  =>  $this->game_date,
            'visitor'  =>  $this->visitor,
            'home'  =>  $this->home




        ];
    }
}
