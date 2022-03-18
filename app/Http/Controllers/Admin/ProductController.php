<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Add View and insertion
    protected function add(){
        $category = Category::all();
        return view('admin.product.add', compact('category'));
    }
    protected function insert(Request $request){
        $product = new Product();
        $product->cat_id = $request->input('cat_id');
        $product->name = $request->input('name');
        $product->image = $request->input('image');
        $product->brief = $request->input('brief');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->save();
        return redirect('/products')->with('success' , $product->name.' is added successfully!');
    }
    /////////////////////////////////////////////////////////

    // Edit View and updating

    public function edit($id){
        $product = Product::find($id);
        $category = Category::all();
        return view('admin.product.edit', compact('product','category'));
    }

    public function update(Request $request ,$id){
        $product = Product::findOrFail($id);
        $product->cat_id = $request->input('cat_id');
        $product->name = $request->input('name');
        $product->image = $request->input('image');
        $product->brief = $request->input('brief');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->update();
        return redirect('/products')->with('success', $product->name.' is updated successfully!');
    }

    ///////////////////////////////////////////////////////

    // Deleting

    public function destroy($id){
        $product = Product::find($id);
        $product->delete();
        return redirect('/products')->with('success', $product->name.' is deleted successfully!');
    }
}
