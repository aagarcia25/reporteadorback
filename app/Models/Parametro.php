<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Parametro
 * 
 * @property string $id
 * @property string $deleted
 * @property Carbon $UltimaActualizacion
 * @property Carbon $FechaCreacion
 * @property string $ModificadoPor
 * @property string $CreadoPor
 * @property string $Nombre
 * @property string $Valor
 * @property string|null $Descripcion
 *
 * @package App\Models
 */
class Parametro extends Model
{
	protected $table = 'Parametros';
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
		'id',
		'deleted',
		'UltimaActualizacion',
		'FechaCreacion',
		'ModificadoPor',
		'CreadoPor',
		'Nombre',
		'Valor',
		'Descripcion'
	];
}
