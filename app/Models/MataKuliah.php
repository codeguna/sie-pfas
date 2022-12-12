<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MataKuliah
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MataKuliah extends Model
{

  static $rules = [
    'name' => 'required',
  ];

  protected $perPage = 20;
  protected $table = 'mata_kuliah';

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['name'];
}
