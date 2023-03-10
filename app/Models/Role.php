<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property string $id
 * @property string $deleted
 * @property Carbon $UltimaActualizacion
 * @property Carbon $FechaCreacion
 * @property string $ModificadoPor
 * @property string $CreadoPor
 * @property string $Nombre
 * @property string $Descripcion
 * @property string $ControlInterno
 * 
 * @property Collection|RolMenu[] $rol_menus
 * @property Collection|UsuarioRol[] $usuario_rols
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'Roles';
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
		'Nombre',
		'Descripcion',
		'ControlInterno'
	];

	public function rol_menus()
	{
		return $this->hasMany(RolMenu::class, 'idRol');
	}

	public function usuario_rols()
	{
		return $this->hasMany(UsuarioRol::class, 'idRol');
	}
}
