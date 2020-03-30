<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Class
 * 
 * @property int $id
 * @property string $name
 * @property int $capacity
 * @property int $created
 * 
 * @property Collection|ClassManager[] $class_managers
 * @property Collection|Lecture[] $lectures
 *
 * @package App\Models
 */
class Class extends Model
{
	protected $table = 'classes';
	public $timestamps = false;

	protected $casts = [
		'capacity' => 'int',
		'created' => 'int'
	];

	protected $fillable = [
		'name',
		'capacity',
		'created'
	];

	public function class_managers()
	{
		return $this->hasMany(ClassManager::class);
	}

	public function lectures()
	{
		return $this->hasMany(Lecture::class);
	}
}
