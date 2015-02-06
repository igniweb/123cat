<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model {

	use SoftDeletes;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
     * Default timestamps usage.
     *
     * @var bool
     */
    public $timestamps = true;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['role', 'email', 'name', 'avatar'];

	/**
     * "Carbonated" fields.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

}
