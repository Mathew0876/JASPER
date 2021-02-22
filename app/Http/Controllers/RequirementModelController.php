<?php

namespace App\Http\Controllers;

use App\Models\RequirementModel;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class RequirementModelController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'owner' => 'required',
            'assigned_to' => 'nullable',
            'stride_category' => 'required',
            'title' => 'required', // check length
            'description' => 'nullable',
            'mitigations' => 'nullable',
            'priority' => 'required',
            'state' => 'required',
        ]);         
        
        RequirementModel::factory()->create([
            'owner' => auth()->id(),
            //'assigned_to' => $request->assign,
            'stride_category' => $request->stride_category,
            'title' => $request->title,//('title'),
            'description' => $request->description,//('description'),
            'mitigations' => 'test',
            'priority' => $request->priority,//('priority'),
            //'state' => 'Not Started', 
        ]);
        
        return redirect('/dashboard');
    }

    public function update(Request $request)
    {
        // todo add validation 
        // $attributes = $request->validate([
        //     'assign' => 'required',
        //     'title' => 'required', //check length
        //     'description' => 'required',
        //     'priority' => 'required',
        //     'state' => '0',
        // ]);         
        $req = RequirementModel::find($request->id);
        $req->title = $request->title;
        $req->description = $request->description;//('description'),
        $req->assigned_to = $request->assign;
        $req->priority = $request->priority;//('priority'),
        $req->state = 'Not Started';
        $req->stride_category = $request->stride_category;
        
        $req->save();
        
        return redirect('/dashboard');
    }
}
