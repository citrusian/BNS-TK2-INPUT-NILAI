<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;

class saved_score extends Model
{

    use HasFactory;
    public $timestamps = false;
    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
//        'Name', 'data',
        'Name', 'Quiz', 'Tugas', 'Absensi', 'Praktek', 'UAS', 'Final_Score', 'Grade',
    ];

    /**
     * Get the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function data(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }
}
