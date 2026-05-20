<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('application.index');
        } else {
            $applications = Application::get();
            return view('admin.index', compact('applications'));
        }
    }
    public function update(Request $request, $id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('application');
        } else {
            $validated = $request->validate([
                'status' => 'string|required'
            ]);
            Application::where('id', $id)->update($validated);
            return back()->with('success');
        }
    }
}
