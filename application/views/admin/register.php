<h1>Register</h1>

<form method="post" action="<?echo site_url('/admin/register')?>">
  <div class="form-group <?=set_error('first_name')?>">
      <label for="first_name">First name</label>
      <input type="text" class="form-control" name="first_name" id="first_name" value="<?=set_value('first_name')?>">
      <?=form_error('first_name')?>
  </div>
  <div class="form-group <?=set_error('last_name')?>">
      <label for="last_name">Last name</label>
      <input type="text" class="form-control" name="last_name" id="last_name" value="<?=set_value('last_name')?>">
      <?=form_error('last_name')?>
  </div>
  <div class="form-group <?=set_error('email')?>">
      <label for="email">Email</label>
      <input type="text" class="form-control" name="email" id="email" value="<?=set_value('email')?>">
      <?=form_error('email')?>
  </div>
  <div class="form-group <?=set_error('password')?>">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password" id="password" value="<?=set_value('password')?>">
      <?=form_error('password')?>
  </div>
  <div class="form-group <?=set_error('passconf')?>">
      <label for="passconf">Password Confirmation</label>
      <input type="password" class="form-control" name="passconf" id="passconf" value="<?=set_value('passconf')?>">
      <?=form_error('passconf')?>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
