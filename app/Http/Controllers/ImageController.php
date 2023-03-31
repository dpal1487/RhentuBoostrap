<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Models\Image as DBImage;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    public function uploadImage(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'image' => 'required|mimes:jpeg,png,jpg'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'message' => $validator->errors()->first()
                    ],400);
        }
        $image = $request->file('image');
        // dd($image);
        if($image) {
                $extension = $request->image->extension();
                $file_path = 'assets/image/category/';
                $name = time().'_'.$request->image->getClientOriginalName();

                $result= Image::make($image)->save($file_path.'original/'.$name);
                $smallthumbnail = date('mdYHis'). '-' . uniqid() . '.' . '_small_'. '.' .$extension;
                $mediumthumbnail = date('mdYHis'). '-' . uniqid() . '.' . '_medium_' . '.' .$extension;

                $smallThumbnailFolder = 'assets/image/category/thumbnail/small/';
                $mediumThumbnailFolder = 'assets/image/category/thumbnail/medium/';

                // $result = $result->save($file_path.'original/'.$name);

                $result->resize(200,200);
                $result = $result->save($file_path.'/thumbnail/small/'.$smallthumbnail);

                $result->resize(100,100);
                $result = $result->save($file_path.'/thumbnail/medium/'.$mediumthumbnail);

                $Imagefile = DBImage::updateOrCreate([
                    'name' => $name,
                    'small_path' => url($file_path.$name),
                    'medium_path' => url($smallThumbnailFolder.$smallthumbnail),
                    'large_path' => url($mediumThumbnailFolder.$mediumthumbnail),
                ]);
                if($Imagefile->save())
                {
                    return response()->json(['data'=>$Imagefile]);
                }
            }
    }

    public function uploadBanner(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|mimes:jpeg,png,jpg'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'message' => $validator->errors()->first()
                    ],400);
        }
        $image = $request->file('image');
        // dd($image);
        if($image) {
                $extension = $request->image->extension();
                $file_path = 'assets/image/banner/';
                $name = time().'_'.$request->image->getClientOriginalName();

                $result= Image::make($image)->save($file_path.'original/'.$name);
                $smallthumbnail = date('mdYHis'). '-' . uniqid() . '.' . '_small_'. '.' .$extension;
                $mediumthumbnail = date('mdYHis'). '-' . uniqid() . '.' . '_medium_' . '.' .$extension;

                $smallThumbnailFolder = 'assets/image/banner/thumbnail/small/';
                $mediumThumbnailFolder = 'assets/image/banner/thumbnail/medium/';

                // $result = $result->save($file_path.'original/'.$name);

                $result->resize(200,200);
                $result = $result->save($file_path.'/thumbnail/small/'.$smallthumbnail);

                $result->resize(100,100);
                $result = $result->save($file_path.'/thumbnail/medium/'.$mediumthumbnail);

                $Imagefile = DBImage::updateOrCreate([
                    'name' => $name,
                    'small_path' => url($file_path.$name),
                    'medium_path' => url($smallThumbnailFolder.$smallthumbnail),
                    'large_path' => url($mediumThumbnailFolder.$mediumthumbnail),
                ]);
                if($Imagefile->save())
                {
                    return response()->json(['data'=>$Imagefile]);
                }
            }
    }

    public function uploadBrand(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|mimes:jpeg,png,jpg'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'message' => $validator->errors()->first()
                    ],400);
        }
        $image = $request->file('image');
        // dd($image);
        if($image) {
                $extension = $request->image->extension();
                $file_path = 'assets/image/brand/';
                $name = time().'_'.$request->image->getClientOriginalName();

                $result= Image::make($image)->save($file_path.'original/'.$name);
                $smallthumbnail = date('mdYHis'). '-' . uniqid() . '.' . '_small_'. '.' .$extension;
                $mediumthumbnail = date('mdYHis'). '-' . uniqid() . '.' . '_medium_' . '.' .$extension;

                $smallThumbnailFolder = 'assets/image/brand/thumbnail/small/';
                $mediumThumbnailFolder = 'assets/image/brand/thumbnail/medium/';

                // $result = $result->save($file_path.'original/'.$name);

                $result->resize(200,200);
                $result = $result->save($file_path.'/thumbnail/small/'.$smallthumbnail);

                $result->resize(100,100);
                $result = $result->save($file_path.'/thumbnail/medium/'.$mediumthumbnail);

                $Imagefile = DBImage::updateOrCreate([
                    'name' => $name,
                    'small_path' => url($file_path.$name),
                    'medium_path' => url($smallThumbnailFolder.$smallthumbnail),
                    'large_path' => url($mediumThumbnailFolder.$mediumthumbnail),
                ]);
                if($Imagefile->save())
                {
                    return response()->json(['data'=>$Imagefile]);
                }
            }
    }
}
