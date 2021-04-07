<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequirementMapping extends Model
{
    use HasFactory;

    protected $fillable = [
        'stride_category',
        'ciaaa_category',
        'requirement',
        'keywords',
    ];
}
