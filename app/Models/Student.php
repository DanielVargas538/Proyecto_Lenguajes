<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public static function rules($student = null)
    {
        $uniqueRule = 'unique:students,identification';
        if ($student) {
            $uniqueRule .= ',' . $student->id;
        }

        return [
            'first_name' => 'required|string|between:2,10',
            'last_name' => 'required|string|between:2,15',
            'identification' => 'required|' . $uniqueRule
        ];
    }
}