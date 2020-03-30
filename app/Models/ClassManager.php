<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ClassManager
 * 
 * @property int $id
 * @property int $class_id
 * @property int $user_id
 * @property int $status
 * @property int $created
 * 
 * @property Class $class
 * @property User $user
 *
 * @package App\Models
 */
class ClassManager extends Model
{
	protected $table = 'class_manager';
	public $timestamps = false;

	protected $casts = [
		'class_id' => 'int',
		'user_id' => 'int',
		'status' => 'int',
		'created' => 'int'
	];

	protected $fillable = [
		'class_id',
		'user_id',
		'status',
		'created'
	];

	public function class()
	{
		return $this->belongsTo(Class::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
