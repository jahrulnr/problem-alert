<?php

namespace BangunSoft\ProblemAlert\Models;

use Illuminate\Database\Eloquent\Model;

class ProblemAlert extends Model
{
 public function __construct(array $attributes = [])
 {
  if (!isset($this->table)) {
      $this->setTable(config('problem.table_name'));
  }
  parent::__construct($attributes);
 }
 
 /**
  * The attributes that aren't mass assignable.
  *
  * @var array
  */
 protected $fillable = [
  'status_code', 
  'method', 
  'filename', 
  'line',
  'hit', 
  'time',
 ];

 function scopeAddLog($statusCode, $file, $line){
    $model = static::where('status_code', $statusCode)
        ->where("file", $file)
        ->where('line', $line)->first();
    if($model){
        $model->hit++;
        $model->save();
    }
    else{
        static::create([
            'status_code' => $statusCode, 
            'method' => request()->getMethod(), 
            'filename' => $file, 
            'line' => $line,
            'time' => time(),
        ]);
    }
 }
}