<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoExportacion
 * 
 * @property string $id
 * @property string $deleted
 * @property Carbon $UltimaActualizacion
 * @property Carbon $FechaCreacion
 * @property string $ModificadoPor
 * @property string $CreadoPor
 * @property string|null $Clave
 * @property string|null $Descripcion
 * 
 * @property Collection|RelRepTipoExp[] $rel_rep_tipo_exps
 *
 * @package App\Models
 */
class TipoExportacion extends Model
{
	protected $table = 'TipoExportacion';
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
		'Clave',
		'Descripcion'
	];

	public function rel_rep_tipo_exps()
	{
		return $this->hasMany(RelRepTipoExp::class, 'idtipo');
	}
}
