<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductsAttribute;
use App\Models\ProductsCategories;
use App\Models\ProductsImages;
use App\Http\Resources\ProductCollection;
use Illuminate\Database\Eloquent\Collection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->all());
        // $products = Product::all();
        // $products = Product::with('attributes', 'categories', 'images')->get();
        // $products = Product::with('attributes', 'categories', 'images')->orWhere('name', 'Color')->get();
        // $products = Product::whereHas("attributes", function ($query) {
        //     $query->where('value', 'red');
        // });

        $products = Product::whereHas('attributes', function ($query) {
            $query->where('value', '128');
        })->whereHas('categories', function ($query) {
            $query->where('name', 'Dell');
        })->get();

        return ProductCollection::collection($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        echo "test";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if ($request->attributes_id) {
            foreach ($request->attributes_id as $key => $attributes_id) {
                ProductsAttribute::create([
                    'product_id' => $product->id,
                    'attributes_id' => $attributes_id,
                ]);
            }
        }

        if ($request->categories_id) {
            foreach ($request->categories_id as $key => $categories_id) {
                ProductsCategories::create([
                    'product_id' => $product->id,
                    'categories_id' => $categories_id,
                ]);
            }
        }

        if ($request->file('images')) {
            foreach ($request->file('images') as $key => $request) {

                $path = Storage::put('public/products', $request);
                ProductsImages::create([
                    'product_id' => $product->id,
                    'url' => $path,
                    'weight' => '55kg',
                    'height' => '190cm',

                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Product::where('id', $id)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);

        if ($request->attributes_id) {
            ProductsAttribute::where('product_id', $id)->delete();
            foreach ($request->attributes_id as $key => $attributes_id) {
                ProductsAttribute::create([
                    'product_id' => $id,
                    'attributes_id' => $attributes_id,
                ]);
            }
        }

        if ($request->categories_id) {
            ProductsCategories::where('product_id', $id)->delete();
            foreach ($request->categories_id as $key => $categories_id) {
                ProductsCategories::create([
                    'product_id' => $id,
                    'categories_id' => $categories_id,
                ]);
            }
        }

        if ($request->file('images')) {
            $productImages = ProductsImages::where('product_id', $id);

            foreach ($productImages->get() as $key => $productImage) {
                Storage::delete($productImage->url);
            }
            $productImages->delete();

            foreach ($request->file('images') as $key => $request) {

                $path = Storage::put('public/products', $request);

                $ProductsImages = ProductsImages::create([
                    'product_id' => $id,
                    'url' => $path,
                    'weight' => '55kg',
                    'height' => '190cm',

                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
    }
}
