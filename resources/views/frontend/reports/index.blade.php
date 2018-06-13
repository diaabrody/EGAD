@extends('frontend.layouts.app')

@section('title', app_name() . ' | Reports')

@section('content')
<div class="all-missing">
<h1>كل المفقودين</h1>
<input id="search-input" placeholder="Search for products" >
<div class="row">


  <div id="hits">
    
  </div>
 
  
</div>
<div id="pagination"></div>
<div id="gender"></div>
<div id="city"></div>
<div id="area"></div>
<div id="calendar"></div>

</div>
@endsection

