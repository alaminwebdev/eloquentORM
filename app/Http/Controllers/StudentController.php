<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Phone;

class StudentController extends Controller
{
    public function addStudent(Request $request)
    {

        /* In this example, we assign the name field from the incoming HTTP request to the name attribute of the App\Models\Student model instance. When we call the save method, a record will be inserted into the database. The model's created_at and updated_at timestamps will automatically be set when the save method is called, so there is no need to set them manually. */

        // using HTTP request method & directly
        // url format : http://127.0.0.1:8000/add?name=sharmin&email=sharmin@gmail.com
        // $studentData = new Student();
        // $studentData->name = $request->name;
        // $studentData->email = $request->email;
        // $studentData->save();


        // using another method 
        // $studentData = new Student();
        // $studentData->name = 'Rakib';
        // $studentData->email = 'rakib@gmail.com';
        // $studentData->save();

        // using conditionally 
        $studentData = new Student();
        $studentData->name = $request->name;
        $studentData->email = $request->email;
        $studentData->save();
        $affected = $studentData->save();
        if ($affected) {
            //dd($affected);
            echo "Student added successfully !";
        } else {
            //dd($affected);
            echo "Something went wrong !";
        }
    }
    public function viewStudent()
    {
        // retrieving single value
        // $student = Student::where('name', 'sharmin')->first();

        // retrieving all values
        $data = Student::get();
        return view('view', compact('data'));
    }
    public function updateStudent($id, $name)
    {
        // using find() to retrieve data directly
        // $studentData = Student::find($id);
        // $studentData->name = $name;
        // $studentData->update();

        // update conditionally - this method returns a response of affected row - true or false
        $studentData = Student::find($id);
        if ($studentData == null) {
            echo "Sorry , Student not found !";
        } else {
            $studentData->name = $name;
            $affected = $studentData->update();
            //dd($affected);
            if ($affected) {
                echo "Data are updated successfully !";
            } else {
                echo "Something went wrong ";
            }
        }

        // using get() to retrieve data 
        // $studentData = Student::where('id', $id)->first();
        // dd($studentData);
    }

    public function deleteStudent($id)
    {
        // deleted directly
        // $studentData = Student::find($id);
        // $affected = $studentData->delete();
        // dd($affected);

        // deleted conditionally
        $studentData = Student::find($id);
        if ($studentData == null) {
            echo "Student not found";
        } else {
            $affected = $studentData->delete();
            if ($affected) {
                echo "Student deleted successfully";
            } else {
                echo "Something went wrong";
            }
        }
    }

    public function viewWithPhone()
    {
        $all_data = Student::with('relationWithPhone')->get();
        //dd($all_data[0]);
        return view('view_all', compact('all_data'));
        
    }
}
