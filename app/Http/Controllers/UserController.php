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
        $title = "User Details";
        $data = User::latest()->get();
        return view('pages.users.view' , ['title' => $title ,'result' =>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */

     public function overview($id)
     {
        $title = "User Overview";
        $data = User::find($id);

        return view('pages.users.overview')->with(['title' =>  $title , 'data' => new UserResource($data)]);

     }

     public function address($id)
     {
        $title = "User Address";
        $data = User::find($id);
        $address = UserAddress::where('user_id',$id)->first();
        return view('pages.users.address' )->with(['title' => $title ,'user' => $data , 'address' => new AddressResource($address)]);
     }

     public function items( $id)
     {
        $title = "Item Details";
        $data = User::find($id);

        $itemStatus = ItemStatus::all();

        $item = Item::where(['user_id'=>$id])->simplePaginate(3);

        return view('pages.users.items' , ['title' => $title ,'user' => $data , 'itemstatus' => $itemStatus , 'items' => ItemResource::collection($item)]);

     }

     public function updateStatus(Request $request)
     {
         $item = Item::find($request->item_id);
         $item->status_id = $request->itemstatus_id;
         $item->update();
         return response()->json(['success'=>'Status change successfully.']);
     }



     public function packages($id)
     {
        $title = "Item Package";
        $data = User::find($id);
        // dd($data);
        return view('pages.users.packages' , ['title' => $title ,'user' => $data]);
     }





     public function reports($id)
     {
        $title = "Item Report";
        $data = User::find($id);

        // dd($data);
        return view('pages.users.reports' , ['title' => $title ,'user' => $data]);

     }


}
