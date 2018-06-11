@extends('frontend.layouts.app')

@section('title', app_name() . ' | Reports')

@section('content')
<div class="all-missing">
<h1>كل المفقودين</h1>
<input id="search-input" placeholder="Search for products" >
<div class="row">


  <div id="hits"></div>
 
  
</div>
<div id="pagination"></div>
<div id="gender"></div>
<div id="city"></div>
<div id="area"></div>
<div id="calendar"></div>

</div>
@endsection

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

/* INPUT */
header {
  position: relative;
  height: 80px;
  margin-top: 40px;
}
header img {
  position: absolute;
  top: 9px;
  left: 0;
  float: left;
  max-width: 23%;
}
#search-input input {
  font-size: 28px;
  font-weight: 100;
  width: 74%;
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
  right: 0;
  bottom: 15px;
  width: 20px;
  height: 20px;
  content: '';
  cursor: default;
  background: url(img/search_icon.png) no-repeat;
}
#search-input-icon.empty:before {
  cursor: pointer;
  background-image: url(img/delete_icon.png);
}

/* HITS */
#hits {
  margin: 4px 0;
  padding: 10px 0;
  border-top: 2px solid #eee;
}
.hit {
  font-size: 0;
  padding: 15px 0;
  border-bottom: 1px solid #eee;
}
.hit-name {
  margin: 0;
}
.hit-image {
  display: inline-block;
  width: 16%;
  text-align: center;
}
.hit-image img {
  max-width: 100%;
  max-height: 180px;
}
.hit-content {
  font-size: 13px;
  font-weight: 300;
  display: inline-block;
  width: 81%;
  margin-left: 3%;
  vertical-align: top;
}
.hit-stars {
  font-size: 17px;
  margin: 4px 0;
  color: #868686;
}

.hit-content .hit-age {
  float: right;
  margin-left: 20px;
  color: #ffffff;
  background: #383838;
  padding: 4px;
  border-radius: 3px;
}
.hit-content .hit-age, .hit-content .hit-name {
  font-weight: normal;
  margin-top: 0;
}

.hit-content em {
  font-style: normal;
  color: #ed5565;
  border-bottom: solid 1px rgba(244, 107, 91, 0.5);
}

.hit-content p {
  font-size: 13px;
}

.hit-area em {
  color: inherit;
}

.hit-category-breadcrumb {
  margin: 5px 0 2px 0;
}

  .hit-category-breadcrumb em {
    color: inherit;
  }

.hit-content .hit-area {
  color: #868686;
  margin: 1px 0 10px 0;
  font-size: 14px;
}

/* PAGINATION */
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
.ais-root__collapsible .ais-header h5:hover {
  border-color: #c5c5c5;
  transition : border 500ms ease-out;
}

.ais-root__collapsible.ais-root__collapsed .ais-header h5:hover {
  border-color: #333;
}

.ais-root__collapsible .ais-header h5:before {
  display: inline-block;
  font: normal normal normal 16px/1 FontAwesome;
  content: "\f106";
  float: right;
}

.ais-root__collapsible.ais-root__collapsed .ais-header h5:before {
  content: "\f107";
}

.ais-refinement-list--label,
.ais-hierarchical-menu--list .facet-item,
.ais-menu--link,
.ais-age-ranges--item {
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
  top: 3px;
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

/* SLIDER */
.ais-range-slider--target {
  margin: 40px 30px 50px 0;
  font-size: 13px;
}

.ais-range-slider--connect {
  background: #ed5565;
}

.ais-range-slider--handle {
  border-color: #ed5565;
}

.ais-body.ais-range-slider--body {
  left: 10px;
  position: relative;
}

/* Star Rating */
.ais-star-rating--star,
.ais-star-rating--star__empty {
  display: inline-block;
  width: 1em;
  height: 1em
}

.ais-star-rating--item__active {

}

.ais-star-rating--star:before {
  content: '\2605';
  color: #FBAE00
}

.ais-star-rating--star__empty:before {
  content: '\2606';
  color: #FBAE00
}

.ais-star-rating--link__disabled .ais-star-rating--star:before,.ais-star-rating--link__disabled .ais-star-rating--star__empty:before {
  color: #C9C9C9
}


/* age Ranges */
.ais-age-ranges--form {
  margin-top: 8px;
}
  .ais-age-ranges--currency {
    display: inline-block;
    margin-right: 4px;
  }

  .ais-age-ranges--input {
    display: inline-block;
    width: 50px;
    border-radius: 2px;
    border: solid 1px #ccc;
    font-weight: normal;
    font-size: 15px;
  }

  .ais-age-ranges--button {
    padding: 4px 7px;
    display: inline-block;
    margin: 0 0 0 6px;
  }

/* Toggle */
.ais-toggle--label {
  cursor: pointer;
}

/* RefinementList ShowMore */
.ais-show-more {
  font-weight: bold;
  opacity: .7;
  padding-left: 4px;
  position: relative;
  line-height: 25px;
  font-size: .9em;
}
.ais-show-more:hover,
.ais-show-more:focus {
  opacity: 1;
}
.ais-show-more:before {
  font-family: FontAwesome;
  font-style: inherit;
  font-weight: inherit;
  text-decoration: inherit;
  display: inline-block;
  position: relative;
  content: '';
  margin: 0 5px 0 0;
}

.ais-show-more__inactive:before {
  content: "\f0fe";
}

.ais-show-more__active:before {
  content: "\f146";
}

/* Active filters */
.ais-current-refined-values {
  position: relative;
}

/* FOOTER */
footer {
  font-size: 14px;
  margin-top: 200px;
  margin-bottom: 15px;
  text-align: center;
}
footer a {
  text-decoration: none;
  color: #ed5565;
}
footer a:hover {
  text-decoration: underline;
  color: #ed5565;
}

</style>