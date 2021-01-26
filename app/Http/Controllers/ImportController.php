<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequirementModel;

class ImportController extends Controller
{
    public function uploadFile(Request $request) {
        $request->validate([
          'file' => 'required|mimes:txt,csv,json|max:2048'
        ]);

        if ($request->file()) {
          $name = $request->file->getClientOriginalName() . '_' . time();
          $filePath = $request->file('file')->storeAs('uploads', $name, 'public');
          
          // Parsing magic - TODO
          // $model = new RequirementModel
          // $model->stride_category
          // $model->title 
          // etc.
          // $model->file = '/storage/' . $filePath;
          // $model->save();

          return back()
          ->with('success', 'Requirements have been imported successfully.')
          ->with('file', $name);
          
        }
    }
}
