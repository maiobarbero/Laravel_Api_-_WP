<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;


class ItemController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Item::orderBy('name', 'ASC')
        ->orderBy('date','DESC')
        ->get();
    }
  
    public function type($type){
        $existingItem = Item::where( 'type',$type );
        return $existingItem
        ->orderBy('date','ASC')
        ->get();
    }
 



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        $newItem = new Item;
        $newItem->type = $request->item['type'];
        $newItem->name = $request->item['name'];
        $newItem->date = $request->item['date'];
        $newItem->description = $request->item['description'];
        $newItem->poster = $request->item['poster'];
        $newItem->save();

        return $newItem;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingItem = Item::find( $id );
        if($existingItem){
            $existingItem->delete();
            return "Items deleted";
        }
        return "Item not found";
    }
}