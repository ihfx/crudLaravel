<?php

namespace App\Http\Resources\api;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // Retorna apenas os campos pre definidos e caso não exista os campos retona array vazio
        try {
            $result = [
                'id' => $this->id,
                'description' => $this->description,
                'price' => $this->price
            ];
    
            return $result;
        } catch (\Exception $e) {
            return [];
        }

        
    }
}
