<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Lecture
 * 
 * @property int $id
 * @property string $name
 * @property int $max_time
 * @property int $class_id
 * @property int $created
 * 
 * @property Class $class
 * @property Collection|LectureAssigment[] $lecture_assigments
 * @property Collection|LectureSession[] $lecture_sessions
 * @property Collection|LectureTeacher[] $lecture_teachers
 * @property Collection|LectureTheory[] $lecture_theories
 *
 * @package App\Models
 */
class Lecture extends Model
{
	protected $table = 'lectures';
	public $timestamps = false;

	protected $casts = [
		'max_time' => 'int',
		'class_id' => 'int',
		'created' => 'int'
	];

	protected $fillable = [
		'name',
		'max_time',
		'class_id',
		'created'
	];

	public function class()
	{
		return $this->belongsTo(Class::class);
	}

	public function lecture_assigments()
	{
		return $this->hasMany(LectureAssigment::class);
	}

	public function lecture_sessions()
	{
		return $this->hasMany(LectureSession::class);
	}

	public function lecture_teachers()
	{
		return $this->hasMany(LectureTeacher::class);
	}

	public function lecture_theories()
	{
		return $this->hasMany(LectureTheory::class);
	}
}
