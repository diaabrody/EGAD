

<div class="search" >
    <form action="/map" method="get">
    <input type="search"  name="search" placeholder="input location...">
    <input type="submit" value="Search">
    </form>
</div>


<div class="addMarker">
    <form action="map/addmarker" method="post">
        {{csrf_field()}}
        <input type="text" name="marker" placeholder="add Report Marker">
        <input type="submit" value="Add Marker">
    </form>
</div>


<div style="margin: auto; width: 1228px; height: 500px;">
    {!! Mapper::render() !!}
</div>