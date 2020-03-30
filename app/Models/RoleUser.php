<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RoleUser
 * 
 * @property int $id
 * @property int $role_id
 * @property int $user_id
 * @property int $created
 * 
 * @property Role $role
 * @property User $user
 *
 * @package App\Models
 */
class RoleUser extends Model
{
	protected $table = 'role_users';
	public $timestamps = false;

	protected $casts = [
		'role_id' => 'int',
		'user_id' => 'int',
		'created' => 'int'
	];

	protected $fillable = [
		'role_id',
		'user_id',
		'created'
	];

	public function role()
	{
		return $this->belongsTo(Role::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
