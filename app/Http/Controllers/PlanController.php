<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\PlanResource;


class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $plans = new Plan();
        if($request->q){
            $plans = $plans->where('name','like',"%{$request->q}%");
        }
        $plans = $plans->paginate(10)->appends(request()->query());
        $plans = PlanResource::collection($plans);
        // return $plans;
        return view('pages.plan.index' ,compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::where('parent_id' , '=' , NULL)->get();
        return view('pages.plan.add' , [ 'category' => $category ]);
        
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
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plan $plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        //
    }
}
