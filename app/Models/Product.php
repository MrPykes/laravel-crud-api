<?php

namespace App\Models;

use App\Http\Controllers\ProductImageController;
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

    // public function __construct($request)
    // {
    //     dd($request);
    // }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'products_attributes', 'product_id', 'attributes_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'products_categories', 'product_id', 'categories_id');
    }
    public function images()
    {
        return $this->hasMany(ProductsImages::class);
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
