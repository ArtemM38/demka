<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\CarMark;
use App\Models\CarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $applications = Application::where('user_id', Auth::id())->get();
        return view('application.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
    
        try{
            
         $request->validate([
            'car_marks_id' => ['required', 'string'],
            'car_models_id' => ['required', 'string'],
            'address' => ['required', 'string'],
            'phone' => ['required', 'string', 'max:11'],
            'date' => ['required', 'string'],
            'license_series' => ['required', 'string'],
            'license_date' => ['required', 'string'],
            'pay_method' => ['required', 'string'],
        ]);

        $application = Application::create([
            'user_id' =>Auth::id(),
            'car_marks_id' => $request->car_marks_id,
            'car_models_id' => $request->car_models_id,
            'phone' => $request->phone,
            'date' => $request->date,
            'license_series' => $request->license_series,
            'license_date' => $request->license_date,
            'pay_method' => $request->pay_method,
            'address' => $request->address,
        ]);
         return redirect()->route('application.index');
         }catch(\Exception $e){
            return response()->json([
                'status'=>false,
                'message'=>$e->getMessage(),
            ]);
         }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $carmarks = CarMark::get();
        $carmodels = CarModel::get();
        return view('application.create', compact('carmarks', 'carmodels'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        //
    }
}
