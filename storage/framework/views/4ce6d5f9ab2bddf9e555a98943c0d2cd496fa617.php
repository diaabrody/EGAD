<?php $__env->startSection('my-map'); ?>
<div class="search" >
    <form action="/map" method="get">
    <input type="search"  name="search" placeholder="input location...">
    <input type="submit" value="Search">
    </form>
</div>

<?php if(session()->has('message')): ?>
    <div class="alert alert-success">
        <?php echo e(session()->get('message')); ?>

    </div>
<?php endif; ?>
<div class="addMarker">
    <form action="map/addmarker" method="post">
        <?php echo e(csrf_field()); ?>

        <input type="text" name="marker" placeholder="add Report Marker">
        <input type="submit" value="Add Marker">
    </form>
</div>


<div style="margin: auto; width: 1228px; height: 500px;">
    <?php echo Mapper::render(); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>