<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Http\Resources\AttributeResource;
use App\Models\AttributeValue;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class AttributeController extends Controller
{

    public function index(Request $request)
    {

        $attributes = new Attribute();
        if($request->q){
            $attributes = $attributes->where('name','like',"%{$request->q}%");
        }
        $attributes = $attributes->paginate(100)->appends(request()->query());
        $attributes = AttributeResource::collection($attributes);

        return view('pages.attribute.index' , compact('attributes'));
    }

    public function create()
    {
        $category = Category::get();

        return view('pages.attribute.add', compact('category'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required','unique:'.Attribute::class],
            'category' => 'required',
            'field' => 'required',
            'type' => 'required',
            'display_order' => 'required|integer',
            'status' => 'required|integer'

        ]);

        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'message' => $validator->errors()->first()
                    ],400);
        }

        $attrebute = Attribute::create([
            'name' => $request->name,
            'field' =>$request->field,
            'category_id' =>$request->category,
            'type' => $request->type,
            'data_type' =>$request->data_type,
            'description' => $request->description,
            'display_order' =>$request->display_order,
            'status' => $request->status,
        ]);

        return response()->json(['success'=>true,'message'=>'Attribute created successfully']);
    }

    public function show($id)
    {
        $attributeValues = AttributeValue::get();

        // $category = Category::get();
        $attribute = Attribute::find($id);
        $attribute = new AttributeResource($attribute);
        // return $attribute ;
        return view('pages.attribute.view' , [ 'attributeValues'=>$attributeValues ,'attribute' => $attribute ] );
    }

    public function valuestore (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'attribute_value' => 'required',
            'status' => 'required|integer'

        ]);

        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'message' => $validator->errors()->first()
                    ],400);
        }

        $attrebutevalue = AttributeValue::create([
            'attribute_value' => $request->attribute_value,
            'attribute_id' =>$request->attribute_id,
            'status' => $request->status,
        ]);

        return response()->json(['success'=>true,'message'=>'Attribute created successfully']);
    }

    public function edit($id)
    {
        $category = Category::get();
        $attribute = Attribute::find($id);
        $attribute = new AttributeResource($attribute);
        return view('pages.attribute.edit' , [ 'attribute'=>$attribute , 'category' =>$category ]);
    }
    public function attributevalue($id)
    {

        // dd($id);
        $attributeValue = AttributeValue::find($id);

        return response()->json($attributeValue);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category' => 'required',
            'field' => 'required',
            'type' => 'required',
            'display_order' => 'required',
            'status' => 'required'

        ]);

        if ($validator->fails()) {
            return response()->json([
                        'error' => $validator->errors()->all()
                    ]);
        }
        $attribute = Attribute::find($id);
        if($attribute){
            $attribute = Attribute::where(['id'=>$attribute->id])->update([
                'name' => $request->name,
                'field' =>$request->field,
                'category_id' =>$request->category,
                'type' => $request->type,
                'data_type' =>$request->data_type,
                'description' => $request->description,
                'display_order' =>$request->display_order,
                'status' => $request->status,
            ]);
            return response()->json(['success'=>true,'message'=>'Attribute Updated successfully']);

        }
    }
    public function destroy($id)
    {
        $attribute = Attribute::find($id);
        if($attribute->delete()){
            return response()->json(['success'=>true,'message'=>'Attribute has been deleted successfully.']);
        }
        return response()->json(['success'=>false,'message'=>'Opps something went wrong!'],400);
    }

    public function destroyattribute($id)
    {
        $attributeValue = AttributeValue::find($id);

        if($attributeValue->delete()){
            return response()->json(['success'=>true,'message'=>'Attribute Value has been deleted successfully.']);
        }
        return response()->json(['success'=>false,'message'=>'Opps something went wrong!'],400);
    }
}
