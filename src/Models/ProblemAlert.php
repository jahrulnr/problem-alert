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
		'exception',
  'hit', 
  'time',
 ];

 function scopeAddLog($query, $statusCode, $file, $line, $exception){
		$model = $query->where('status_code', $statusCode)
			->where("filename", $file)
			->where('line', $line)
			->where("exception", $exception);
		if($model->count() > 0){
			$model = $model->first();
			$model->hit++;
			$model->save();
		}
		else{
			static::create([
				'status_code' => $statusCode, 
				'method' => request()->getMethod(), 
				'filename' => $file, 
				'line' => $line,
				'exception' => $exception,
				'time' => time(),
			]);
		}
 }
}