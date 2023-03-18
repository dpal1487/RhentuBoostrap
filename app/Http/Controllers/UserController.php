<?php

namespace App\Http\Controllers;

use App\Http\Resources\AddressResource;
use App\Http\Resources\ItemResource;
use App\Http\Resources\UserResource;
use App\Models\Address;
use App\Models\Item;
use App\Models\ItemStatus;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use DataTables;
use DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public $data;
    public function index()
    {
        $data = User::latest()->get();
        return view('pages.users.view' , ['result' =>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */

     public function overview($id)
     {
        $data = User::find($id);

        return view('pages.users.overview')->with('data', new UserResource($data));

     }

     public function address($id)
     {
        $data = User::find($id);
        $address = UserAddress::where('user_id',$id)->first();
        return view('pages.users.address' )->with(['user' => $data , 'address' => new AddressResource($address)]);
     }

     public function items( $id)
     {
        $data = User::find($id);

        $itemStatus = ItemStatus::all();

        $item = Item::where(['user_id'=>$id])->get();

        return view('pages.users.items' , ['user' => $data , 'itemstatus' => $itemStatus , 'items' => ItemResource::collection($item)]);

     }

     public function updateStatus(Request $request)
     {
     // dd($request);
         $item = Item::find($request->item_id);
         $item->status_id = $request->itemstatus_id;
         $item->update();
         return response()->json(['success'=>'Status change successfully.']);
     }



     public function packages($id)
     {
        $data = User::find($id);
        // dd($data);
        return view('pages.users.packages' , ['user' => $data]);
     }





     public function reports($id)
     {
        $data = User::find($id);

        // dd($data);
        return view('pages.users.reports' , ['user' => $data]);

     }


    public function create()
    {
        //
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
    public function show(User $user , $id)
    {
        return view('pages.users.overview',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
