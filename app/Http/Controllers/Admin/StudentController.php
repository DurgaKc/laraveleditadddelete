<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StoreStudentRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
   public function index(){

    $students = Student::latest()->paginate(10);

    // Retrieve chart data
    $chartData = Student::select(DB::raw('DATE(created_at) as date'), DB::raw('count(phone) as phone'))
                        ->groupBy(DB::raw('DATE(created_at)'))
                        ->get();

    $dates = $chartData->pluck('date')->toArray();
    $phones = $chartData->pluck('phone')->toArray();

    return view('index', compact('students', 'dates', 'phones'));



   }


//    return view('index', compact('ipAddresses', 'months', 'counts'));


   public function create()
   {
       return view('create');
   }

   public function store(StoreStudentRequest $request)
   {
       Student::create($request->validated());

       toast('created','studentdata created successfully');

       return redirect()->route('index');
   }

   public function edit(Student $student)
   {
       return view('edit', compact('student'));

   }
   public function update(UpdateStudentRequest $request, Student $student)
   {
       $student->update($request->validated());
       toast('Updated','data updated Successfully');
       return redirect()->route('index');}

       public function destroy(Student $student)
       {
           $student->delete();
           toast('Deleted','data Deleted Successfully');
           return redirect(route('index'));
       }


}
