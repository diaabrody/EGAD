<html>
<form method="post" enctype="multipart/form-data" >
<div class="form-group">
<label for="childname">اسم المفقود</label>
    <input type="text" name="childname" class="form-control">
</div>

<div class="form-group">
    <label for="gender">نوع</label>
    <select name="gender">
        <option value="ذكر">ذكر</option>
        <option value="انثى">انثى</option>
    </select>

</div>
<div class="form-group">
    <label for="childimage">صوره المفقود</label>
    <input type="file" name="childimage" class="form-control">
</div>

<div class="form-group">
    <label for="childage">السن</label>
    <input type="text" name="childage" class="form-control">
</div>

<div class="form-group">
    <label for="childlocation">اين فقد</label>
    <input type="text" name="childlocation" class="form-control">
</div>

<div class="form-group">
    <label for="specialmark">علامات مميزه</label>
    <textarea  name="specialmark" class="form-control"></textarea>
</div>

<div class="form-group">
    <label for="phonenumber">رقم تليفون المبلغ</label>
    <input type="text" name="phonenumber" class="form-control">
</div>

<button type="submit" class="btn btn-success">انشر بلاغ</button>


</form>
</html>