<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Reply;

class Comment extends JsonResource
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
            'comment'=>$this->comment,
            'username'=>$this->user->name,
            'comment_id'=>$this->id,
            'replies'=>Reply::collection($this->replies),
        ];
    }
}
