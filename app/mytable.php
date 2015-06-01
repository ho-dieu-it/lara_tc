<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class mytable extends Model {

	//
	protected $table='my_table';
	
	
	
	public static function editData($data){
		$t=mytable::find(1);
		$t->name='test123';
		$t->save();
	}
}
