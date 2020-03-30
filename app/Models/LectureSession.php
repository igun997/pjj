<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LectureSession
 * 
 * @property int $id
 * @property int $lecture_id
 * @property string $name
 * @property string $welcome
 * @property int $start
 * @property int $end
 * @property string $password
 * @property int $max_entry
 * @property bool $allow_discuss
 * @property int $created
 * 
 * @property Lecture $lecture
 * @property Collection|LectureSessionLog[] $lecture_session_logs
 * @property Collection|LectureSessionParty[] $lecture_session_parties
 *
 * @package App\Models
 */
class LectureSession extends Model
{
	protected $table = 'lecture_session';
	public $timestamps = false;

	protected $casts = [
		'lecture_id' => 'int',
		'start' => 'int',
		'end' => 'int',
		'max_entry' => 'int',
		'allow_discuss' => 'bool',
		'created' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'lecture_id',
		'name',
		'welcome',
		'start',
		'end',
		'password',
		'max_entry',
		'allow_discuss',
		'created'
	];

	public function lecture()
	{
		return $this->belongsTo(Lecture::class);
	}

	public function lecture_session_logs()
	{
		return $this->hasMany(LectureSessionLog::class);
	}

	public function lecture_session_parties()
	{
		return $this->hasMany(LectureSessionParty::class);
	}
}
