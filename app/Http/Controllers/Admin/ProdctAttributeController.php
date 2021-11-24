<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ProductAttribute;
use App\Http\Controllers\Controller;

class ProdctAttributeController extends Controller
{
    public function store($attributes , $product)
    {
        foreach($attributes as $key => $attribute){
            ProductAttribute::create([
                'product_id' => $product->id,
                'attribute_id' => $key,
                'value' => $attribute,
            ]);
        }
    }
}
