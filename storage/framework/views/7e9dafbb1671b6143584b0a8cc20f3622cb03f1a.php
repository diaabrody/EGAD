<?php $__env->startSection('title', app_name() . ' | Reports'); ?>

<?php $__env->startSection('content'); ?>
<div>
<img src="<?php echo e($report->photo); ?>" alt="Avatar" style="height:200px">
    <hr>   
        <p>Name: <?php echo e($report->name); ?></p>
        <p> Age:<?php echo e($report->age); ?></p>     
        <p> Lost Since : <?php echo e($report->lost_since); ?></p>
        <p>Last Seen At :<?php echo e($report->last_seen_at); ?></p>     
        <p>Last Seen On : <?php echo e($report->last_seen_on); ?></p>
        <p> Weight:<?php echo e($report->weight); ?></p>     
        <p>Height : <?php echo e($report->height); ?></p>
        <p> The Color Of Eye:<?php echo e($report->eye_color); ?></p>     
        <p> The Color Of Hair  : <?php echo e($report->hair_color); ?></p>
        <p> Special Sign:<?php echo e($report->special_sign); ?></p>      
    <hr>    
</div>
<?php if(Auth::user()): ?>
<form role="form"  method="post" action="/reports/comment/<?php echo e($report->id); ?>">
     <?php echo e(csrf_field()); ?>

     <label>Comment:</label>
     <input type="text" name="comment" class="form-control" placeholder="Write Comment">
     <br> 
     <input type="submit" class="btn btn-primary" value="Write Comment"/>
</form>
<?php endif; ?>

<hr>  
<h1>Comments</h1>
<?php $__currentLoopData = $report->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
   <?php echo e($comment->text); ?>

   <?php echo e($comment->user->name); ?>

   <br>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>