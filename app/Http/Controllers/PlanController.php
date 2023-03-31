<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\PlanResource;
use Illuminate\Support\Facades\Validator;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $plans = new Plan();
        if ($request->q) {
            $plans = $plans->where('name', 'like', "%{$request->q}%");
        }
        $plans = $plans->paginate(10)->appends(request()->query());
        $plans = PlanResource::collection($plans);
        // return $plans;
        return view('pages.plan.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::where('parent_id', '=', null)->get();
        return view('pages.plan.add', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category' => 'required',
            'amount' => 'required',
            'currancy' => 'required',
            'no_of_ads' => 'required',
            'discount' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'success' => false,
                    'message' => $validator->errors()->first(),
                ],
                400,
            );
        }

        // return Plan::create();
        $plan = Plan::create([
            'name' => $request->name,
            'category_id' => $request->category,
            'amount' => $request->amount,
            'currancy' => $request->currancy,
            'no_of_ads' => $request->no_of_ads,
            'expires_in_days' => $request->expires_in_days,
            'discount' => $request->discount,
            'status' => $request->status,
            'description' => $request->description,
        ]);

        return response()->json(['success' => true, 'message' => 'Plan created successfully']);
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
        $categoryParent = Category::where('parent_id', '=', null)->get();
        $category = Category::find($id);
        $category = new CategoryResource($category);
        // return $category;
        return view('pages.category.edit', ['categoryParent' => $categoryParent, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plan $plan)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all(),
            ]);
        }
        // dd($request);

        $category = Category::find($id);
        if ($category) {
            $meta = Meta::where(['id' => $category->meta_id])->update([
                'description' => $request->meta_description,
                'tag' => $request->meta_tag,
                'keywords' => $request->meta_keywords,
            ]);
            $category = Category::where(['id' => $id])->update([
                'name' => $request->name,
                'slug' => $request->name,
                'description' => $request->category_description,
                'keywords' => $request->keywords,
                'parent_id' => $request->parent_id,
                // 'meta_id' =>$meta->id,
                'image_id' => $request->image,
            ]);

            $CategoryBanner = CategoryBanner::where(['category_id' => $id])->update([
                'category_id' => $id,
                'image_id' => $request->banner_id,
            ]);
            return response()->json(['success' => true, 'message' => 'Plan Updated successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        $category = Category::find($id);
        $category = new CategoryResource($category);
        // dd($category->image);
        if ($category->delete()) {
            return response()->json(['success' => true, 'message' => 'Plan has been deleted successfully.']);
        }
        return response()->json(['success' => false, 'message' => 'Opps something went wrong!'], 400);
    }
}
