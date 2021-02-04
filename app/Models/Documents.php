<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected $fillable = [
        'title',
    ];

    public function requirementModel(){
        return $this->belongsToMany(RequirementModel::class);
    }
}
