<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nacimiento;

class NacimientoController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        
        $nacimientos=Nacimiento::all();
        return $nacimientos;

        /*$buscar=$request->buscar;
        $criterio=$request->criterio;
        if($buscar==''){
            $nacimientos=Nacimiento::orderBy('id','desc')->paginate(4);
        }else{
            $nacimientos=Nacimiento::where($criterio,'like','%'.$buscar.'%')
                                ->orderBy('id','desc')
                                ->paginate(3);
        }

        return[
            'pagination' => [
                'total'        => $nacimientos->total(),
                'current_page' => $nacimientos->currentPage(),
                'per_page'     => $nacimientos->perPage(),
                'last_page'    => $nacimientos->lastPage(),
                'from'         => $nacimientos->firstItem(),
                'to'           => $nacimientos->lastItem(),
            ],
            'nacimientos'=>$nacimientos
        ];*/
        
    }

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        try {
            $nacimientos = new Nacimiento();
            $nacimientos->libro=$request->libro;
            $nacimientos->folio=$request->folio;
            $nacimientos->n_partida=$request->n_partida;
            $nacimientos->fecha_r=$request->fecha_r;
            $nacimientos->fecha_n=$request->fecha_n;
            $nacimientos->apellidos=$request->apellidos;
            $nacimientos->nombres=$request->nombres;
            $nacimientos->anexo=$request->anexo;
            if ($request->hasFile('acta')) {
                $path = $request->file('acta')->store('fileupload');
                $fileinfo = $request->file('acta');
                
                $request->merge([
                    //'acta'              => $path,
                    'acta' => $fileinfo->getClientOriginalName(),
                ]);
            }
            $nacimientos->acta=$request->acta;
            // $request;
            $nacimientos->save();
        } catch (\Throwable $th) {
            throw $th;
            
        }
        
    }

    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        
        $encargados = Encargado::findOrFail($request->id);
        
        $nacimientos->libro=$request->libro;
        $nacimientos->folio=$request->folio;
        $nacimientos->n_partida=$request->n_partida;
        $nacimientos->fecha_r=$request->fecha_r;
        $nacimientos->fecha_n=$request->fecha_n;
        $nacimientos->apellidos=$request->apellidos;
        $nacimientos->nombres=$request->nombres;
        $nacimientos->anexo=$request->anexo;
        $nacimientos->acta=$request->acta;
        $nacimientos->save();
    }

    
}
