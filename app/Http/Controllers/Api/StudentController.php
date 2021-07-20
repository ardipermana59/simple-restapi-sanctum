<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\StudentResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        if(count($students) == 0) {
            return StudentResource::collection($students)->additional([
                'success' => false,
                'message' => 'students not found.'
            ])->response()->setStatusCode(404);
        }
        return StudentResource::collection($students)->additional([
            'success' => true,
            'message' => 'students found.'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->studentValidation($request);
        $student = Student::create($request->all());

        return (new StudentResource($student))->additional([
            'success' => true,
            'message' => "student has been created."
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return (new StudentResource($student))->additional([
                'success' => false,
                'message' => "student nof found."
            ])->response()->setStatusCode(404);
        }
        return (new StudentResource($student))->additional([
            'success' => true,
            'message' => "student found."
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return (new StudentResource($student))->additional([
                'success' => false,
                'message' => "student nof found."
            ])->response()->setStatusCode(404);
        }
        
        $student->update($request->all());
        return (new StudentResource($student))->additional([
            'success' => true,
            'message' => "student has been updated."
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::destroy($id);
        if($student == 0) {
            return response()->json([
                'success' => false,
                'message' => "student not found."
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => "student has been deleted."
        ]);
    }


    private function studentValidation($request)
    {
        $request->validate([
            'name' => ['required','max:40'],
            'gender' => ['required'],
            'phone' => ['required','max:15'],
            'hobby' => ['required','max:20'],
            'address' => ['required','max:255']
        ]);
    }
}
