<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Reporte
 * 
 * @property string $id
 * @property string $deleted
 * @property Carbon $UltimaActualizacion
 * @property Carbon $FechaCreacion
 * @property string $ModificadoPor
 * @property string $CreadoPor
 * @property string $Nombre
 * @property string $Descripcion
 * @property string $Consulta
 * @property string $Auxiliar
 * @property string $Filtros
 * 
 * @property Collection|RelRepTipoExp[] $rel_rep_tipo_exps
 * @property Collection|UsuariosReporte[] $usuarios_reportes
 *
 * @package App\Models
 */
class Reporte extends Model
{
	protected $table = 'Reportes';
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
		'Consulta',
		'Auxiliar',
		'Filtros'
	];

	public function rel_rep_tipo_exps()
	{
		return $this->hasMany(RelRepTipoExp::class, 'idReporte');
	}

	public function usuarios_reportes()
	{
		return $this->hasMany(UsuariosReporte::class, 'idReporte');
	}
}
