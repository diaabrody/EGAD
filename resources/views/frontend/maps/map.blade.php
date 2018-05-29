

<div class="search" >
    <form action="/map" method="get">
    <input type="search"  name="search" placeholder="input location...">
    <input type="submit" value="Search">
    </form>
</div>

<div style="width: 500px; height: 500px;">
    {!! Mapper::render() !!}
</div>