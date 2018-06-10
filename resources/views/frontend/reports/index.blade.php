@extends('frontend.layouts.app')

@section('title', app_name() . ' | Reports')

@section('content')
<div class="all-missing">
<h1>كل المفقودين</h1>
<div class="row">

@foreach ($reports as $report)


<div class="col-lg-4 col-md-12 col-sm-6 mb-5">
                        <div class="card">
                          <!-- <img class="card-img-top" src="{{ $report->photo }}" alt="Card image cap"> -->
                          <div style="height:350px; background-image: url('{{ $report->photo }}'); background-size:cover;" class="missing-img">

                          </div>
                          <div class="card-body">
                            <p class="card-text">الإسم: {{ $report->name }}</p>
                            <p class="card-text">السن: {{ $report->age }}</p>
                            <a href="/reports/{{ $report->id }}" class="btn btn-secondary">المزيد</a>
                          </div>
                        </div>
            </div>
@endforeach
</div>
</div>
@endsection

