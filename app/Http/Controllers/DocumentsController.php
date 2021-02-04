<?php

namespace App\Http\Controllers;
use App\Models\Documents;
use App\Models\RequirementModel;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    public function addDoc(Request $request) {
        Documents::factory()->create([
            'title' => $request->title
        ]);

        return back()
          ->with('success', 'Document has been added successfully.');
    }

    public function addLink(Request $request) {
        $backwards = ($request->linkType == "Backward") ? true : false;
        $doc = Documents::find($request->docId);
        $doc->RequirementModel()->attach($request->reqId, array('backwards' => $backwards));
        return back()
          ->with('success', 'Traceability link has been added successfully.');
    }
}
