<h1>Edit Post</h1>

<form method="post" action="<?echo site_url('/admin/edit_post/').$post->id?>">
  <div class="form-group <?=set_error('title')?>">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" id="title" value="<?=set_value('title',$post->title)?>">
      <?=form_error('title')?>
  </div>
  <!-- <div class="form-group <?=set_error('slug')?>">
      <label for="slug">SEO URL <small>(replace spaces with dashes)</small></label>
      <input type="text" class="form-control" name="slug" id="slug" value="<?=set_value('slug',$post->slug)?>">
      <?=form_error('slug')?>
  </div> -->
  <div class="form-group <?=set_error('content')?>">
      <label for="content">Content</label>
      <textarea class="form-control" rows="3" name="content" id="content"><?=set_value('content',$post->content)?></textarea>
      <?=form_error('content')?>
  </div>
  <p>
    Categories
  </p>
  <!-- categories -->
  <?php foreach ($categories as $category) :?>
  <div class="checkbox">
      <label>
          <input type="checkbox" name="category[]" value="<?=$category->id?>" <?=$category->checked?>>
              <?=$category->name?>
      </label>
  </div>
<?php endforeach; ?>
<div class="text-danger">
    <?=form_error('category[]')?>
</div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>

<script>
    CKEDITOR.replace( 'content' );
</script>
