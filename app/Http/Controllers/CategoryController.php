<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\CategoryImage;
use Image;
use App\Models\Meta;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
// use Intervention\Image\Image;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{

    public function index ()
    {

        $title = "Category";
        return view('pages.category.view' , ['title' => $title]);
    }
    public function create ()
    {
        $categoryParent = Category::where('parent_id' , '=' , NULL)->get();

        // echo($image);
        // exit();

        $title = "Category";
        return view('pages.category.add' , ['title' => $title , 'categoryParent' => $categoryParent ]);
    }

    public function uploadImages(Request $request)
    {

        $user = Auth::user();
        // dd($user->id);
        $image = $request->file('file');
        // dd($image);
        if($image) {
                $extension = $request->file->extension();
                $file_path = 'assets/image/category';
                $name = time().'_'.$request->file->getClientOriginalName();

            //   dd($name);
                $result= Image::make($image)->save($file_path.$name);

                // dd($result);
                $smallthumbnail = date('mdYHis'). '-' . uniqid() . '.' . '_small_'. '.' .$extension;
                $mediumthumbnail = date('mdYHis'). '-' . uniqid() . '.' . '_medium_' . '.' .$extension;

                $smallThumbnailFolder = 'assets/image/category/thumbnail/small/';
                $mediumThumbnailFolder = 'assets/image/category/thumbnail/medium/';

                $result = $result->save($file_path.$name);

                $result->resize(200,200);
                $result = $result->save($file_path.'/thumbnail/small/'.$smallthumbnail);

                $result->resize(100,100);
                $result = $result->save($file_path.'/thumbnail/medium/'.$mediumthumbnail);

                $Imagefile = CategoryImage::create([
                    'name' => $name,
                    'small_path' => url($file_path.$name),
                    'medium_path' => url($smallThumbnailFolder.$smallthumbnail),
                    'large_path' => url($mediumThumbnailFolder.$mediumthumbnail),
                ]);
                if($Imagefile->save())
                {
                    User::where('id',$user->id)->update(['image_id'=>$Imagefile->id]);
                }
                    $user = User::where('id',$user->id)->with('image')->first();
                    return response()->json(['success'=>true,'image_id'=>$Imagefile->id]);
            }
    }

    public function store(CategoryRequest $request )
    {
        // dd($request);

        $input = $request->all();

        $meta = Meta::create([
            'description'=>$request->meta_description,
            'tag' => $request->meta_tag ,
            'keywords' => $request->meta_keywords,
        ]);

        $meta_id = $meta->id;

        // dd($meta_id);

        $category = Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'keywords' => $request->keywords,
            'parent_id' =>$request->parent_id,
            'meta_id' =>$meta_id,
            'image_id' =>$request->image_id,
        ]);

        $banner_image = $request->file('banner_image');
        // dd($image);
        if($banner_image) {
                $extension = $request->file->extension();
                $file_path = 'assets/image/category';
                $name = time().'_'.$request->file->getClientOriginalName();

            //   dd($name);
                $result= Image::make($banner_image)->save($file_path.$name);

                // dd($result);
                $smallthumbnail = date('mdYHis'). '-' . uniqid() . '.' . '_small_'. '.' .$extension;
                $mediumthumbnail = date('mdYHis'). '-' . uniqid() . '.' . '_medium_' . '.' .$extension;

                $smallThumbnailFolder = 'assets/image/category/thumbnail/small/';
                $mediumThumbnailFolder = 'assets/image/category/thumbnail/medium/';

                $result = $result->save($file_path.$name);

                $result->resize(200,200);
                $result = $result->save($file_path.'/thumbnail/small/'.$smallthumbnail);

                $result->resize(100,100);
                $result = $result->save($file_path.'/thumbnail/medium/'.$mediumthumbnail);

                $Imagefile = CategoryImage::create([
                    'name' => $name,
                    'small_path' => url($file_path.$name),
                    'medium_path' => url($smallThumbnailFolder.$smallthumbnail),
                    'large_path' => url($mediumThumbnailFolder.$mediumthumbnail),
                ]);
                if($Imagefile->save())
                {
                    User::where('id',$user->id)->update(['image_id'=>$Imagefile->id]);
                }
                    $user = User::where('id',$user->id)->with('image')->first();
                    return response()->json(['success'=>true,'image_id'=>$Imagefile->id]);
            }

            return redirect()->back();
    }

    public function edit()
    {
        $title = "Category";
        return view('pages.category.edit' , ['title' => $title]);
    }
}
