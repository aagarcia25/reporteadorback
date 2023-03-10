<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class UsuarioController extends Controller
{


    public function menus($id)
    {
        $response = "";
        try {
            $query = "SELECT 
            men.*
            FROM 
            REPCENTRAL.Roles rol 
            INNER JOIN REPCENTRAL.UsuarioRol usr ON usr.idRol = rol.id
            INNER JOIN REPCENTRAL.RolMenu rm ON rm.idRol = rol.id
            INNER JOIN REPCENTRAL.Menus men ON men.id = rm.idMenu
            WHERE 1=1 and  ";
            $query =  $query . " usr.idUsuario='" . $id . "'";
            $response = DB::select($query);
        } catch (\Exception $e) {
            $response = '';
        }


        return $response;
    }

    public function Usuariosindex(Request $request){
        
        $SUCCESS = true;
        $NUMCODE = 0;
        $STRMESSAGE = 'Exito';
        $response = "";

        try {

            $iduser = $request->CHUSER;
             
            if ($iduser === null){
               throw new Exception ('El parámetro CHUSER es obligatorio');
           }

           $obj = new stdClass();
           $obj->Menus =  $this->menus($iduser);


           $response =$obj ;

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
