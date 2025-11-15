<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

                 // CREATE  and store a product in Database product table
    public function store(Request $request) 
    {
         // validation
         $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
         ]);
         // save to database  (get all data from request and store in product table)
         Product::create($request->all());
         // redirect back with success message
         return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }


             //\* READ from products table and show in view  *\\/
   public function index($id = null) {
         $products = Product::all(); // Product::all SELECT * FROM product
         return view('products.index', compact('products'));  // find a file in resources/views/products/index.blade.php because path is producr.index
   }
 // $product will be collection (eg. array of product objects)
             
                 // * UPDATE - edit product from list and update in database *//
   public function edit($id) {
         $product = Product::findOrFail($id);                         // find product by id or fail if not foundw
         return view('products.edit', compact('product'));      // load edit view with product data
   }
   
   public function update(Request $request, $id) 
    {
         $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
         ]);
      
         $product = Product::findOrFail($id);   // find product by id or fail if not found
         $product->update($request->all());     // update product with all requesr data

         return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }

                 // * DELETE *//
   public function  destroy($id) {
         $product = Product::findOrFail($id);  
         $product->delete();                  
         return redirect()->back()->with('succes', 'Product delete successfully');      
   }
}