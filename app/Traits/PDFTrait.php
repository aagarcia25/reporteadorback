<?php

namespace App\Traits;

use Barryvdh\DomPDF\Facade\Pdf;

trait PDFTrait
{
    public function generarPDF($data,$nombre_archivo,$vista)
    {

        view()->share('data', $data);
        $pdf = Pdf::loadView($vista);
        return $pdf->download($nombre_archivo.'.pdf');

    }

}
