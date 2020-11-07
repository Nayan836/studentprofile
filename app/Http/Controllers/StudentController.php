<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Student;
use App\Model\Course;
use Hash;  
use Exceptions;
class StudentController extends Controller
{
   public function dashboard(){
      
      $courses = Course::where("student_id", Auth::guard('student')->user()->id)->with('student')->latest()->paginate(5);
    
       return view('student.dashboard',compact('courses'));
   }

    public function studentLogout(){
        Auth::guard('student')->logout();
        return redirect()->route('student.login');
    }

    public function studentRegister(){
        
        return view('student.auth.register');
     }

     public function submitRegister(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:students',
            'password' =>'required',
            'password_confirmation' => 'same:password'
        ]);
        unset($request['password_confirmation']);
        $password = Hash::make($request->password);
        $request['password'] = $password;
        Student::create($request->all());
        return redirect()->route('student.login');
       

     }

     //course register

     public function courseReg(){
      
     
        $terms=['1st term','2nd term','3rd term'];
        return view('student.course.reg',compact('terms'));
     }

     public function submitReg(Request $request){
       
        $request->validate([
            'name' => 'required',
            'bangla' => 'required',
            'english' =>'required',
            'math' => 'required',
            'islam' => 'required',
            'terms' => 'required',
            ]);
            $std_id = Auth::guard('student')->user()->id;
            try{
           Course::create([
                  "student_id"=> $std_id,
                  "name"=> $request->name,
                  "bangla"=>$request->bangla,
                  "english"=>$request->english,
                  "math"=>$request->math,
                  "islam"=>$request->islam,
                  "terms"=>$request->terms,
     
                 ]);
            }
            catch(Exceptions $e){
               
            }
          
          
            return redirect()->route('student.dashboard');

     }

     //course edit

     public  function courseEdit($id){
      $course = Course::find($id);
      return view('student.course.edit',compact('course'));
  }
  //course update

  public function courseUpdate(Request $request,int $id)
    {
        Course::find($id)->update([
            'name' => $request->name,
            'bangla' => $request->bangla,
            'english' =>$request->english,
            'math' => $request->math,
            'terms' => $request->terms,
        ]);
        return redirect()->route('student.dashboard');
    }

    //course delete

    public function courseDelete($id){
        Course::withTrashed()->find($id)->forceDelete();
        return redirect()->route('student.dashboard');
        
  
      }
  
}
