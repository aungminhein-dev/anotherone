<?php

namespace App\Http\Controllers\student;

use Storage;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
class StudentController extends Controller
{
    // students pages


    // students list
    public function studentsList()
    {
        $students = Student::when(request('key'),function($searchQuery){
            $searchQuery->where('admission_id','like','%'.request('key').'%');
        })
        ->when(request('studentName'),function($name){
            $name->where('student_name','like','%'.request('studentName').'%');
        })
        ->when(request('phone'),function($phone){
            $phone->where('phone','like','%'.request('phone').'%');
        })
        ->orderBy('grade')
        ->get();
        return view('admin.student.students-list',compact('students'));
    }

    //add student
    public function addStudentPage()
    {
        $grades = Grade::orderBy('grade')->get();
        return view('admin.student.add-student',compact('grades'));
    }

    public function addStudent(Request $request){

        // // dd($request->toArray());

        $student = $this->requestStudentData($request);
        if($request->hasFile('image')){
            $imageName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$imageName);
            $student['image'] = $imageName;
        }
        $this->addstudentValidationCheck($request);
        Student::create($student);
        toastr()->success('A student has been registered admin!');
        return back();
    }

    // edit student
    public function editStudent($id)
    {
        $grades = Grade::orderBy('grade')->get();
        $student = Student::where('id',$id)->first();
        return view('admin.student.edit-student',compact('student','grades'));
    }
    public function updateStudent(Request $request)
    {

        $edittedStudentData = $this->requestStudentData($request);
        if($request->hasFile('image')){
            $imageName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$imageName);
            $edittedStudentData['image'] = $imageName;
        }
        $this->addstudentValidationCheck($request);
        Student::where('id',$request->id)->update($edittedStudentData);
        toastr()->success('A student data has been updated admin!');
        return redirect()->route('admin#studentslist');
    }

    //student details
    public function studentDetails($id)
    {
        $student = Student::where('id',$id)->first();
        return view('admin.student.studentdetails',compact('student'));
    }

    public function teacher(){
        return view('admin.teachers.index');
    }
    private function addstudentValidationCheck($request)
    {
        $validationRule = [
            'studentName'=> 'required',
            'birthday'=>'required',
            'fatherName'=>'required',
            'motherName'=>'required',
            'fatherNrc'=>'required',
            'motherNrc'=>'required',
            'grade'=>'required',
            'admissionId'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'gender'=>'required',
            'image'=>'mimes:jpg,png,webp'



        ];
        Validator::make($request->all(),$validationRule)->validate();
    }

    private function requestStudentData($request){
        return [
            'student_name'=>$request->studentName,
            'birthday'=>$request->birthday,
            'father_name'=>$request->fatherName,
            'mother_name'=>$request->motherName,
            'father_nrc'=>$request->fatherNrc,
            'mother_nrc'=>$request->motherNrc,
            'grade'=>$request->grade,
            'admission_id'=>$request->admissionId,
            'address'=>$request->address,
            'comment'=>$request->comment,
            'siblings'=>$request->broSis,
            'phone'=> $request->phone,
            'gender'=>$request->gender

           ];
    }

}
