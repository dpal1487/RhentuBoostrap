<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\ItemStatus;
use Illuminate\Http\Request;
use App\Http\Resources\ItemResource;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $title = "Item Details";
        // $data = User::find($id);

        $itemStatus = ItemStatus::all();

        $item = Item::simplePaginate(3);

        return view('pages.item.index' , [ 'title' => $title ,'itemstatus' => $itemStatus , 'items' => ItemResource::collection($item)]);
        // return view('pages.item.index' , ['result' =>$data]);
        // return view('pages.item.index');
    }

     public function updateStatus(Request $request)
        {

        // dd($request);
            $item = Item::find($request->item_id);
            $item->status_id = $request->itemstatus_id;
            $item->update();
            return response()->json(['success'=>'Status change successfully.']);
        }

        public function items( $id)
        {
           $title = "Item Details";
           $data = User::find($id);

           $itemStatus = ItemStatus::all();

           $item = Item::where(['user_id'=>$id])->get();

           return view('pages.users.items' , ['title' => $title ,'user' => $data , 'itemstatus' => $itemStatus , 'items' => ItemResource::collection($item)]);

        }

    /**
     * Show the form for creating a new resource.
     */
    public function details($id)
    {
        $title = "Item Details";
        $item = Item::where(['id' => $id])->get();

        return view('pages.item.details' , ['title' => $title , 'itemdetails' => ItemResource::collection($item)]);
    }

}
