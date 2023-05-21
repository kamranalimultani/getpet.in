<?php

namespace App\Http\Controllers\MainSite;
use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function Home()
    {
        $cats=MainCategory::get();
        $randomProducts=Product::limit(10)->inRandomOrder()->get();
        return view('MainSite.Home.index',compact('cats','randomProducts'));
    }
}
