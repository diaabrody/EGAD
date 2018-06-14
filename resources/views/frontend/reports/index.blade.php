@extends('frontend.layouts.app')

@section('title', app_name() . ' | Reports')

@section('content')
<div class="all-missing">
<h1>كل المفقودين</h1>
<input id="search-input" placeholder="Search for products" >

<div id="right-column">
  <div id="hits"></div>
<div id="pagination"></div>
</div>
<div id="left-column">

<div id="gender"></div>
<div id="city"></div>
<div id="area"></div>
<div id="calendar"></div>

</div>
</div>

<style>
  #left-column {
  float: left;
  width: 23%;
}
#right-column {
  width: 74%;
  margin-left: 26%;
}

.clear:after {
  content: '';
  display: table;
  clear: both;
}
  </style>
@endsection

