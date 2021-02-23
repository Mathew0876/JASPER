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
            'ciaaa_category' => 'required',
            'title' => 'required', // check length
            'description' => 'nullable',
            'mitigations' => 'nullable',
            'priority' => 'required',
            'state' => 'required',
        ]);         
        
        RequirementModel::factory()->create([
            'owner' => auth()->id(),
            'assigned_to' => $request->assigned_to,
            'ciaaa_category' => $request->ciaaa_category,
            'title' => $request->title,
            'description' => $request->description,
            'mitigations' => $request->mitigations,
            'priority' => $request->priority,
            'state' => 'Not Started', // default
        ]);
        
        return redirect('/dashboard');
    }

    public function update(Request $request)
    {
        // TODO add validation 
     
        $req = RequirementModel::find($request->id);
        $req->assigned_to = $request->assigned_to;
        $req->ciaaa_category = $request->ciaaa_category;
        $req->title = $request->title;
        $req->description = $request->description;
        $req->mitigations = $request->mitigations;
        $req->priority = $request->priority;
        $req->state = $request->state;
        $req->save();
        
        return redirect('/dashboard');
    }
}
