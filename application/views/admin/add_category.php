<h1>Add Category</h1>

<form method="post" action="<?echo site_url('/admin/add_category')?>">
  <div class="form-group <?=set_error('name')?>">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name" value="<?=set_value('name')?>">
      <?=form_error('name')?>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
