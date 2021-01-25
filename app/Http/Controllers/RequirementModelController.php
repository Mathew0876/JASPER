<?php

namespace App\Http\Controllers;

use App\Models\RequirementModel;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class RequirementModelController extends Controller
{
    public function store(Request $request)
    {
        // todo add validation 
        // $attributes = $request->validate([
        //     'assign' => 'required',
        //     'title' => 'required', //check length
        //     'description' => 'required',
        //     'priority' => 'required',
        //     'state' => '0',
        // ]);         
        
        RequirementModel::factory()->create([
            'owner' => auth()->id(),
            'assigned_to' => $request->assign,
            'title' => $request->title,//('title'),
            'description' => $request->description,//('description'),
            'priority' => $request->priority,//('priority'),
            'state' => 'Not Started',
            'CIAAA_category' => $request->category,
            
            //test
            'mitigations' => 'test',
        ]);
        
        return redirect('/dashboard');
    }
}
