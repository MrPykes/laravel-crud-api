<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'product_attributes', 'product_id', 'attributes_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'categories_id');
    }
    public function images()
    {
        return $this->hasMany(ProductImages::class);
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($class) { // before delete() method call this
            if ($class->images()->count()) {
                $class->images()->each(function ($images) {
                    Storage::delete($images->url);
                });
            }
        });
    }
}
