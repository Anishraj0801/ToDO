<?php

namespace App\Http\Controllers;

use App\Models\active_code;
use Illuminate\Http\Request;

class activeCodeController extends Controller
{
    //

    public function index()
    {
        $data = active_code::get();
        // return $data;
        return view('active', compact('data'));
        // return view('active');
    }
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:256|string',
        ]);

        active_code::create([
            'name' => $request->name,

        ]);
        return redirect('create')->with('status', 'created success');
    }
    public function edit(int $id)
    {
        $data = active_code::find($id);
        // return $data;
        return view('update', compact('data'));
    }
    public function updated(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|max:256|string',
            'email' => 'required|max:256',
            'is_active' => 'sometimes'
        ]);
        active_code::findOrFail($id)->update([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('status', 'updated suceesfully');
    }
    public function delete(int $id)
    {
        $data =  active_code::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('status', 'delete suceesfully');
    }

    public function complete($id)
    {
        $task = active_code::findOrFail($id);
        $task->status = 'done';
        $task->save();
    
        return response()->json(['success' => true]);
    }
    
}
