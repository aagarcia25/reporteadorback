<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RelRepTipoExp
 * 
 * @property string $id
 * @property string $deleted
 * @property Carbon $UltimaActualizacion
 * @property Carbon $FechaCreacion
 * @property string $ModificadoPor
 * @property string $CreadoPor
 * @property string $idtipo
 * @property string $idReporte
 * 
 * @property Reporte $reporte
 * @property TipoExportacion $tipo_exportacion
 *
 * @package App\Models
 */
class RelRepTipoExp extends Model
{
	protected $table = 'Rel_RepTipoExp';
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
		'idtipo',
		'idReporte'
	];

	public function reporte()
	{
		return $this->belongsTo(Reporte::class, 'idReporte');
	}

	public function tipo_exportacion()
	{
		return $this->belongsTo(TipoExportacion::class, 'idtipo');
	}
}
