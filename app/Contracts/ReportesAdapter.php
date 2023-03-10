<?php

namespace App\Contracts;

interface ReportesAdapter
{
    public function crearReporte($collection, $nombre_archivo);
}
