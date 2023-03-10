<?php

namespace App\Http\Controllers;

use App\Exports\munFacturacionExport;
use App\Exports\UsuariosExport;
use App\Traits\ExcelTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportesController extends Controller
{
    use ExcelTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reportesindex()
    {
        $nombre_archivo = "Municipio_Facturacion.xlsx";
        $data = new munFacturacionExport();
      return  $this->generarReporteExcel($data,$nombre_archivo);
    }

    
    public function RelTE(Request $request){
        
      $SUCCESS = true;
      $NUMCODE = 0;
      $STRMESSAGE = 'Exito';
      $response = "";

      try {

          $clavereporte = $request->CHAUX;
           
          if ($clavereporte === null){
             throw new Exception ('El parámetro CHAUX es obligatorio');
         }

         $query = "SELECT te.*
         FROM REPCENTRAL.TipoExportacion te
         INNER JOIN REPCENTRAL.Rel_RepTipoExp rte ON te.id = rte.idtipo
         INNER JOIN REPCENTRAL.Reportes rep  ON rep.id = rte.idReporte
         WHERE 1=1 ";
         $query =  $query . " and rep.Auxiliar='" . $request->CHAUX . "'";
         $response = DB::select($query);


      } catch (\Exception $e) {
          $NUMCODE = 1;
          $STRMESSAGE = $e->getMessage();
          $SUCCESS = false;
      }

      return response()->json(
          [
              'NUMCODE' => $NUMCODE,
              'STRMESSAGE' => $STRMESSAGE,
              'RESPONSE' => $response,
              'SUCCESS' => $SUCCESS
          ]
      );

  }
    
    

}
