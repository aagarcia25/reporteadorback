<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RolMenu
 * 
 * @property string $id
 * @property string $deleted
 * @property Carbon $UltimaActualizacion
 * @property Carbon $FechaCreacion
 * @property string $ModificadoPor
 * @property string $CreadoPor
 * @property string $idMenu
 * @property string $idRol
 * 
 * @property Role $role
 * @property Menu $menu
 *
 * @package App\Models
 */
class RolMenu extends Model
{
	protected $table = 'RolMenu';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'deleted' => 'binary'
	];

	protected $dates = [
		'UltimaActualizacion',
		'FechaCreacion'
	];

	protected $fillable = [
		'deleted',
		'UltimaActualizacion',
		'FechaCreacion',
		'ModificadoPor',
		'CreadoPor',
		'idMenu',
		'idRol'
	];

	public function role()
	{
		return $this->belongsTo(Role::class, 'idRol');
	}

	public function menu()
	{
		return $this->belongsTo(Menu::class, 'idMenu');
	}
}
