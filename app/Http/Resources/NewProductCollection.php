<?php

namespace App\Http\Resources;

// use Illuminate\Http\Resources\Json\ResourceCollection;

use Illuminate\Http\Resources\Json\JsonResource;

class NewProductCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $attributes = array();
        $categories = array();
        $images = array();
        foreach ($this->attributes as $key => $attribute) {
            $attributes[] = [
                'name' => $attribute->name,
                'value' => $attribute->value
            ];
        }

        foreach ($this->categories as $key => $category) {
            $categories[] = [
                'name' => $category->name,
                'description' => $category->description
            ];
        }

        foreach ($this->images as $key => $image) {
            $images[] = [
                'url' => $image->url,
                'weight' => $image->weight,
                'height' => $image->height
            ];
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'attributes' => $attributes,
            'categories' => $categories,
            'images' => $images,
        ];
    }
}
