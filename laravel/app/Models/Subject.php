<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\HeadacheFrequency;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'date_of_birth',
        'headache_frequency',
        'daily_headache_frequency',
        'eligibility',
    ];

    protected $enumCasts = [
        'headache_frequency' => HeadacheFrequencyEnum::class,
        'daily_headache_frequency' => DailyHeadacheFrequencyEnum::class,
    ];

}
