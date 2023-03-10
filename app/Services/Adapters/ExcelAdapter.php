<?php

namespace App\Services\Adapters;

use App\Contracts\ReportesAdapter;
use Maatwebsite\Excel\Facades\Excel;

class ExcelAdapter implements ReportesAdapter
{
    private Excel $reporteAdaptador;
    public function __construct(Excel $reporteAdaptador)
    {
        $this->reporteAdaptador = $reporteAdaptador;
    }

    public function crearReporte($collection, $nombre_archivo) {
        return $this->reporteAdaptador::download($collection, $nombre_archivo);
    }
}
