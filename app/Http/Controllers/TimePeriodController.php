<?php

namespace App\Http\Controllers;

use App\Models\TimePeriod;
use App\Models\Category;
use App\Models\Time;

use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TimePeriodResource;

use Illuminate\Http\Request;

class TimePeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $timePeriods = new TimePeriod();
        // if ($request->q) {
        //     $timePeriods = $timePeriods->where('name', 'like', "%{$request->q}%");
        // }

        $timePeriods = TimePeriod::paginate(100)->appends(request()->query());
        // $timePeriods = $timePeriods->paginate(100)->appends(request()->query());
        $timePeriods = TimePeriodResource::collection($timePeriods);
        // return TimePeriodResource::collection($timePeriods);
        return view('pages.time-period.index', compact('timePeriods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        $times = Time::get();

        return view('pages.time-period.add', ['categories' => $categories,'times' =>$times]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'add_time_conditions.*.time' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'message' => $validator->errors()->first()
                    ],400);
        }

        foreach ($request->add_time_conditions as $key => $value) {
            TimePeriod::create([
                'category_id' =>$request->category,
                'time_id' => $value['time'],
            ]);
        }
        return response()->json(['success'=>true,'message'=>'Time Period created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(TimePeriod $timePeriod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TimePeriod $timePeriod , $id)
    {
        $categories = Category::get();
        $times = Time::get();

        $timePeriod = TimePeriod::find($id);
        $timePeriod = new TimePeriodResource($timePeriod);
        return view('pages.time-period.edit' , [ 'timePeriod'=>$timePeriod ,'times' =>$times , 'categories' =>$categories ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TimePeriod $timePeriod , $id)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'add_time_conditions.*.time' => 'required'

        ]);

        if ($validator->fails()) {
            return response()->json([
                        'error' => $validator->errors()->all()
                    ]);
        }
        $timePeriod = TimePeriod::find($id);
        if($timePeriod){
            foreach ($request->add_time_conditions as $key => $value) {
                $timePeriod = TimePeriod::where(['id'=>$timePeriod->id])->update([
                'category_id' =>$request->category,
                'time_id' => $value['time'],
            ]);
        }
            return response()->json(['success'=>true,'message'=>'Time Period Updated successfully']);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TimePeriod $timePeriod , $id)
    {
        $attribute = TimePeriod::find($id);
        if($attribute->delete()){
            return response()->json(['success'=>true,'message'=>'Time Period has been deleted successfully.']);
        }
        return response()->json(['success'=>false,'message'=>'Opps something went wrong!'],400);
    }
}
