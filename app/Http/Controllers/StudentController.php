<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::all();
        return view('student.index',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation =  Validator::make($request->all(), [
            'fname'=>'reqiured',
            'lname'=>'reqiured',
            'email'=>'reqiured|email|unique:users',
            'profile_image'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'mob' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11'

        ]);
        if($request->hasfile('profile_image')){
            $file =$request->file('profile_image');
            $extension =$file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            $file->move('uploads/students/',$filename);
            $request->profile_image =$filename;
        }
        Student::create($request->except('_token'));

        return redirect()->back()->with('status','Student Image Sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('student.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $student =Student::find($request->id);

        $student = new Student;
        $student->fname=$request->input('fname');
        $student->lname=$request->input('lname');
        $student->email=$request->input('email');
        $student->mob=$request->input('mobile_no');
        $student->profile_image=$request->input('profile_image');
        if($request->hasfile('profile_image'))
        {
            $destination = 'uploads/students/'.$student->profile_image;
            if(File::exists($destination))
            {
               File::delete($destination);
            }
            $file =$request->file('profile_image');
            $extension =$file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            $file->move('uploads/students/',$filename);
            $student->profile_image =$filename;
        }
        $student->update();
        $student->save();
        return redirect()->back()->with('status','Student data updated Sucessfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::destroy('id', $id);
//        $student =Student::find($id);
        $destination = 'uploads/students/'.$student->profile_image;
        if(File::exists($destination))
        {
           File::delete($destination);
        }

        //$student->delete();
        return redirect()->to('student.index')->with('status','Student data Deleted Sucessfully');

    }
}
