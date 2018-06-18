@extends('frontend.layouts.app')

@section('title', app_name() . ' | Reports')

@section('content')
<div class="all-missing">
<h1>كل المفقودين</h1>

<header>
<div id="search-input"></div>
<div id="search-input-icon"></div>
</header>
<div  class="row">
<div  class="col-md-10">
  <div id="stats"></div>
  <div id="hits"></div>
</div>
<div  class="col-sm-2 facet">
<div id="gender" class="facet"></div>
<div id="city" class="facet"></div>
<div id="area" class="facet"></div>
<div id="calendar" class="facet"></div>

</div>
</div>
<div id="pagination"></div>

</div>

@endsection

<style>
 
  
 
  header {
  position: relative;
  height: 80px;
  margin-top: 40px;
}

  #search-input input {
  font-size: 28px;
  font-weight: 100;
  width: 81%;
  margin-left: 26%;
  padding: 10px 0 6px;
  border: none;
  border-bottom: 5px solid #eee;
}
#search-input input, #search-input input:focus {
  transition: border-color .3s ease-in;
  outline: 0;
}
#search-input input:focus {
  border-color: #ed5565;
}
#search-input input::-webkit-input-placeholder, #search-input input:-moz-placeholder, #search-input input:-moz-placeholder, #search-input input:-ms-input-placeholder {
  font-weight: 100;
  color: #999;
}
#search-input-icon {
  position: relative;
}
#search-input-icon:before {
  position: absolute;
  left: 20%;
  bottom: 15px;
  width: 20px;
  height: 20px;
  content: '';
  cursor: default;
  background: url(img/frontend/search_icon.png) no-repeat;
}
#search-input-icon.empty:before {
  cursor: pointer;
  background-image: url(img/frontend/delete_icon.png);
}

#pagination {
  
  margin-top: 60px;
}
#pagination ul {
  font-size: 0;
  list-style-type: none;
  text-align: center;
}
#pagination li {
  font-size: 14px;
  display: inline;
}
#pagination a {
  padding: 8px 12px;
  text-decoration: none;
  color: #000;
  border: 1px solid #eee;
}
#pagination a:hover {
  background: #f5f5f5;
}
#pagination li:first-child a {
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
}
#pagination li:last-child a {
  border-right: 1px solid #eee;
  border-top-right-radius: 4px;
  border-bottom-right-radius: 4px;
}
#pagination li.ais-pagination--item__active a {
  color: white;
  border-color: #ed5565;
  background: #ed5565;
}
#pagination li.ais-pagination--item__active a:hover {
  cursor: default;
}
#pagination li.ais-pagination--item__disabled a {
  cursor: not-allowed;
}
#pagination li.ais-pagination--item__disabled a:hover {
  background: none;
}
/* STATS */

#stats .ais-stats--time {
  font-size: 0.8em;
  color: #999;
}
/* FACETS */
.facet {
  margin-bottom: 24px;
  font-size: 14px;
  color: #000;
}
.facet h5 {
  margin: 0 0 6px;
  padding: 0 0 6px;
  text-transform: uppercase;
  border-bottom: 2px solid #eee;
}
.facet ul {
  margin: 0;
  padding: 0;
  list-style-type: none;
}
.facet li {
  margin-bottom: 3px;
}

.facet a:visited,
.facet a {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

/* Collapsable FACETS */


.ais-refinement-list--label,
.ais-hierarchical-menu--list .facet-item,
.ais-menu--link,
.ais-price-ranges--item {
  cursor: pointer;
  line-height: 1.5em;
}
.ais-hierarchical-menu--list .ais-hierarchical-menu--item {
  margin: 3px 0;
}
.ais-hierarchical-menu--link:before {
  display: inline-block;
  font: normal normal normal 14px/1 FontAwesome;
  content: "\f105";
  padding: 0 5px 0 0;
}

.sffv_no-results{
  font-size: 13px;
  line-height: 1.2;
  padding-top: 6px;
}

.ais-refinement-list--label:hover,
.ais-refinement-list--item__active .ais-refinement-list--label,
.ais-menu--link:hover,
.ais-menu--item__active .ais-menu--link,
.ais-hierarchical-menu--list .facet-item.active:hover,
.ais-hierarchical-menu--list .facet-item.active {
  color: #ed5565;
}
.ais-refinement-list--item__active .ais-refinement-list--label:hover,
.ais-menu--item__active .ais-menu--link:hover,
.ais-hierarchical-menu--list .facet-item.active:hover {
  text-decoration: line-through;
  color: #ed5565;
}
.ais-refinement-list--count,
.ais-hierarchical-menu--count,
.ais-menu--count,
.ais-star-rating--count,
.ais-toggle--count {
  position: relative;
  top: -1px;
  float: right;
  color: #999;
}

#type.facet .ais-refinement-list--checkbox {
  display: none;
}

/* NO RESULTS */
.no-results #pagination, .no-results #sort-by, .no-results #stats, .no-results #facets {
  display: none;
}
#no-results-message {
  text-align: center;
}
#no-results-message p {
  font-size: 28px;
  font-weight: 100;
}
#no-results-message ul {
  list-style-type: none;
}
#no-results-message li {
  font-size: 12px;
  position: relative;
  display: inline-block;
  margin: 4px 2px;
  padding: 4px 28px 4px 8px;
  color: #999;
  border: 1px solid #ddd;
  border-radius: 12px;
}
#no-results-message li span.value {
  font-weight: bold;
  color: #000;
}
#no-results-message li a.remove img {
  position: absolute;
  top: 3px;
  right: 5px;
  float: right;
  width: 17px;
  height: 17px;
  opacity: .5;
}
#no-results-message li a.remove:hover img {
  opacity: 1;
}
a.clear-all {
  font-size: 12px;
  line-height: 1;
  display: inline-block;
  margin: 10px;
  padding: 8px 12px;
  text-decoration: none;
  color: black;
  border: 2px solid #ddd;
  border-radius: 4px;
}
a.clear-all:hover {
  transition: border-color .3s ease-in;
  border-color: #999;
}


/* Active filters */
.ais-current-refined-values {
  position: relative;
}

   .ais-refinement-list--checkbox {
    float: left !important;
    left:2px;

  }


  .ais-refinement-list--checkbox:after {
    clear:both;


  }
  .ais-refinement-list--count{
    border : 1px solid transparent;
    border-radius : 50%;
    background-color: rgba(18, 162, 237, 0.25);
    color : black;
    margin-left: 8px;
    padding: 0 4px;
  }

  .ais-refinement-list--label{
    display: block;
    margin:5px;
  }

    </style>