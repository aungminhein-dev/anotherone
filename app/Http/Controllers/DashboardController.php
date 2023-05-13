<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // dashboard
    public function adminDashboard()
    {
        $studentCount = Student::count();
        return view('admin.dashboard',compact('studentCount'));
    }


}
