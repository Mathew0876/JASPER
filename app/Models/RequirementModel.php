<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Documents;

class RequirementModel extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected $fillable = [
        'owner',
        'assigned_to',
        'ciaaa_category',
        'title',
        'description',
        'mitigations',
        'priority',
        'state',
        'word_match',
    ];

    public function documents(){
        return $this->belongsToMany(Documents::class)->withPivot('backwards');
    }
}
