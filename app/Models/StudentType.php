<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentType extends Model {
    use HasFactory;
    protected $primaryKey = 'student_type';
    protected $table = 'student_types';
    protected $fillable = [ 'student_type', 'desc' ];

    public function students() {
        return $this->hasMany( Student::class, 'student_type', 'student_type' );
    }
}
