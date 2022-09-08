<script>
    'use strict';

    var ctx1 = document.getElementById('chartBar1').getContext('2d');
    new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: [<?php echo $label ?>],
            datasets: [
                <?php
                $query = '';
                // foreach ($consultant as $key => $value) {
                //     for ($i = 1; $i <= $count; $i++) {
                //         $query .= DB::table('cao_os')
                //             ->select('cao_os.*', 'cao_fatura.*', 'cao_usuario.no_usuario')
                //             ->join('cao_fatura', 'cao_os.co_os', '=', 'cao_fatura.co_os')
                //             ->join('cao_usuario', 'cao_os.co_usuario', '=', 'cao_usuario.co_usuario')
                //             ->where('cao_os.co_usuario', $key)
                //             ->whereMonth('data_emissao', $i)
                //             ->groupBy('cao_os.co_usuario')
                //             ->sum('valor') . ',';
                //     }
                // for ($i = 1; $i <= $count; $i++) {

                foreach ($consultant as $value) {
                    $rand_color = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
                    echo "{
                            label: '$value->no_usuario',
                            backgroundColor: '$rand_color',
                            data: [$value->valor]
                    },";
                }
                // }
                // }
                ?>
            ],
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: true,
                labels: {
                    display: false
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontSize: 14,
                        max: 32000
                    }
                }],
                xAxes: [{
                    barPercentage: 0.8,
                    ticks: {
                        beginAtZero: true,
                        fontSize: 14
                    }
                }]
            }
        }
    });
</script>