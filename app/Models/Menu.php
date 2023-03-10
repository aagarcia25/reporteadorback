<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Menu
 * 
 * @property string $id
 * @property string $deleted
 * @property Carbon $UltimaActualizacion
 * @property Carbon $FechaCreacion
 * @property string $ModificadoPor
 * @property string $CreadoPor
 * @property string $Menu
 * @property string $Descripcion
 * @property string|null $MenuPadre
 * @property string|null $Icon
 * @property string|null $Path
 * @property int $Nivel
 * @property int|null $Orden
 * @property string|null $ControlInterno
 * 
 * @property Collection|RolMenu[] $rol_menus
 *
 * @package App\Models
 */
class Menu extends Model
{
	protected $table = 'Menus';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'deleted' => 'binary',
		'Nivel' => 'int',
		'Orden' => 'int'
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
		'Menu',
		'Descripcion',
		'MenuPadre',
		'Icon',
		'Path',
		'Nivel',
		'Orden',
		'ControlInterno'
	];

	public function rol_menus()
	{
		return $this->hasMany(RolMenu::class, 'idMenu');
	}
}
