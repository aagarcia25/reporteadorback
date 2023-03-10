<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SelectController extends Controller
{
    public function SelectIndex(Request $request)
    {


        $SUCCESS = true;
        $NUMCODE = 0;
        $STRMESSAGE = 'Exito';
        $response = "";

        try {
            $type = $request->NUMOPERACION;

           
            if ($type === null){
               throw new Exception ('El parámetro NUMOPERACION es obligatorio');
            }

            if ($type == 1) {
                // Select de usuarios
                $idusuario = $request->CHUSER;
                if ($idusuario === null){
                    throw new Exception ('El parámetro CHUSER es obligatorio');
                 }

                $query = "SELECT 
                distinct rep.Auxiliar AS value, rep.Descripcion AS label FROM 
                REPCENTRAL.UsuariosReportes ur
                INNER JOIN REPCENTRAL.Reportes rep ON ur.idReporte = rep.id
                WHERE ur.deleted=0 and rep.deleted=0";
                $query =  $query . " AND ur.idUsuarioCentral='" . $idusuario . "'";
               
            } else if ($type == 2) {
                $query = "SELECT mes AS value, Descripcion   as label FROM PDRMYE.Meses WHERE deleted=0 ORDER BY mes asc";
            } else if ($type == 3) {
                $query = "SELECT id value ,Nombre label FROM PDRMYE.Municipios ORDER BY OrdenSFTGNL";
            } else if ($type == 4) {
                $query = "SELECT b.id AS value, b.Clave	 as label FROM PDRMYE.Fondos b WHERE b.deleted=0";
            } 
            
            
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
