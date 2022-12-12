<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Bap
 *
 * @property $id
 * @property $user_id
 * @property $employee_id
 * @property $ticket_code
 * @property $room_id
 * @property $mata_kuliah
 * @property $description
 * @property $status
 * @property $fixed_date
 * @property $created_at
 * @property $updated_at
 *
 * @property FacilityDamage[] $facilityDamages
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Bap extends Model
{

  static $rules = [
    'user_id' => 'required',
    'employee_id' => 'required',
    'ticket_code' => 'required',
    'room_id' => 'required',
    'mata_kuliah' => 'required',
    'status' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['user_id', 'employee_id', 'ticket_code', 'room_id', 'mata_kuliah', 'status', 'fixed_date'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function facilityDamages()
  {
    return $this->hasMany('App\Models\FacilityDamage', 'bap_id', 'id');
  }
}
