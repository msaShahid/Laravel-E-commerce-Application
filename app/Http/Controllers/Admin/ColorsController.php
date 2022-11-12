<?php

namespace App\Http\Controllers\Admin;

use App\Models\Colors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColorsFormRequest;

class ColorsController extends Controller
{
    // Retrive data into table
    public function index(){

        $colors = Colors::all();
        return view('admin.colors.index', compact('colors'));
    }

    // open create form for color
    public function create(){

        return view('admin.colors.create');

    }

    // Insert data 
    public function store(ColorsFormRequest $request){

        $validatedData = $request->validated();

        $colors = new Colors;

        $colors->name = $validatedData['name'];
        $colors->code = $validatedData['code'];
        $colors->status = $request->status == true ? '1':'0';

        $colors->save();

        return redirect('admin/colors')->with('message','Color Inserted Successfully.');

    }

    public function edit(int $color_id){

        $colors = Colors::findOrFail($color_id);
        return view('admin.colors.edit', compact('colors'));

    }

    public function update(ColorsFormRequest $request, int $color_id){

        $validatedData = $request->validated();

        $colors = Colors::findOrFail($color_id);
        $colors->name = $validatedData['name'];
        $colors->code = $validatedData['code'];
        $colors->status = $request->status == true ? '1' : '0';

        $colors->update();

        return redirect('admin/colors')->with('message','Color Updated Successfully');

    }

    public function destroy(int $color_id){

        $color = Colors::findOrFail($color_id);
        $color->delete();

        return redirect('admin/colors')->with('message','Color Deleted Successfully');

    }

}
