<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\Models\Product;
use App\Models\Seller;
use File;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();

        return view('products.index' , ['products'=>$products]);
    }

    public function show($productId){
        $products= Product::find($productId);
        return  view('products.show',['products'=>$products] );
    }

    public function updateView($productId){
        $products= Product::find($productId);
        return  view('products.update',['products'=>$products] );
    }

    public function delete($productId){
        Product::where('id',$productId)->delete();
        $products = Product::all();
        return view('products.index' , ['products'=>$products]);
    }
    public function create($category_id){
        $id = Auth::id();
        $category = Category::where('id',$category_id)->first();
        return view('products.create',['seller' =>$id , 'category' => $category ]);
    }


 //category create

    public function createcategory(){
        return view('products.create',['category' => Category::all()]);
    }


    public function createcategories($category_id){
        $id = Auth::id();
        return view('products.createcategories',['seller_id' => $id ]);
    }

    public function storecategory(Request $request){
        $request->validate([
           'name' => 'required'
        ]);
        $requestdata = request()->all();
        $res = Category::create(
            array('name' => $requestdata['name']
            ,'seller_id'=> $requestdata['seller_id']
            )
        );
        return redirect()->route('categories');
    }
//end category create




    public function store(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|unique:products|max:255',
            'description' => 'required',
            'price' => 'required',
            'quantity'  => 'required',
            'image' => 'required'
        ]);
        $file = $request->file('image');
        $savedFile = $file->store('/public/images');
        $requestdata = request()->all();
        $res = Product::create(
            array('name' => $requestdata['name'],
            'description' => $requestdata['description'],
            'price' => $requestdata['price'],
            'quantity' => $requestdata['quantity'],
            'image'=>$savedFile,
            'seller_id'=>$requestdata['seller_id'],
            'categories_id'=>$requestdata['categories_id'],
            )
        );

        return redirect()->route('products.index');
    }
    public function makeUpdate(Request $request){

        $req =  request()->all();
        Product::where('id', $req['id'])->update(
            array('name' => $req['name'],
            'description' => $req['description'],
            'price' => $req['price'],
            'quantity' => $req['quantity'],
            )

        );

        return redirect()->route('products.index');
    }
    public function imageUpload()
    {
        return view('image.upload');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        /* Store $imageName name in DATABASE from HERE */

        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
    }
}
