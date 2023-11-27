{{-- 散布図 --}}
@props([
'records' => [],
])

<canvas id="custom_scatter_chart"></canvas>
<script>
    ////////////////////////////////////////////////////////////////////////////////
    // 処理部

    // グラフ表示用のデータを作成
    var levelList = [
        @foreach($records as $record)
        { 'x':new Date("{{ $record['created_at']->format('Y-m-d H:i:s') }}"), 'y':{{ $record['level'] }} * 100 }, // レンジを合わせるため100倍
        @endforeach
    ];
    var mentalList = [
        @foreach($records as $record)
        { 'x':new Date("{{ $record['created_at']->format('Y-m-d H:i:s') }}"), 'y':{{ $record['mental'] }} },
        @endforeach
    ];
    var physicalList = [
        @foreach($records as $record)
        { 'x':new Date("{{ $record['created_at']->format('Y-m-d H:i:s') }}"), 'y':{{ $record['physical'] }} },
        @endforeach
    ];
    var lifeList = [
        @foreach($records as $record)
        { 'x':new Date("{{ $record['created_at']->format('Y-m-d H:i:s') }}"), 'y':{{ $record['life'] }} },
        @endforeach
    ];
    var societyList = [
        @foreach($records as $record)
        { 'x':new Date("{{ $record['created_at']->format('Y-m-d H:i:s') }}"), 'y':{{ $record['society'] }} },
        @endforeach
    ];

    // レンジの算出
    var maxDate = new Date();
    maxDate.setHours(23);
    maxDate.setMinutes(59);
    maxDate.setSeconds(59);
    var minDate = new Date(maxDate);
    minDate.setMonth(maxDate.getMonth() - 1);
    console.log('Range MinDate:[' + StressCheck.formatDate(minDate) + '], MaxDate:[' + StressCheck.formatDate(maxDate) + ']');

    //　グラフの作成
    var context = document.getElementById("custom_scatter_chart");
    scatterChart = new Chart(context, { // グローバル変数
        type: 'scatter',
        data: {
            // labels: ['8月1日', '8月2日', '8月3日', '8月4日', '8月5日', '8月6日', '8月7日'],
            datasets: [
                {
                    label: '総合',
                    data: levelList,
                    lineTension: 0, // 線グラフの補間レベル
                    backgroundColor: "rgba(49, 176, 106, 0.2)", // 領域の塗りつぶしの色
                    borderColor: "#31b56a", // 線の色
                    borderWidth: 2, // 線の幅
                    pointStyle: "circle", // 点の形状
                    pointRadius: 6, // 点形状の半径
                    pointBorderColor: "#31b56a", // 点の境界線の色
                    pointBorderWidth: 2, // 点の境界線の幅
                    pointBackgroundColor: "#bee395", // 点の塗りつぶし色
                    showLine: true,
                },
                {
                    label: '心理',
                    data: mentalList,
                    lineTension: 0, // 線グラフの補間レベル
                    backgroundColor: "rgba(0, 0, 0, 0)", // 領域の塗りつぶしの色
                    borderColor: "rgba(255, 0, 0, 1.0)", // 線の色
                    borderWidth: 2, // 線の幅
                    pointStyle: "circle", // 点の形状
                    pointRadius: 3, // 点形状の半径
                    pointBorderColor: "rgba(255, 0, 0, 1.0)", // 点の境界線の色
                    pointBorderWidth: 2, // 点の境界線の幅
                    pointBackgroundColor: "rgba(255, 0, 0, 1.0)", // 点の塗りつぶし色
                    showLine: true,
                },
                {
                    label: '身体',
                    data: physicalList,
                    lineTension: 0, // 線グラフの補間レベル
                    backgroundColor: "rgba(0, 0, 0, 0)", // 領域の塗りつぶしの色
                    borderColor: "rgba(0, 255, 0, 1.0)", // 線の色
                    borderWidth: 2, // 線の幅
                    pointStyle: "circle", // 点の形状
                    pointRadius: 3, // 点形状の半径
                    pointBorderColor: "rgba(0, 255, 0, 1.0)", // 点の境界線の色
                    pointBorderWidth: 2, // 点の境界線の幅
                    pointBackgroundColor: "rgba(0, 255, 0, 1.0)", // 点の塗りつぶし色
                    showLine: true,
                },
                {
                    label: '生活',
                    data: lifeList,
                    lineTension: 0, // 線グラフの補間レベル
                    backgroundColor: "rgba(0, 0, 0, 0)", // 領域の塗りつぶしの色
                    borderColor: "rgba(0, 0, 255, 1.0)", // 線の色
                    borderWidth: 2, // 線の幅
                    pointStyle: "circle", // 点の形状
                    pointRadius: 3, // 点形状の半径
                    pointBorderColor: "rgba(0, 0, 255, 1.0)", // 点の境界線の色
                    pointBorderWidth: 2, // 点の境界線の幅
                    pointBackgroundColor: "rgba(0, 0, 255, 1.0)", // 点の塗りつぶし色
                    showLine: true,
                },
                {
                    label: '社会',
                    data: societyList,
                    lineTension: 0, // 線グラフの補間レベル
                    backgroundColor: "rgba(0, 0, 0, 0)", // 領域の塗りつぶしの色
                    borderColor: "rgba(0, 255, 255, 1.0)", // 線の色
                    borderWidth: 2, // 線の幅
                    pointStyle: "circle", // 点の形状
                    pointRadius: 3, // 点形状の半径
                    pointBorderColor: "rgba(0, 255, 255, 1.0)", // 点の境界線の色
                    pointBorderWidth: 2, // 点の境界線の幅
                    pointBackgroundColor: "rgba(0, 255, 255, 1.0)", // 点の塗りつぶし色
                    showLine: true,
                },
            ],
        },
        options: {
            maintainAspectRatio: false,
/*
            title: {
                display: true,
                text: '元気レベル'
            },
*/
            legend: { // 凡例のボックスサイズ
                labels: {
                    boxWidth: 30, // defaultは40px
                }
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: '日にち'
                    },
                    type: 'time',
                    time: {
                        unit: 'week',
                        displayFormats: { // 目盛りの書式
                            week: 'MM/DD',
                        }
                    },
                    ticks: {
                        min: minDate,
                        max: maxDate,
/*
                        callback: function (value, index, values) {
                            if(index == 0 || index == values.length-1) {
                                return StressCheck.formatDate(new Date(value), "MM/DD");
                            }
                            return null;
                        },
*/
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: '元気レベル'
                    },
                    ticks: {
                        min: 0,
                        //max: 1120,
                        max: 800,
                        stepSize: 100,
                        callback: function (value, index, values) {
                            //console.log('Value:[' + value + '], Index:[' + index + '], Values:[' + values + ']');
                            if(value > 0) {
                                return value / 100;
                            }
                            else {
                                return '';
                            }
                        },
                    },
                }],
            },
        }
    });
</script>