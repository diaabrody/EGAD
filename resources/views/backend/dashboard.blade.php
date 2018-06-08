@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <strong><center>Male - Female Kidnap/Lost Ratio</center></strong>
                </div><!--card-header-->
                <div class="card-block">
                    <div id="pieChart" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>   
                </div><!--card-block-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
    
    <script>
Highcharts.chart('pieChart', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: ''
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
        style: {
          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
        }
      }
    }
  },
  series: [{
    name: 'Brands',
    colorByPoint: true,
    data: [{
      name: 'Male',
      y: parseInt(<?php echo $male; ?>),
      sliced: true,
      selected: true
    },{
      name: 'Female',
      y: parseInt(<?php echo $female; ?>)
    },]
  }]
});
    </script>
@endsection
