<?php

namespace App\Traits;

use App\Services\Adapters\ExcelAdapter;
use Maatwebsite\Excel\Facades\Excel;

trait ExcelTrait
{
    public function generarReporteExcel($data, $nombre_archivo){

        $reporteParaAdaptar = new ExcelAdapter(new Excel());

        return $reporteParaAdaptar->crearReporte($data,$nombre_archivo);

    }
}
