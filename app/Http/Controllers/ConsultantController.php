<?php

namespace App\Http\Controllers;

use App\Models\Consultant;
use Carbon\Carbon;
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
        $consultant = DB::table('cao_usuario')->leftJoin('permissao_sistema', 'cao_usuario.co_usuario', '=', 'permissao_sistema.co_usuario')
            ->where('co_sistema', 1)
            ->where('in_ativo', 'S')
            ->whereIn('co_tipo_usuario', [0, 1, 2])
            ->get();
        $consultant_pluck = DB::table('cao_usuario')->leftJoin('permissao_sistema', 'cao_usuario.co_usuario', '=', 'permissao_sistema.co_usuario')
            ->where('co_sistema', 1)
            ->where('in_ativo', 'S')
            ->whereIn('co_tipo_usuario', [0, 1, 2])
            ->pluck('cao_usuario.no_usuario', 'cao_usuario.co_usuario');

        return view('consultor.index', compact('consultant', 'consultant_pluck'));
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
        if (isset($request->co_usuario)) {
            if ($request->start_date != null && $request->end_date != null) {
                $timeFrom = Carbon::createFromFormat('Y-m-d', $request->start_date)->toDateString();
                $timeTo = Carbon::createFromFormat('Y-m-d', $request->end_date)->toDateString();

                $liquid = DB::table('cao_os')
                    ->select('cao_os.*', 'cao_fatura.*', 'cao_usuario.no_usuario', DB::raw('sum(cao_fatura.valor) as fact_total'), DB::raw('sum(cao_fatura.total_imp_inc) as imp_total'), DB::raw('sum(cao_fatura.comissao_cn) as com_total'))
                    ->join('cao_fatura', 'cao_os.co_os', '=', 'cao_fatura.co_os')
                    ->join('cao_usuario', 'cao_os.co_usuario', '=', 'cao_usuario.co_usuario')
                    ->whereIn('cao_os.co_usuario', $request->co_usuario)
                    ->whereBetween('cao_fatura.data_emissao', [$timeFrom, $timeTo])
                    ->groupBy('cao_os.co_usuario')
                    ->get();

                $fix = DB::table('cao_salario')->whereIn('co_usuario', $request->co_usuario)->first();

                // $liquid_value = $liquid->sum('valor') - $liquid->sum('total_imp_inc');
                $fix_value = $fix ? $fix->brut_salario : null;
                return view('consultor.multi_show', compact('liquid', 'fix_value', 'timeFrom', 'timeTo'));
            } else {
                return redirect()->back()->with('warning', 'Please select both Start & End Date');
            }
        } else
            return redirect()->back()->with('warning', 'Your must select one Consultant name one checkbox first!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consultant  $consultant
     * @return \Illuminate\Http\Response
     */
    public function show($consultant)
    {
        $liquid = DB::table('cao_os')->join('cao_fatura', 'cao_os.co_os', '=', 'cao_fatura.co_os')->where('co_usuario', $consultant)->get();
        $fix = DB::table('cao_salario')->where('co_usuario', $consultant)->first();

        $liquid_value = $liquid->sum('valor') - $liquid->sum('total_imp_inc');
        $fix_value = $fix ? $fix->brut_salario : null;
        $comission = $liquid->sum('valor') - ($liquid->sum('total_imp_inc') * ($liquid->sum('total_imp_inc') / 100) * ($liquid->sum('comissao_cn') / 100));
        $lucro = $liquid_value - ($fix_value + $comission);

        // return $report->sum('valor') - $report->sum('total_imp_inc');
        return view('consultor.show', compact('liquid_value', 'fix_value', 'comission', 'lucro'));
    }

    public function showChart()
    {
        # code...

        $liquid = '';
        $rand_color = '';
        $usermcount = [];
        $monthArr = [];
        $label =  '';

        $countArr =  [];
        $position = [];

        for ($k = 1; $k <= 11; $k++) {
            $countArr[$k]['month_id'] = $k;
        }

        foreach ($countArr as $value) {
        }

        $consultant = DB::table('cao_usuario')
            ->join('permissao_sistema', 'cao_usuario.co_usuario', '=', 'permissao_sistema.co_usuario')
            ->join('cao_os', 'cao_os.co_usuario', '=', 'cao_usuario.co_usuario')
            ->join('cao_fatura', 'cao_os.co_os', '=', 'cao_fatura.co_os')
            ->where('permissao_sistema.co_sistema', 1)
            ->where('in_ativo', 'S')
            ->whereIn('co_tipo_usuario', [0, 1, 2])
            ->whereMonth('data_emissao', 9)
            ->groupBy('cao_usuario.co_usuario')
            // ->limit(3)
            // ->pluck('cao_usuario.no_usuario', 'cao_usuario.co_usuario');
            ->get();

        // dd($consultant);


        foreach ($consultant as $value) {
            // $data = DB::table('cao_os')
            //     ->select('cao_os.*', 'cao_fatura.*', 'cao_usuario.no_usuario')
            //     ->join('cao_fatura', 'cao_os.co_os', '=', 'cao_fatura.co_os')
            //     ->join('cao_usuario', 'cao_os.co_usuario', '=', 'cao_usuario.co_usuario')
            //     ->where('cao_os.co_usuario', $id)
            //     // ->whereMonth('cao_fatura.data_emissao', 6)
            //     // ->groupBy('cao_os.co_usuario')
            //     ->sum('valor') . ',';

            //TODO:: Here I'am manipulatig the date inside the invoice table ('cao_fatura') & the array of months to be represented on Chart
            // $queryDate = DB::table('cao_fatura')->select('data_emissao')
            //     ->join('cao_os', 'cao_fatura.co_os', '=', 'cao_os.co_os')
            //     ->where('cao_os.co_usuario', $id)
            //     ->get()
            //     ->groupBy(function ($date) {
            //         return Carbon::parse($date->data_emissao)->format('m'); // grouping by months
            //     });

            // foreach ($queryDate as $key => $value) {
            //     $usermcount[(int)$key] = count($value);
            // }

            $month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

            for ($i = 1; $i <= 12; $i++) {
                if (!empty($usermcount[$i])) {
                    $monthArr[$i]['count'] = $usermcount[$i];
                } else {
                    $monthArr[$i]['count'] = 0;
                }
                $monthArr[$i]['month'] = $month[$i - 1];
            }
            $count =  count($monthArr);
            //END of date manipulation
        }

        // TODO:: Here I'm placing the snippet of code in converted string form, from array of months above; 
        foreach ($month as $val) {
            $label .= "'$val'" . ',';
        }
        // END of conversion


        return view('consultor.chart_show', compact('consultant', 'liquid', 'count', 'rand_color', 'label', 'monthArr', 'countArr'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consultant  $consultant
     * @return \Illuminate\Http\Response
     */
    public function edit($consultant)
    {
        return view('consultor.chart_show');
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
