<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequirementMappingController extends Controller
{
      public function store(Request $request)
      {
            RequirementMapping::factory()->create([
                'stride_category' => $request->stride_category,
                'ciaaa_category'  => $request->ciaaa_category,
                'requirement'     => $request->requirement,
                'keywords'        => $request->keywords,
            ]);

            return redirect('/dashboard');
      }

      public function update(Request $request)
      {
          $req = RequirementMapping::find($request->id);
          $req->stride_category = $request->stride_category;
          $req->ciaaa_category = $request->ciaaa_category;
          $req->requirement = $request->requirement;
          $req->keywords = $request->keywords;
          $req->save();

          return redirect('/dashboard');
      }
}
