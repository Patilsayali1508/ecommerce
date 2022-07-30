<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Product;
use App\Models\cart;

class productdetails extends Controller
{

    /* Function for product details to be  store into database*/ 
    function productadd(Request $req){


        
       
        $cover_image=$req->file('cover_image');
        $cover_image_name=rand().'-'.$req->name.'.' .$cover_image->getClientOriginalExtension();
        $cover_image->move(public_path('cover_images'),$cover_image_name);
     
        $images=$req->file('images');
            $imageName='';
            foreach($images as $image){
                
                $newImageName= rand() .'-' .$req->name.'.' .$image->getClientOriginalExtension();
                $image->move(public_path('images'),$newImageName);
                $imageName=$imageName.$newImageName.",";
            }
            $imagedb=$imageName;
           
            
        

            $ProductAdd = new product;
            $ProductAdd->name=$req->name;   
            $ProductAdd->price=$req->price;
            $ProductAdd->images=$imagedb;
            $ProductAdd->cover_image=$cover_image_name;
    
            $ProductAdd->save();
    
            return redirect('/admin');
            	
       
    }

    /* Function for fetching product details from the database*/ 

    function getproductdetails(){
        return $data=DB::table('products')->get();
    
    }
    /* Function for adding  product into the cart */ 

    function addtocart(Request $req){
        $image=$req->file('image');
        $cart_image=rand().'-'.$req->name.'.' .$image->getClientOriginalExtension();
        $image->move(public_path('cover_images'),$cart_image);

       
        
        $CartAdd = new cart;
        $CartAdd->name=$req->name;   
        $CartAdd->price=$req->price;
        $CartAdd->image=$cart_image;   
         $CartAdd->save();
         

    }
        /* Function for fetching cart details from the database*/ 
    function getcartdetails(){
        return  $data=DB::table('cart')->get();
       
       
    }


     /* Consuming http api to render data into view*/ 
    function showproducts(){
       $response=Http::timeout(3)->get('http://127.0.0.1:8000/api/getcartdata');

       return view ('cartlist', ['data' => $response]);

    }
}
