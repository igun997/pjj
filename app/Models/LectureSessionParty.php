<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LectureSessionParty
 * 
 * @property int $id
 * @property int $lecture_session_id
 * @property int $user_id
 * @property int $status
 * @property int $created
 * 
 * @property LectureSession $lecture_session
 * @property User $user
 *
 * @package App\Models
 */
class LectureSessionParty extends Model
{
	protected $table = 'lecture_session_party';
	public $timestamps = false;

	protected $casts = [
		'lecture_session_id' => 'int',
		'user_id' => 'int',
		'status' => 'int',
		'created' => 'int'
	];

	protected $fillable = [
		'lecture_session_id',
		'user_id',
		'status',
		'created'
	];

	public function lecture_session()
	{
		return $this->belongsTo(LectureSession::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
