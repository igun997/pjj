<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property int $id
 * @property string $name
 * @property bool $manage_users
 * @property bool $manage_questions
 * @property bool $manage_theory
 * @property bool $manage_lectures
 * @property bool $manage_classes
 * @property int $is_student
 * @property int $is_teacher
 * @property int $is_admin
 * @property int $created
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'roles';
	public $timestamps = false;

	protected $casts = [
		'manage_users' => 'bool',
		'manage_questions' => 'bool',
		'manage_theory' => 'bool',
		'manage_lectures' => 'bool',
		'manage_classes' => 'bool',
		'is_student' => 'int',
		'is_teacher' => 'int',
		'is_admin' => 'int',
		'created' => 'int'
	];

	protected $fillable = [
		'name',
		'manage_users',
		'manage_questions',
		'manage_theory',
		'manage_lectures',
		'manage_classes',
		'is_student',
		'is_teacher',
		'is_admin',
		'created'
	];

	public function users()
	{
		return $this->belongsToMany(User::class, 'role_users')
					->withPivot('id', 'created');
	}
}
