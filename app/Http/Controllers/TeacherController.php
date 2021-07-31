<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(){
        return view('Teachers.index');
    }
    // Show Teacher Data
    public function getData(){
        $teachers = Teacher::orderBy('id', 'DESC') -> get();
        return response()->json($teachers);
    }

    // Add Teacher Data
    public function addData(Request $request){
        $request -> validate([
            'name' => 'required',
            'title' => 'required',
            'institute' => 'required',
        ],[
            'name.required' => 'Teacher name must not be empty!',
            'title.required' => 'Teacher title must not be empty!',
            'institute.required' => 'Teacher institute must not be empty!'
        ]);

        $teacher = Teacher::create([
            'name' => $request -> name,
            'title' => $request -> title,
            'institute' => $request -> institute,
        ]);
        return response()->json($teacher);
    }

    // Show Teacher Edit
    public function editData($id){
        $teacher = Teacher::find($id);
        return response()->json($teacher);
    }

    // Update Teacher Data
    public function updateData(Request $request, $id){
        $request -> validate([
            'name' => 'required',
            'title' => 'required',
            'institute' => 'required',
        ],[
            'name.required' => 'Teacher name must not be empty!',
            'title.required' => 'Teacher title must not be empty!',
            'institute.required' => 'Teacher institute must not be empty!'
        ]);

        $teacher = Teacher::find($id) -> update([
            'name' => $request -> name,
            'title' => $request -> title,
            'institute' => $request -> institute,
        ]);

        return response() -> json($teacher);
    }

        // Update Teacher Data
        public function deleteData($id){

            $teacher = Teacher::find($id) -> delete();

            return response() -> json($teacher);
        }
}
