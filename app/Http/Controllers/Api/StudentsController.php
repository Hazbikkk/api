<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StudentsRequest;

class StudentsController extends Controller
{
    public function index()
    {
        $students = DB::table('students')->paginate(5);
        return $students;
    }
    public function store(StudentsRequest $request)
    {
        return DB::table('students')->insert($request->all());
    }
    public function show(string $id)
    {
        $student = DB::table('students')->where('id', $id)->first();

        abort_if(! $student, 404);

        return response()->json($student);
    }
    public function update(string $id, StudentsRequest $request)
    {
        $student = DB::table('students')->where('id', $id)->update($request->all());
        abort_if(! $student, 404);
        $student_get = DB::table('students')->where('id', $id)->first();
        return response()->json($student_get);
    }
    public function destroy(string $id)
    {
        $student = DB::table('students')->where('id', $id)->delete();
        abort_if(! $student, 404);
        return response()->json(["message" => "Student is destroying"]);
    }
}
