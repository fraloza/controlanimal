<?php

class ReportesController extends \BaseController {

    public function __construct()
    {        
        $this->beforeFilter(function(){
            if(!Auth::check()) {
                return View::make('error');
            }
        });
    }

    public function rep_x() {
        $data = DB::table('nacimientos as n')
                    ->join('categorias as c','c.id','=','n.idcategoria')
                    ->join('especies as e','e.id','=','n.idespecie')
                    ->join('servicios as s','s.id','=','n.idservicio')
                    ->join('lotes as l','l.id','=','n.idlote')
                    ->join('razas as r','r.id','=','n.idraza')
                    ->select('n.nombre','n.pedigree','n.sexo','n.fecha_nac','n.caracteristicas','n.observaciones','c.descripcion as etapa','e.descripcion as especie','s.descripcion as servicio','l.descripcion as lote','r.descripcion as raza')
                    ->where('n.estado',1)
                    ->orderBy('n.nombre','ASC')
                    ->get();

        return View::make('reportes.rep1')->with('animals',$data);
    }

    public function rep_y() {
        $data = DB::table('nacimientos as n')
                    ->join('produccions as p','p.idanimal','=','n.id')
                    ->join('categorias as c','n.idcategoria','=','c.id')
                    ->join('lotes as l','l.id','=','n.idlote')
                    ->join('parcelas as pa','pa.id','=','l.idparcela')
                    ->select('p.descripcion','p.cantidad','n.nombre','c.descripcion as etapa','l.descripcion as lote','pa.descripcion as parcela')
                    ->where('p.estado',1)
                    ->orderBy('p.descripcion','ASC')
                    ->get();

        return View::make('reportes.rep2')->with('prods',$data);
    }

    public function rep_z(){
        return View::make('reportes.rep3');
    }

    public function get_z(){
        $fecha = Input::get('fecha');
        $data = DB::select("SELECT n.nombre, n.pedigree, n.sexo, n.fecha_nac, n.caracteristicas, n.observaciones, COALESCE((select np.nombre from nacimientos as np where np.id=n.npadre),'') as padre, COALESCE((select nm.nombre from nacimientos as nm where nm.id=n.nmadre),'') as madre
            FROM nacimientos as n
            WHERE n.estado=1 AND n.fecha_nac = '$fecha'
            ORDER BY n.nombre ASC
            ");
        return $data;
    }

    public function rep_a(){
        return View::make('reportes.rep4');
    }

    public function get_a(){
        $fecha = Input::get('fecha');
        $data = DB::select("SELECT b.descripcion, n.nombre, n.pedigree, n.sexo, n.fecha_nac, n.caracteristicas, n.observaciones
            FROM nacimientos as n
                INNER JOIN bajas as b on n.id=b.idanimal
            WHERE b.estado=1 AND b.fecha = '$fecha'
            ORDER BY n.nombre ASC
            ");
        return $data;
    }

    public function rep_b(){
        return View::make('reportes.rep5');
    }

    public function get_b(){
        $fecha1 = Input::get('fecha1');
        $fecha2 = Input::get('fecha2');
        $data = DB::select("select e.id,e.descripcion,n.nombre,l.descripcion as lote,e.fecha,
                            TIMESTAMPDIFF(DAY,'".date('Y-m-d')."',e.fecha) as expire_days
                            from lactancias as e inner join nacimientos as n on e.idanimal=n.id
                                inner join lotes as l on l.id=n.idlote
                            where (e.fecha between '".$fecha1."' and '".$fecha2."')
            ");
        return $data;
    }

}