<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $password
 * @property string $nik
 * @property string $nis
 * @property int $created
 *
 * @property Collection|ClassManager[] $class_managers
 * @property Collection|LectureSessionLog[] $lecture_session_logs
 * @property Collection|LectureSessionParty[] $lecture_session_parties
 * @property Collection|LectureTeacher[] $lecture_teachers
 * @property Collection|Role[] $roles
 *
 * @package App\Models
 */
class User extends Model implements JWTSubject,AuthenticatableContract, AuthorizableContract
{

	use Authenticatable, Authorizable;



	protected $table = 'users';
	public $timestamps = false;

	protected $casts = [
		'created' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'name',
		'username',
		'password',
		'nik',
		'nis',
		'created'
	];

	// Rest omitted for brevity

	 /**
		* Get the identifier that will be stored in the subject claim of the JWT.
		*
		* @return mixed
		*/
	 public function getJWTIdentifier()
	 {
			 return $this->getKey();
	 }

	 /**
		* Return a key value array, containing any custom claims to be added to the JWT.
		*
		* @return array
		*/
	 public function getJWTCustomClaims()
	 {
			 return [];
	 }

	public function class_managers()
	{
		return $this->hasMany(ClassManager::class);
	}

	public function lecture_session_logs()
	{
		return $this->hasMany(LectureSessionLog::class);
	}

	public function lecture_session_parties()
	{
		return $this->hasMany(LectureSessionParty::class);
	}

	public function lecture_teachers()
	{
		return $this->hasMany(LectureTeacher::class);
	}

	public function roles()
	{
		return $this->belongsToMany(Role::class, 'role_users')
					->withPivot('id', 'created');
	}
}
