<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Lecturer
 *
 * @property $id
 * @property $user_id
 * @property $nip
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Lecturer extends Model
{

  static $rules = [
    'user_id' => 'required',
    'nip' => 'required',
    'status' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['user_id', 'nip', 'status'];

  public function user()
  {
    return $this->belongsTo('App\User', 'id', 'user_id');
  }
}
