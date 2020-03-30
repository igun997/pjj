<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LectureAssigment
 * 
 * @property int $id
 * @property int $lecture_id
 * @property int $type
 * @property string $file
 * @property int $created
 * 
 * @property Lecture $lecture
 *
 * @package App\Models
 */
class LectureAssigment extends Model
{
	protected $table = 'lecture_assigment';
	public $timestamps = false;

	protected $casts = [
		'lecture_id' => 'int',
		'type' => 'int',
		'created' => 'int'
	];

	protected $fillable = [
		'lecture_id',
		'type',
		'file',
		'created'
	];

	public function lecture()
	{
		return $this->belongsTo(Lecture::class);
	}
}
