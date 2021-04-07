<?php

namespace App\Http\Controllers;
use App\RequirementModel;
use DB;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    // https://www.nicesnippets.com/blog/laravel-google-pie-chart-tutorial-example
    public function buildChart(Request $request)
    {
      $data = DB::table('requirement_models')
        ->select(
          DB::raw('state as state'),
          DB::raw('count(*) as number'))
          ->groupBy('state')
          ->get();
      $array[] = ['Status', 'Number'];
      foreach($data as $key => $value) {
        $array[++$key] = [$value->state, $value->number];
      }
      return $json_encode($array);
    }
}
