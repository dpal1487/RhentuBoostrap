<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use App\Models\Meta;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\CategoryBanner;
// use Intervention\Image\Image;
use App\Http\Requests\CategoryRequest;
use App\Models\Image as CategoryImage;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function index (Request $request)
    {
        $categories = new Category();
        if($request->q){
            $categories = $categories->where('name','like',"%{$request->q}%");
        }
        $categories = $categories->paginate(10)->onEachSide(1)->appends(request()->query());
        $categories = CategoryResource::collection($categories);
        // return $categories;
        return view('pages.category.index' ,compact('categories'));
    }
    public function create ()
    {
        $categoryParent = Category::where('parent_id' , '=' , NULL)->get();
        return view('pages.category.add' , [ 'categoryParent' => $categoryParent ]);
    }

    public function store(Request $request )
    {
        $validator = Validator::make($request->all(), [
            'meta_description' => 'required',
            'meta_tag' => 'required',
            'meta_keywords' => 'required',
            'name' => 'required',
            'category_description' => 'required',
            'keywords' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'message' => $validator->errors()->first()
                    ],400);
        }

        // dd($request);
        $meta = Meta::create([
            'description'=>$request->meta_description,
            'tag' => $request->meta_tag ,
            'keywords' => $request->meta_keywords,
        ]);
        $category = Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->category_description,
            'keywords' => $request->keywords,
            'parent_id' =>$request->parent,
            'meta_id' =>$meta->id,
            'image_id' =>$request->image,
        ]);
        $CategoryBanner = CategoryBanner::create(
            [
                'category_id' => $category->id ,
                'image_id' => $request->banner_id ,
                'order_by' => 1,
            ]);
        return response()->json(['success'=>true,'message'=>'Category created successfully']);

    }

    public function edit($id)
    {
        $categoryParent = Category::where('parent_id' , '=' , NULL)->get();
        $category = Category::find($id);
        $category =new CategoryResource($category);
        // return $category;
        return view('pages.category.edit' , [ 'categoryParent' => $categoryParent,'category'=>$category ]);
    }

    public function show($id)
    {
        $categoryParent = Category::where('parent_id' , '=' , NULL)->get();
        $category = Category::find($id);
        return view('pages.category.edit' , [ 'categoryParent' => $categoryParent,'category'=>$category ]);
    }

    public function update(Request $request , $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                        'error' => $validator->errors()->all()
                    ]);
        }
        // dd($request);

        $category = Category::find($id);
        if($category){
            $meta = Meta::where(['id'=>$category->meta_id])->update([
                'description'=>$request->meta_description,
                'tag' => $request->meta_tag ,
                'keywords' => $request->meta_keywords,
            ]);
            $category = Category::where(['id'=>$id])->update([
                'name' => $request->name,
                'slug' => $request->name,
                'description' => $request->category_description,
                'keywords' => $request->keywords,
                'parent_id' =>$request->parent_id,
                // 'meta_id' =>$meta->id,
                'image_id' =>$request->image,
            ]);





            $CategoryBanner = CategoryBanner::where(['category_id'=>$id])->update(
                [
                    'category_id' => $id ,
                    'image_id' => $request->banner_id ,

                ]);
            return response()->json(['success'=>true,'message'=>'Category Updated successfully']);

        }
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category =new CategoryResource($category);
        // dd($category->image);
        if($category->delete()){
            return response()->json(['success'=>true,'message'=>'Category has been deleted successfully.']);
        }
        return response()->json(['success'=>false,'message'=>'Opps something went wrong!'],400);
    }
}
