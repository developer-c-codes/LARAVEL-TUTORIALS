<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function index() {
         $products = [
            ['name' => 'Laptop', 'price' => 1500, 'stock' => 12],
            ['name' => 'Phone' , 'price' => 800, 'stock'  => 5],
            ['name' => 'Headphones', 'price' => 120 , 'stock' => 20],
            ['name' => 'Charger', 'price' => 130, 'stock' => 15],
            ['name' => 'usbflash', 'price' => 140, 'stock' => 12]
         ];
         return view('product', ['products' => $products]);
   }
}
