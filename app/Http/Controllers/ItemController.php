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
        // $data = User::find($id);

        $itemStatus = ItemStatus::all();

        $item = Item::simplePaginate(3);

        return view('pages.item.index' , [ 'itemstatus' => $itemStatus , 'items' => ItemResource::collection($item)]);
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
           $data = User::find($id);

           $itemStatus = ItemStatus::all();

           $item = Item::where(['user_id'=>$id])->get();

           return view('pages.users.items' , ['user' => $data , 'itemstatus' => $itemStatus , 'items' => ItemResource::collection($item)]);

        }

    /**
     * Show the form for creating a new resource.
     */
    public function details()
    {
        return view('pages.item.details');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
