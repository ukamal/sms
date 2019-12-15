<?php

namespace App\Http\Controllers;

use App\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index(){
        $datas = Classes::all();
        return view('class.index',compact('datas'));
    }

    public function create(){
        return view('class.create');
    }

    public function save(Request $request){
        $this->validate($request,[
            'title' => 'required'
        ]);

        Classes::create([
            'title' => $request->title
        ]);

        return redirect()->back()->with('status','Class Added Successfully Saved');
    }

    public function edit($id){
        $kamal = Classes::find($id);
        return view('class.edit',compact('kamal'));
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'title' => 'required'
        ]);

        $update = Classes::find($id);
        $update->title = $request->title;
        $update->save();
        return redirect()->back()->with('status','Classes updated successfully');
    }
    public function delete($id){
        $del = Classes::find($id);
        $del->delete();
        return redirect()->back()->with('status','Delete record Successfully');
    }
}
