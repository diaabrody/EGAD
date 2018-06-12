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
                    <div id="pieChart1" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>   
                </div><!--card-block-->
            </div><!--card-->
        </div><!--col-->
        <div class="col-md-6">
          <div class="card">
              <div class="card-header">
                  <strong><center>Kidnap/Lost Age Ratio</center></strong>
              </div><!--card-header-->
              <div class="card-block">
                  <div id="pieChart2" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>   
              </div><!--card-block-->
          </div><!--card-->
      </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong><center>Kidnap/Lost Per Month/Year</center></strong>
            </div><!--card-header-->
            <div class="card-block">
                <div id="lineChart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>   
            </div><!--card-block-->
        </div><!--card-->
      </div> 
  </div><!--row-->
    
    <script>
Highcharts.chart('pieChart1', {
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

Highcharts.chart('pieChart2', {
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
      name: 'Younger Than One Year Old',
      y: parseInt(<?php echo $youngerThanOneYear; ?>),
      sliced: true,
      selected: true
    },{
      name: 'from 1 To 5 Years Old',
      y: parseInt(<?php echo $from1To5; ?>),
      sliced: true,
      selected: true
    },{
      name: 'from 6 To 10 Years Old',
      y: parseInt(<?php echo $from6To10; ?>)
    },{
      name: 'from 11 To 20 Years Old',
      y: parseInt(<?php echo $from11To20; ?>)
    },{
      name: 'Bigger Than 20 Years Old',
      y: parseInt(<?php echo $biggerThanTwentyYear; ?>)
    }, 
  ]
  }]
});


Highcharts.chart('lineChart', {
    chart: {
        type: 'line'
    },
    title: {
        text: ''
    },
    xAxis: {
        categories: [   
          @foreach($lostPerYear as $lpy)
    
      '{{ $lpy->month }}/{{ $lpy->year }}',

    @endforeach

]
    },
    yAxis: {
        title: {
            text: 'Lost Numbers'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Revenue',
        data:[
              @foreach($lostPerYear as $lpy)
    {{ $lpy->id }},
    @endforeach

        ]
    }]
});
    </script>
@endsection
