<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Egulias\EmailValidator\Warning\Comment;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function create(){
        return view('sellers.create',['seller' => Seller::all() ]);
    }
   
    public function store(Request $request)
    {     
    $seller = Seller::create($request->all());
    return redirect()->route('products.create');
    }
}
