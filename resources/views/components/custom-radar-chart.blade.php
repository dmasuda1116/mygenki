{{-- レーダーチャート --}}
@props([
'data' => [
'mental' => 0,
'physical' => 0,
'life' => 0,
'society' => 0,
],
])

<canvas id="custom_radar_chart"></canvas>
<script>
    ////////////////////////////////////////////////////////////////////////////////
    // レーダーチャートの描画
    // 参考サイト:
    // <http://www.kogures.com/hitoshi/javascript/chartjs/index.html>
    // <https://misc.0o0o.org/chartjs-doc-ja/>
    // chart.update();でグラフの再描画が可能。（一回だけChromeのコンソールから値を変更できる。）
    // 
    // dataMap = { 心理: 999, ... };
    var drawChart = function (domObject, dataMap) {
        dataMap = dataMap || {};

        var labelList = [];
        var dataList = [];
        Object.keys(dataMap).forEach((category) => {
            labelList.push(category);
            dataList.push(dataMap[category] || 0); // 70～280
        });

        var context = domObject.getContext('2d');
        var chart = new Chart(context, {
            type: 'radar', // グラフの種類・レーダーチャート
            data: {
                labels: labelList, // 軸のラベル
                datasets: [
                    {
                        label: '',
                        data: dataList,
                        backgroundColor: 'rgba(49, 176, 106, 0.2)', // 領域の塗りつぶしの色
                        borderColor: '#31b56a', // 線の色
                        borderWidth: 2, // 線の幅
                        pointStyle: 'circle', // 点の形状
                        pointRadius: 6, // 点形状の半径
                        pointBorderColor: '#31b56a', // 点の境界線の色
                        pointBorderWidth: 2, // 点の境界線の幅
                        pointBackgroundColor: '#bee395', // 点の塗りつぶし色
                    },
                ],
            },
            options: {
                responsive: false,
/*
                title: {
                    // タイトル
                    display: true,
                    fontSize: 25,
                    fontColor: '#404040',
                    text: 'チェック結果',
                },
*/
                legend: {
                    position: 'bottom', // 凡例の表示位置
                    display: false, // ラベルを非表示
                },
                scale: {
                    pointLabels: {
                        // 軸のラベル（'国語'など）
                        fontSize: 16, // 文字の大きさ
                        fontColor: '#404040', // 文字の色
                    },
                    ticks: {
                        // 目盛り
                        min: 0, // 最小値
                        max: 300, // 最大値
                        stepSize: 50, // 目盛の間隔
                        fontSize: 12, // 目盛り数字の大きさ
                        fontColor: 'cyan', // 目盛り数字の色
                        display: false, // ラベルを非表示
                    },
                    angleLines: {
                        // 軸（放射軸）
                        display: true,
                        color: '#31b56a',
                    },
                    gridLines: {
                        // 補助線（目盛の線）
                        display: true,
                        color: '#bee395',
                    },
                },
                labels: {},
                devicePixelRatio: 1,
                responsive: true,
                maintainAspectRatio: false,
            },
        });
        return chart;
    };

    ////////////////////////////////////////////////////////////////////////////////
    // レーダーチャート表示
    var chartElement = window.document.getElementById('custom_radar_chart');
    radarChart = drawChart(chartElement, { // グローバル変数
        心理:{{ $data['mental'] }},
        身体:{{ $data['physical'] }},
        生活:{{ $data['life'] }},
        社会:{{ $data['society'] }},
    });
</script>