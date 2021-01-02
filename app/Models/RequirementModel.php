<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequirementModel extends Model
{
    use HasFactory;

    protected $fillable = [
        //'user_id',
        'stride_category',
        'title',
        'description',
        'mitigations',
        'priority',
        'state',
    ];
}
