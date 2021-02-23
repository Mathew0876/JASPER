<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequirementModel;
use App\Models\RequirementMapping;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{
  public function uploadFile(Request $request)
  {
    $request->validate([
      'file' => 'required|mimes:txt,csv,json|max:2048'
    ]);

    if ($request->file()) {
      $name = $request->file->getClientOriginalName() . '_' . time();
      $filePath = $request->file('file')->storeAs('uploads', $name, 'public');

      // Get json data from storage
      $fileData = Storage::disk('public')->get($filePath);
      $json = json_decode($fileData, true);

      // TODO - progress bar
      // Parse threat model json
      $diagrams = $json['detail']['diagrams'];
      foreach ($diagrams as $diagram) {
        $cells = $diagram['diagramJson']['cells'];
        foreach ($cells as $cell) {
          if (array_key_exists('threats', $cell)) {
            $threats = $cell['threats'];
            foreach ($threats as $threat) {

              // Get threat information
              $ciaaa_category = $this->strideMapping($threat['type']);
              $description = $threat['description'];
              $priority = $threat['severity'];
              $state = $threat['status'];

              /* Parse all requirements within category for matching keywords
              $requirements = RequirementMapping::where('ciaaa_category', '=', $ciaaa_category)->all();

              // Debug - print file contents
              if ($fp = fopen("/tmp/TEST", "w")) {
                fwrite($fp, print_r($requirements, TRUE));
                fclose($fp);
              }*/

              // Create requirement
              $model = new RequirementModel();
              $model->owner = Auth::getUser()->id;
              $model->ciaaa_category = $ciaaa_category;
              $model->title = $threat['title']; // Requirement model
              $model->description = $description;
              $model->priority = $priority;
              $model->state = $state;
              $model->save();

              // Parse requirements map for matching keywords
              // Parse database for requirements with matching stride category
            }
          }
        }
      }

      return back()
        ->with('success', 'Requirements have been imported successfully.')
        ->with('file', $name);
    }
  }

  private function strideMapping(String $strideCategory)
  {
    $strideCategory = strtolower($strideCategory);
    $strideCategory = preg_replace('/\s/', '_', $strideCategory);

    switch ($strideCategory) {
      case 'spoofing':
        return 'Authenticity';
      case 'denial_of_service':
        return 'Availability';
      case 'tampering':
        return "Integrity";
      case 'repudiation':
        return 'Non-Repudiation';
      case 'elevation_of_privilege':
        return 'Authorization';
      case 'information_disclosure':
        return 'Confidentiality';
      default: return 'Unknown';
    }
  }
}
