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

class CategoryController extends Controller
{

    public function index (Request $request)
    {
        $categories = new Category();
        if($request->q){
            $categories = $categories->where('name','like',"%{$request->q}%");
        }
        $categories = $categories->paginate(10)->appends(request()->query());
        $categories = CategoryResource::collection($categories);

        // return $categories;
        return view('pages.category.index' ,compact('categories'));
    }
    public function create ()
    {
        $categoryParent = Category::where('parent_id' , '=' , NULL)->get();
        return view('pages.category.add' , [ 'categoryParent' => $categoryParent ]);
    }

    public function store(CategoryRequest $request )
    {

        // dd($request);
        $user = Auth::user();
        $input = $request->all();
        $meta = Meta::create([
            'description'=>$request->meta_description,
            'tag' => $request->meta_tag ,
            'keywords' => $request->meta_keywords,
        ]);

        $meta_id = $meta->id;

        $category = Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->category_description,
            'keywords' => $request->keywords,
            'parent_id' =>$request->parent_id,
            'meta_id' =>$meta_id,
            'image_id' =>$request->image,
        ]);

        $banner_image = $request->file('banner_image');
        // dd($banner_image);
        if($banner_image) {
                $extension = $request->banner_image->extension();
                $file_path = 'assets/image/banner';
                $name = time().'_'.$request->banner_image->getClientOriginalName();
                $result= Image::make($banner_image)->save($file_path.$name);

                $smallthumbnail = date('mdYHis'). '-' . uniqid() . '.' . '_small_'. '.' .$extension;
                $mediumthumbnail = date('mdYHis'). '-' . uniqid() . '.' . '_medium_' . '.' .$extension;

                $smallThumbnailFolder = 'assets/image/banner/thumbnail/small/';
                $mediumThumbnailFolder = 'assets/image/banner/thumbnail/medium/';

                $result = $result->save($file_path.'/original/'.$name);

                $result->resize(200,200);
                $result = $result->save($file_path.'/thumbnail/small/'.$smallthumbnail);

                $result->resize(100,100);
                $result = $result->save($file_path.'/thumbnail/medium/'.$mediumthumbnail);

                $BannerImage = CategoryImage::create([
                    'name' => $name,
                    'small_path' => url($file_path.$name),
                    'medium_path' => url($smallThumbnailFolder.$smallthumbnail),
                    'large_path' => url($mediumThumbnailFolder.$mediumthumbnail),
                ]);

                if($BannerImage->save())
                {
                    $CategoryBanner = CategoryBanner::create(
                        [
                            'category_id' => $category->id ,
                            'imager_id' => $BannerImage->id ,
                            'order_by' => $user->id ,
                        ]);
                }
            }
                return response()->json(['success'=>true,'message'=>'Category created successfully']);


            // return redirect('category')->with('success' , 'Category data added successfully');
    }

    public function edit($id)
    {
        $categoryParent = Category::where('parent_id' , '=' , NULL)->get();
        $category = Category::find($id);


        $category =new CategoryResource($category);

        // $categoryparent_id = Category::where('parent_id' , '=' , $category->parent_id)->find($id);

        // return $category;

        // dd($categoryparent_id);
        return view('pages.category.edit' , [ 'categoryParent' => $categoryParent,'category'=>$category ]);
    }

    public function show($id)
    {
        $categoryParent = Category::where('parent_id' , '=' , NULL)->get();
        $category = Category::find($id);
        return view('pages.category.edit' , [ 'categoryParent' => $categoryParent,'category'=>$category ]);
    }
}
