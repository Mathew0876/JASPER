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
        $req->CIAAA_category = $request->category;
        
        $req->save();
        
        return redirect('/dashboard');
    }
}
