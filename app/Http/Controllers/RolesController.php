<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
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
                $obj = new Role();    
                $obj->ModificadoPor = $request->CHUSER;
                $obj->CreadoPor = $request->CHUSER;            
                $obj->Nombre =         $request->NOMBRE;    
                $obj->Descripcion =         $request->DESCRIPCION;
                $obj->save();
                $response = $obj;
            } else if ($type == 2) {
                $obj = Role::find($request->CHID);
                $obj->Descripcion =         $request->DESCRIPCION;
                $obj->ModificadoPor =       $request->CHUSER;
                $obj->save();
                $response = $obj;
            } else if ($type == 3) {
                $obj = Role::find($request->CHID);
                $obj->deleted = 1;
                $obj->ModificadoPor = $request->CHUSER;
                $obj->save();
                $response = $obj;
            } else if ($type == 4) {
                $response = DB::select("SELECT  rm.*  FROM  REPCENTRAL.Roles rm");
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
