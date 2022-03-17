<?php

namespace App\Http\Controllers;

use App\Models\Consultant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultant = DB::table('cao_usuario')->leftJoin('permissao_sistema','cao_usuario.co_usuario','=','permissao_sistema.co_usuario')
            ->where('co_sistema',1)
            ->where('in_ativo','S')
            ->whereIn('co_tipo_usuario',[0,1,2])    
            ->get();

        return view('consultor.index',compact('consultant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return [$request->start_date,$request->consultant_id];
        $liquid = DB::table('cao_os')->join('cao_fatura','cao_os.co_os','=','cao_fatura.co_os')->where('co_usuario', $request->consultant_id)->get();
        $fix = DB::table('cao_salario')->where('co_usuario',$request->consultant_id)->first();

        $liquid_value = $liquid->sum('valor') - $liquid->sum('total_imp_inc');
        $fix_value = $fix->brut_salario;
        $comission = $liquid->sum('valor') - ($liquid->sum('total_imp_inc') * ($liquid->sum('total_imp_inc')/100) * ($liquid->sum('comissao_cn')/100) );
        $lucro = $liquid_value - ($fix_value + $comission);

        // return $report->sum('valor') - $report->sum('total_imp_inc');
        return view('consultor.show', compact('liquid_value','fix_value','comission','lucro'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consultant  $consultant
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $consultant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consultant  $consultant
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultant $consultant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consultant  $consultant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultant $consultant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consultant  $consultant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultant $consultant)
    {
        //
    }
}
