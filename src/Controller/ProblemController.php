<?php

namespace BangunSoft\ProblemAlert\Controller;

use BangunSoft\ProblemAlert\Models\ProblemAlert;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Yajra\DataTables\DataTables;

class ProblemController extends BaseController {
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  function index(Request $request){
    if($request->ajax()){
      $problems = ProblemAlert::latest();
      $table = DataTables::of($problems)
        ->addColumn("time", function(ProblemAlert $data){
          return date("d F Y H:i", $data->time);
        })
        ->toJson();
      return $table;
    }

    $datatables = new DataTables();
    $columns = [
      'id' => ['title' => 'No.', 'orderable' => false, 'searchable' => false, 'render' => function () {
        return 'function(data,type,fullData,meta){return meta.settings._iDisplayStart+meta.row+1;}';
      }],
      'status_code' => ["title"=>"Status Code"],
      'method',
      'url' => ["title"=>"URL"],
      'filename',
      'line',
      'exception',
      'hit',
      'time',
    ];
    $table = $datatables->getHtmlBuilder()
      ->columns($columns)
      ->setTableId("problem-alert");

    return view("problem_alert::index", compact('table'));
  }
}