<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
    public function createcategories(){
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
    public function categoriesIndex(){
        $categories = Category::all();
        return view('products.categories',['categories' => $categories ]);
    }


    public function updateCategory($categories){
        $categories= Category::find($categories);
        return  view('products.updateCategory',['categories'=>$categories] );
    }
    public function makeUpdateCategory(Request $request){
   
        $req =  request()->all(); 
        Category::where('id', $req['id'])->update(
            array('name' => $req['name'],
            )
        );  
        return redirect()->route('categories');
    }

    public function deleteCategory($categories){
        Category::where('id',$categories)->delete();
        $categories = Category::all();
        return view('categories' , ['categories'=>$categories]);
    }

}


