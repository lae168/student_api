<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $primaryKey = 'student_id';
    protected $fillable = ['name', 'email', 'date_of_birth', 'student_type', 'card_number', 'student_image'];

    public function studentType()
    {
        return $this->belongsTo(StudentType::class, 'student_type', 'student_type');
    }

    public function studentCard()
    {
        return $this->hasOne(StudentCard::class, 'student_id', 'student_id');
    }
}
