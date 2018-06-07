<?php $__env->startSection('content'); ?>
    <h1>create report</h1>

<form method="post" enctype="multipart/form-data" action="/report/save" >
    <?php echo e(csrf_field()); ?>


    <div class="form-group">
<label for="name">اسم المفقود</label>
    <input type="text" name="name" class="form-control" placeholder="ادخل اسم المفقود">
</div>

<div class="form-group">
    <label for="gender">نوع</label>
    <select name="gender">
        <option value="1">ذكر</option>
        <option value="0">انثى</option>
    </select>

</div>

    <div class="form-control">
        <img src="" id="image">

    </div>
<div class="form-group">
    <label for="photo">صوره المفقود</label>
    <input type="file" name="photo" class="form-control" placeholder="ادخل الصوره" onchange="readURL(this);">
</div>

<div class="form-group">
    <label for="age">العمر</label>
    <input type="number" name="age" class="form-control" min="1" placeholder="ادخل العمر">
</div>

<div class="form-group">
    <label for="location">اين فقد</label>
    <input type="text" name="location" class="form-control" placeholder="ادخل المنطقه والمحافظه">
</div>

    <?php if($status == "normal" || $status == "quick"): ?>
    <div class="form-group">
        <label for="lost_since">منذ متي فقد</label>
        <input type="date"  name="lost_since" class="form-control" placeholder="منذ متي فقد">
    </div>

    <?php endif; ?>


<div class="form-group">
    <label for="special_sign">علامات مميزه</label>
    <textarea  name="special_sign" class="form-control" placeholder="ادخل علامات مميزه"></textarea>
</div>


<div class="form-group">
    <label for="reporter_phone_number">رقم تليفون المبلغ</label>
    <input type="text" name="reporter_phone_number" class="form-control" placeholder="ادخل رقم تليفون المبلغ">
</div>

    <input type="hidden" value="<?php echo e($status); ?>" name="status">

<button type="submit" class="btn btn-success">انشر بلاغ</button>


</form>


    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $("#image")
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>