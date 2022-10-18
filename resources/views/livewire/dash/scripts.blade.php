<script>
    document.addEventListener('livewire:load', function() {

//-------------------------------------------------------------------------------------//
        //                        TOP 5 PRODUCTS
        // ------------------------------------------------------------------------------------//
        var optionsTop = {
            series: [
                parseFloat(@this.top5Data[0]['total']),
                parseFloat(@this.top5Data[1]['total']),
                parseFloat(@this.top5Data[2]['total']),
                parseFloat(@this.top5Data[3]['total']),
                parseFloat(@this.top5Data[4]['total'])
            ],
            chart: {
                height: 392,
                type: 'donut',
            },
            labels: [@this.top5Data[0]['product'],
                @this.top5Data[1]['product'],
                @this.top5Data[2]['product'],
                @this.top5Data[3]['product'],
                @this.top5Data[4]['product']
            ],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };


        var chartTop = new ApexCharts(document.querySelector("#chartTop5"), optionsTop);
        chartTop.render();




        //-------------------------------------------------------------------------------------//
        //                                  WEEK SALES
        // ------------------------------------------------------------------------------------//
        var optionsArea = {
            chart: {
                height: 380,
                type: 'area',
                stacked: false,
            },
            stroke: {
                curve: 'straight'
            },
            dataLabels: {
                enabled: true,
                formatter: function(val) {
                    return '$' + parseFloat(val).toFixed(2);
                },
                offsetY: -5,
                style: {
                    fontSize: '12px',
                    colors: ["#304758"]
                }
            },
            series: [{
                name: "Day Sale",
                data: [
                    parseFloat(@this.weekSales_Data[0]),
                    parseFloat(@this.weekSales_Data[1]),
                    parseFloat(@this.weekSales_Data[2]),
                    parseFloat(@this.weekSales_Data[3]),
                    parseFloat(@this.weekSales_Data[4]),
                    parseFloat(@this.weekSales_Data[5]),
                    parseFloat(@this.weekSales_Data[6])
                ]
            }, ],
            xaxis: {
                categories: ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'],
            },
            tooltip: {
                followCursor: true
            },
            fill: {
                opacity: 1,
            },

        }

        var chartArea = new ApexCharts(
            document.querySelector("#chartArea"),
            optionsArea
        );

        chartArea.render();


//-------------------------------------------------------------------------------------//
        //                        SALES BY MONTH
        // ------------------------------------------------------------------------------------//
        var optionsMonth = {
            series: [{
                name: 'Ventas del mes',
                data: @this.salesByMonth_Data
            }],
            chart: {
                height: 350,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    dataLabels: {
                        position: 'top',
                    },
                }
            },
            dataLabels: {
                enabled: true,
                formatter: function(val) {
                    return '$' + val;
                },
                offsetY: -20,
                style: {
                    fontSize: '12px',
                    colors: ["#304758"]
                }
            },

            xaxis: {
                categories: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                position: 'top',
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                crosshairs: {
                    fill: {
                        type: 'gradient',
                        gradient: {
                            colorFrom: '#D8E3F0',
                            colorTo: '#BED1E6',
                            stops: [0, 100],
                            opacityFrom: 0.4,
                            opacityTo: 0.5,
                        }
                    }
                },
                tooltip: {
                    enabled: true,
                }
            },
            yaxis: {
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false,
                },
                labels: {
                    show: false,
                    formatter: function(val) {
                        return '$' + val;
                    }
                }

            },
            title: {
                text: totalYearSales(),
                floating: true,
                offsetY: 330,
                align: 'center',
                style: {
                    color: '#444'
                }
            }
        };

        var chartMonth = new ApexCharts(document.querySelector("#chartMonth"), optionsMonth);
        chartMonth.render();

        function totalYearSales() {
            var total = 0
            @this.salesByMonth_Data.forEach(item => {
                total += parseFloat(item)
            });

            return 'Total: $' + total.toFixed(2)
        }


        // ESCUCHAR EVENTO CHANGE DEL AÑO SELACCIONADO PARA ACTUALIZAR GRAFICOS
        window.addEventListener('reload-script', event => {


            // actualizar data gráfico semanal
            chartArea.updateSeries([{
                data: @this.weekSales_Data
            }])

            // actualizar data gráfico mensual
            chartMonth.updateSeries([{
                data: @this.salesByMonth_Data
            }])
            chartMonth.updateOptions({
                title: {
                    text: totalYearSales()
                }
            })


            // actualizar data gráfico 5 mas vendidos
            var newData = [
                parseFloat(@this.top5Data[0]['total']),
                parseFloat(@this.top5Data[1]['total']),
                parseFloat(@this.top5Data[2]['total']),
                parseFloat(@this.top5Data[3]['total']),
                parseFloat(@this.top5Data[4]['total'])
            ]                        
            chartTop.updateSeries(newData)


        })


    })







</script>