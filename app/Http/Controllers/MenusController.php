<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Http\Request;

class MenusController extends Controller
{
   /* SE IDENTIFICA EL TIPO DE OPERACION A REALIZAR
       1._ INSERTAR UN REGISTRO
       2._ ACTUALIZAR UN REGISTRO
       3._ ELIMINAR UN REGISTRO
       4._ CONSULTAR GENERAL DE REGISTROS, (SE INCLUYEN FILTROS)
    */
    public function menusindex(Request $request)
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
                $obj = new Menu();    
                $obj->ModificadoPor =       $request->CHUSER;
                $obj->CreadoPor =           $request->CHUSER;
                $obj->Menu =                $request->MENU;
                $obj->Descripcion =         $request->DESCRIPCION;
                $obj->MenuPadre =           $request->MENUPADRE;
                $obj->Path =                $request->PATH;
                $obj->Nivel =               $request->NIVEL;
                $obj->Orden =               $request->ORDEN;
                $obj->ControlInterno =      $request->CONTROLINTERNO;
                $obj->save();
                $response = $obj;
            } else if ($type == 2) {
                $obj = Menu::find($request->CHID);
                $obj->ModificadoPor =       $request->CHUSER;
                $obj->CreadoPor =           $request->CHUSER;
                $obj->Menu =                $request->MENU;
                $obj->Descripcion =         $request->DESCRIPCION;
                $obj->MenuPadre =           $request->MENUPADRE;
                $obj->Path =                $request->PATH;
                $obj->Nivel =               $request->NIVEL;
                $obj->Orden =               $request->ORDEN;
                $obj->save();
                $response = $obj;
            } else if ($type == 3) {
                $obj = Menu::find($request->CHID);
                $obj->deleted = 1;
                $obj->ModificadoPor = $request->CHUSER;
                $obj->save();
                $response = $obj;
            } else if ($type == 4) {
                $response = DB::select("SELECT  rm.*,rl.Menu menupadre  FROM  REPCENTRAL.Menus rm 
                LEFT JOIN REPCENTRAL.Menus rl ON rm.MenuPadre = rl.id
                WHERE rm.deleted=0 ORDER BY rm.nivel ");
            }
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
