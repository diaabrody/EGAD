@extends ('backend.layouts.app')

@section ('title', app_name() . ' | '. __('labels.backend.access.roles.management'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Reports Managment
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">
                @include('backend.report.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th> Type </th>
                            <th> Phone Number </th>
                            <th> Child's Name </th>
                            <th> Child's Age </th>
                            <th> created by </th>
                            <th> Created at </th>
                            <th> Last Updated  </th>                            
                            <th> Actions </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($reports as $report)
                            <tr>
                                <td> {{$report->type}}</td>
                                <td>{{ ucwords($report->reporter_phone_number) }}</td>  
                                <td>{{$report->name}}</td>   
                                <td>{{$report->age}}</td>                                   
                                <td>{{$report->user->first_name}}</td> 
                                <td>{{ $report->created_at }}</td>
                                <td>{{ $report->updated_at }}</td>
                                <td>{!! $report->action_buttons !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $reports->count() !!} Reports total
                </div>
            </div><!--col-->

            <div class="col-5">
                    <div class="float-right">
                        {!! $reports->render() !!}
                    </div>
                </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
