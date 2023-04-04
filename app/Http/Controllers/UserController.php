<?php

namespace App\Http\Controllers;

use App\Http\Resources\AddressResource;
use App\Http\Resources\ItemResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\ReviewResource;
use App\Models\Address;
use App\Models\Item;
use App\Models\ItemStatus;
use App\Models\User;
use App\Models\UserReview;


use App\Models\UserAddress;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Illuminate\Contracts\Pagination\Paginator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public $data;
    public function index(Request $request)
    {

        $users = new User();
        if($request->q){
            $users = $users->where('name','like',"%{$request->q}%");
        }
        $users = $users->paginate(10)->appends(request()->query());
        // $data = User::latest()->paginate(10);
        return view('pages.user.index' , ['result' =>$users]);
    }

    /**
     * Show the form for creating a new resource.
     */

     public function overview($id)
     {
        $title = "User Overview";
        $data = User::find($id);

        return view('pages.user.overview')->with(['title' =>  $title , 'user' => new UserResource($data)]);

     }

     public function address($id)
     {
        $title = "User Address";
        $data = User::find($id);
        $address = UserAddress::where('user_id',$id)->first();
        return view('pages.user.address' )->with(['title' => $title ,'user' => $data , 'address' => new AddressResource($address)]);
     }

     public function items( $id)
     {
        $title = "Item Details";
        $data = User::find($id);

        $itemStatus = ItemStatus::all();

        $item = Item::where(['user_id'=>$id])->simplePaginate(3);

        return view('pages.user.items' , ['title' => $title ,'user' => $data , 'itemstatus' => $itemStatus , 'items' => ItemResource::collection($item)]);

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
        return view('pages.user.packages' , ['title' => $title ,'user' => $data]);
     }
     public function reports($id)
     {
        $title = "Item Report";
        $data = User::find($id);
        // dd($data);
        return view('pages.user.reports' , ['title' => $title ,'user' => $data]);

     }

     public function reviews($id)
     {
        $data = User::find($id);
        $review = UserReview::where('user_id',$id)->get();

        $review = ReviewResource::collection($review);
        // return $review;
        return view('pages.user.review' )->with(['user' => $data , 'review' => $review]);

     }


}
