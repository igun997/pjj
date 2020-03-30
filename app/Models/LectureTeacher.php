<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LectureTeacher
 * 
 * @property int $id
 * @property int $lecture_id
 * @property int $user_id
 * @property int $status
 * @property int $created
 * 
 * @property Lecture $lecture
 * @property User $user
 *
 * @package App\Models
 */
class LectureTeacher extends Model
{
	protected $table = 'lecture_teacher';
	public $timestamps = false;

	protected $casts = [
		'lecture_id' => 'int',
		'user_id' => 'int',
		'status' => 'int',
		'created' => 'int'
	];

	protected $fillable = [
		'lecture_id',
		'user_id',
		'status',
		'created'
	];

	public function lecture()
	{
		return $this->belongsTo(Lecture::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
