<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequirementModel;
use App\Models\Documents;
use App\Models\RequirementMapping;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
              $title = $threat['title'];
              $description = $threat['description'];
              $priority = $threat['severity'];
              $state = $threat['status'];

              if (isset($threat['mitigation'])) {
                $mitigations = $threat['mitigation'];
              } else {
                $mitigations = null;
              }

              // create a document for each threat
              $doc = Documents::factory()->create([
                'title' => basename($filePath) . "-" . $title
              ]);


              // Parse all requirements within category for matching keywords
              try {
                $requirements = DB::table('requirement_mapping')
                  ->select('requirement_mapping.*')
                  ->where('requirement_mapping.ciaaa_category', $ciaaa_category)
                  ->get();

                // https://laravel.com/docs/8.x/eloquent-collections
                foreach ($requirements as $requirement) {
                  $counter = 0;
                  $keywords = explode(";", $requirement->keywords);

                  // If keyword match exists in the threat title or description...
                  foreach ($keywords as $keyword) {
                    $keyword = trim($keyword);
                    if (empty($keyword)) continue;
                    if(strpos($title, $keyword) !== false)$counter++;
                    if(strpos($description, $keyword) !== false)$counter++;
                    if(strpos($mitigations,$keyword) !== false)$counter++;
                    
                  }
                  if ($counter == 0) continue;
                  $req = RequirementModel::where('title', $requirement->requirement)->first();
                  // new requirement
                  if ($req == null) {

                    // Create a requirement        
                    $model = new RequirementModel();
                    $model->owner = Auth::getUser()->id;
                    $model->ciaaa_category = $ciaaa_category;
                    $model->title = $requirement->requirement; // Requirement model
                    $model->description = $description;
                    $model->priority = $priority;
                    $model->state = $state;
                    $model->mitigations = $mitigations;
                    $model->word_match = $counter;
                    $model->save();

                    $req = $model;
                  }

                  $tempDoc = $req->documents()->where('id', $doc->id)->first();
                  if (is_null($tempDoc)) {
                    // creates the link 
                    $doc->RequirementModel()->attach($req->id, array('backwards' => true));
                  }
                }
              } catch (ModelNotFoundException $e) {
                // Print error message
                if ($fp = fopen("/tmp/ImportController_ModelNotFoundException", "a")) {
                  fwrite($fp, print_r($e, TRUE));
                  fclose($fp);
                }
              }
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
      default:
        return 'Unknown';
    }
  }
}
