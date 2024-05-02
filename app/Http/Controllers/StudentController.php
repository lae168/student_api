<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Models\Student;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller {
    public function index() {
        return Student::all();
    }

    public function show( Student $student ) {
        return $student;
    }

    public function store( StudentStoreRequest $request ) {
        $validatedData = $request->validated();

        // Handle image upload
        if ( $request->hasFile( 'student_image' ) ) {
            $imagePath = $request->file( 'student_image' )->store( 'student_images', 'public' );
            $validatedData[ 'student_image' ] = $imagePath;
        }

        $student = Student::create( $validatedData );

        return response()->json( $student, 201 );
    }

    public function update( StudentUpdateRequest  $request, Student $student ) {
        $validatedData = $request->validated();

        // Handle image update
        if ( $request->hasFile( 'student_image' ) ) {
            // Delete old image if exists
            if ( $student->student_image ) {
                Storage::delete( $student->student_image );
            }
            $imagePath = $request->file( 'student_image' )->store( 'student_images', 'public' );
            $validatedData[ 'student_image' ] = $imagePath;
        }

        $student->update( $validatedData );

        return response()->json( $student, 200 );
    }

    public function destroy( Student $student ) {
        $student->delete();
        return response()->json( null, 204 );
    }
}
