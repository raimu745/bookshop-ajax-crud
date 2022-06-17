<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ShopController extends Controller
{
    function index(){
        return view('shop');
    }
    function store(Request $request){
        $shop = new Shop();
        $shop->name =  $request->input('name');
        $shop->city =  $request->input('city');
        $shop->save();
        
        return json_encode([
            'success'=> $shop
        ]);
    }

    function show(){ 

        $shop = Shop::all();
        $html = view('ajax',compact('shop'))->render();
        return json_encode([
           'fetch'=> $html,
        ]);

    }

     function destroy(Request $request){

         $shop = Shop::find($request->id);
         $shop->delete();
         
         return json_encode([
              'delete'=> 402,
         ]);
     }
     function edit(Request $request){
      $shop = Shop::find($request->id);

      return json_encode([
         'edit'=> $shop
      ]);

     }
     function update(Request $request){
         $shop = Shop::where('id',$request->id)->update([
             'name' =>$request->name,
             'city'=> $request->city
         ]);
        
         return json_encode([
            'update'=> $shop
         ]);
     }

}
