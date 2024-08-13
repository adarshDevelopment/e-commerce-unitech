@extends('backend.layouts.master')
@section('title', $title. ' '. $panel)

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('backend.includes.top_header')
    <!-- /.content-header -->


        <?php

            $months = array();
            $count = 0;
            while ($count <= 3 ){
                $months[] = date('M Y', strtotime("-".$count." month"));
                $count ++;
            }
               //echo $graph['month1'] = date('M Y'), strtotime("month");

        $dataPoints = array(
            array("y" => $graph['month4'], "label" => $months[3]),
            array("y" => $graph['month3'], "label" => $months[2]),
            array("y" => $graph['month2'], "label" => $months[1]),
            array("y" => $graph['month1'], "label" => $months[0]),



        );

        ?>
        <!-- Main content -->


        <section class="content">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    {{--                    <h3 class="card-title">{{$title}} {{$panel}}</h3>--}}
                </div>
                <div class="card-body">
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                </div>
            </div>
        </section>



    {{--        <div class="content">--}}
    {{--            <div class="container-fluid">--}}
    {{--                <div class="row">--}}
    {{--                    <div class="col-lg-6">--}}
    {{--                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>--}}

    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}


        <!-- /.content -->
    </div>

@endsection

@section('js')
    <script>
        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                title: {
                    text: "Sales each month"
                },
                axisY: {
                    title: "Number of Sales"
                },
                data: [{
                    type: "line",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

@endsection
