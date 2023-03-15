<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        // $data = User::where('id' , $id)->first();

        $data = User::join('countries' , 'users.country_id'  , '=' , 'countries.id')
        ->leftjoin('files' , 'users.image_id'  , '=' , 'files.id')
        ->where('users.id' , $id)
        ->select('users.id as id' , 'users.first_name', 'users.last_name', 'users.mobile', 'users.email' , 'countries.name' , 'files.file_name', 'files.file_path', 'files.file_size')
        ->first();
        // ->get();
        // dd($data);
        return view('pages.users.overview' , ['user' => $data]);

     }

     public function address($id)
     {
        $data = User::where('id' , $id)->first();

        $result = DB::table('user_addresses')
                    ->join('users', 'users.id' , '=' , 'user_addresses.user_id' )
                    ->where('users.id' , $id)
                    ->first();

        $address = DB::table('addresses')
                ->where('addresses.id' , $result->address_id)
                ->first();
        // dd($result);
        return view('pages.users.address' , ['user' => $data , 'address' =>$address ]);

     }


     public function packages($id)
     {
        $data = User::where('id' , $id)->first();
        // dd($data);
        return view('pages.users.packages' , ['user' => $data]);

     }

     public function items($id)
     {
        $data = User::where('id' , $id)->first();

        // $result = DB::table('item_images')
        //         ->join('users', 'users.id' , '=' , 'user_addresses.user_id' )
        //         ->where('users.id' , $id)
        //         ->first();

        // $item = DB::table('addresses')
        //         ->where('addresses.id' , $result->address_id)
        //         ->first();

        $items = DB::table('items')
                ->join('users', 'users.id' , '=' , 'items.user_id' )
                // ->join('item_images' , 'images.id' , '=' , 'item_images.item_id')
                ->select('items.id as id' , 'users.id' , 'users.first_name', 'users.last_name', 'users.mobile', 'users.email' ,'items.name','items.slug','items.base_url','items.description','items.rent_price','items.security_price')
                ->where('users.id' , $id)
                ->get();

        // dd($items);
        return view('pages.users.items' , ['user' => $data , 'items' => $items]);

     }

     public function reports($id)
     {
        $data = User::where('id' , $id)->first();
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
