<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LectureSessionLog
 * 
 * @property int $id
 * @property int $lecture_session_id
 * @property int $type
 * @property int $user_id
 * @property string $content
 * @property int $lecture_session_log_id
 * @property int $created
 * 
 * @property LectureSession $lecture_session
 * @property LectureSessionLog $lecture_session_log
 * @property User $user
 * @property Collection|LectureSessionLog[] $lecture_session_logs
 *
 * @package App\Models
 */
class LectureSessionLog extends Model
{
	protected $table = 'lecture_session_logs';
	public $timestamps = false;

	protected $casts = [
		'lecture_session_id' => 'int',
		'type' => 'int',
		'user_id' => 'int',
		'lecture_session_log_id' => 'int',
		'created' => 'int'
	];

	protected $fillable = [
		'lecture_session_id',
		'type',
		'user_id',
		'content',
		'lecture_session_log_id',
		'created'
	];

	public function lecture_session()
	{
		return $this->belongsTo(LectureSession::class);
	}

	public function lecture_session_log()
	{
		return $this->belongsTo(LectureSessionLog::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function lecture_session_logs()
	{
		return $this->hasMany(LectureSessionLog::class);
	}
}
