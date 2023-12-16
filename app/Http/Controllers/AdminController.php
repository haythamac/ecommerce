<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    //
    public function view_category()
    {
        $data = Category::all();

        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {   
        $data = new Category;

        $data->category_name = $request->category;
        $data->save();

        return redirect()->back()->with('message', 'Category added successfully');
    }

    public function delete_category($id)
    {
        $data = Category::find($id);

        $data->delete();
        return redirect()->back()->with('alert', 'Category deleted successfully');
    }

    public function view_product()
    {
        $category = Category::all();
        return view('admin.product', compact('category'));
    }

    public function add_product(Request $request)
    {
        $data = new Product;

        // Send data to database using
        // database column = tag name format
        $data->title = $request->title;
        $data->description = $request->description;
        $data->quantity = $request->quantity;
        $data->price = $request->price;
        $data->discount_price = $request->discount;
        $data->category = $request->category;


        // image works a bit different
        // get the image -> add time to image to make every image name unique 
        // add the image to a folder named 'product' in public/product. (you need to add the folder manually)
        $image = $request->image;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $imageName);
        $data->image = $imageName;

        $data->save();

        return redirect()->back()->with('message', 'Product added successfully');
    }

}
