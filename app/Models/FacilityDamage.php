<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FacilityDamage
 *
 * @property $id
 * @property $bap_id
 * @property $facility_id
 * @property $description
 * @property $created_at
 * @property $updated_at
 *
 * @property Bap $bap
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class FacilityDamage extends Model
{

  static $rules = [
    'bap_id' => 'required',
    'facility_id' => 'required',
    'description' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['bap_id', 'facility_id', 'description'];
  protected $table = 'facility_damage';

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function bap()
  {
    return $this->hasOne('App\Models\Bap', 'id', 'bap_id');
  }
}
