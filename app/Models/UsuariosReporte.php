<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UsuariosReporte
 * 
 * @property string $id
 * @property string $deleted
 * @property Carbon $UltimaActualizacion
 * @property Carbon $FechaCreacion
 * @property string $ModificadoPor
 * @property string $CreadoPor
 * @property string $idUsuarioCentral
 * @property string $idReporte
 * 
 * @property Reporte $reporte
 *
 * @package App\Models
 */
class UsuariosReporte extends Model
{
	protected $table = 'UsuariosReportes';
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
		'idUsuarioCentral',
		'idReporte'
	];

	public function reporte()
	{
		return $this->belongsTo(Reporte::class, 'idReporte');
	}
}
