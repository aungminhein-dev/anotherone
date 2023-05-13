<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GradeController extends Controller
{
    public function grade()
    {
        $grades = Grade::orderBy('grade')->get();
        return view('admin.student.grade',compact('grades'));
    }

    // add grade
    public function addGrade(Request $request)
    {
        Validator::make($request->all(),[
            'grade'=>'required'
        ])->validate();
        $grade = [
            'grade' => $request->grade
        ];
        Grade::create($grade);
        return back();
    }

    public function removeGrade($id)
    {
        $grade = Grade::where('id',$id)->delete();
        toastr()->success('A grade has been removed admin');
        return back();
    }
}
