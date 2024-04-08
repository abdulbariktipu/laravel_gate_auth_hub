<?php

namespace App\Http\Controllers;

use App\Models\form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
// use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form.form_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd('tt');
        $data = new Form();

        // $request->validate([
        //     'name' => 'required',
        //     'image' => 'required',
        //     'skill' => 'required',
        //     'gender' => 'required',
        //     'country' => 'required',
        // ]);

        $data->name = $request->input('name');
        $data->gender = $request->input('gender');
        $data->country = $request->input('country');

        // check box save
        $checkbox_data = $request->input('skill');
        $data->skill = implode(",",$checkbox_data);

        // image_save
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $image_name = time() . "." . $ext;
            $image->move('storage/images/', $image_name);
            $data->image = $image_name;
        }

        $data->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(form $form)
    {
        $data = Form::all();
        return view('form.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $row=Form::findOrFail($id);
        return view('form.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Form::find($id);

        $data->name = $request->input('name');
        $data->gender = $request->input('gender');
        $data->country = $request->input('country');

        // check box save
        $checkbox_data = $request->input('skill');
        $data->skill = implode(",",$checkbox_data);

        // image_save
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $image_name = time() . "." . $ext;
            $image->move('storage/images/', $image_name);
            $data->image = $image_name;
        }

        $data->save();
        return redirect('/form/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $form=Form::destroy($id);
        if ($form)
        {
            $notification=array(
                'messege'=>'Sucessfully Data Deleted',
                'alert-type'=>'success'
            );
            return redirect()->route('form.show')->with($notification);
        }
        else{
            abort(403, "You are not authorized to delete this data.");
        };
    }
}
