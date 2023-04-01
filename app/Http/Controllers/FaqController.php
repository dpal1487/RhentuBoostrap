<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Models\Category;

use Illuminate\Support\Facades\Validator;
use App\Models\Image as CategoryImage;
use App\Http\Resources\FAQsResource;
use Illuminate\Support\Str;
class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $faqs = new Faq();
        if($request->q){
            $faqs = $faqs->where('name','like',"%{$request->q}%");
        }
        $faqs = $faqs->paginate(10)->appends(request()->query());
        $faqs = FAQsResource::collection($faqs);
        // return $faqs;
        return view('pages.faqs.index' ,compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        // return $categories;
        return view('pages.faqs.add' , [ 'categories' => $categories ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category' => 'required',
            'brand_image' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'message' => $validator->errors()->first()
                    ],400);
        }
        // dd($request);
        $bran = Faq::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category,
            'status' =>$request->status,
            'image_id' =>$request->brand_image,
        ]);

        return response()->json(['success'=>true,'message'=>'Brand created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq , $id)
    {
        $faq = Faq::find($id);
        $faq = new FAQsResource($faq);

        // return $faq;
        return view('pages.faqs.view' , [ 'faq' => $faq ] );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq , $id)
    {
        $categories = Category::get();
        $faq = Faq::find($id);
        $faq =new FAQsResource($faq);
        // return $faq;
        return view('pages.faqs.edit' , [ 'faq' => $faq,'categories'=>$categories ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category' => 'required',
            'brand_image' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                        'error' => $validator->errors()->all()
                    ]);
        }

        $brand = Brand::find($id);
        if($brand){
            $brand = Faq::where(['id'=>$id])->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'category_id' => $request->category,
            'status' =>$request->status,
            'image_id' =>$request->brand_image,
            ]);

            return response()->json(['success'=>true,'message'=>'Brand Updated successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $brand = Faq::find($id);
        $brand =new BrandResource($brand);
        // dd($category->image);
        if($brand->delete()){
            return response()->json(['success'=>true,'message'=>'Brand has been deleted successfully.']);
        }
        return response()->json(['success'=>false,'message'=>'Opps something went wrong!'],400);
    }
}
