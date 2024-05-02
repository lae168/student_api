<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCard extends Model {
    use HasFactory;

    protected $primaryKey = 'student_id';
    protected $fillable = [ 'student_id', 'card_number' ];

    //public $incrementing = false;

    public function student() {
        return $this->belongsTo( Student::class, 'student_id', 'student_id' );
    }
}
