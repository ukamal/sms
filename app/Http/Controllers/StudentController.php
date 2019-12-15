<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Department;
use App\Student;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class StudentController extends Controller
{
    public function index(){
        $datas = Student::all();

        foreach ($datas as $data){
            //dd($data->department());
        }
        return view('student.index',compact('datas'));
    }
    public function create(){
        $departments = Department::all();
        $classes = Classes::all();

        return view('student.create',compact('departments','classes'));
    }

    public function save(Request $request){
        $this->validate($request,[
            'name' => 'required',
        ]);
        //Upload Image
        $stdImage ='';
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() .'.'. $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/image/student/'.$filename));
            $stdImage = $filename;
        }
        //dd($request->all());
        Student::create([
            'name'          => $request->name,
            'phone_number'  => $request->phone_number,
            'email'         => $request->email,
            'roll'          => $request->roll,
            'reg_id'        => $request->reg_id,
            'department_id' => $request->department_id,
            'class_id'      => $request->class_id,
            'father_name'   => $request->father_name,
            'mother_name'   => $request->mother_name,
            'present_address' => $request->present_address,
            'permanent_address' => $request->permanent_address,
            'home_number'    => $request->home_number,
            'image' => $stdImage,
        ]);
        return redirect()->back()->with('status','Student Information Added Successfully');
    }

    public function edit($id){
        $data = Student::find($id);
        $departments = Department::all();
        $classes = Classes::all();
        return view('student.edit',compact('data','departments','classes'));
    }


    public function update(Request $request,$id){
        $this->validate($request,[
            'name' => 'required'
        ]);
        //dd($request->all());
        $data = Student::find($id);
        $data->update ($request->all());
        //$data->save();
        return redirect()->back()->with('status','Department successfully updated');
    }

    public function delete($id){
        $del = Student::find($id);
        $del->delete();
        return redirect()->back()->with('status','deleted successfully');
    }

}
