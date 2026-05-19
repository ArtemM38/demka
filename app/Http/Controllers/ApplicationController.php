<?php

namespace App\Http\Controllers;

use App\Models\Application;
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
        return view('application', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
         $request->validate([
            'car_mark' => ['required', 'string'],
            'car_model' => ['required', 'string'],
            'address' => ['required', 'string'],
            'phone' => ['required', 'string', 'max:20'],
            'date' => ['required', 'string'],
            'license_series' => ['required', 'string'],
            'license_date' => ['required', 'string'],
            'pay_method' => ['required', 'string'],
        ]);

        $application = Application::create([
            'user_id' =>Auth::id(),
            'car_mark' => $request->car_mark,
            'car_model' => $request->car_model,
            'phone' => $request->phone,
            'date' => $request->date,
            'license_series' => $request->license_date,
            'license_date' => $request->license_date,
            'pay_method' => $request->pay_method,
            'address' => $request->address,
        ]);
         return redirect('application');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $applications = Application::get();
        return view('applicationCreate', compact('applications'));
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
