<h1>My Blog</h1>

<h2>Posts</h2>
<p>
  <div class-"row">
    <?php foreach ($posts as $post) :?>
      <!-- <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading"> -->
            <h3><a href="<?echo site_url('post/').$post->slug?>"><?=$post->title?></a></h3>
          <!-- </div>
          <div class="panel-body">             -->
            <p>
                <?=word_limiter($post->content, 1)?>
            </p>
            <a href="<?echo site_url('post/').$post->slug?>">Read more</a>
          <!-- </div>
        </div>
      </div> -->
    <?php endforeach; ?>
  <!-- </div> -->
</p>
<h2>Categories</h2>
<p>
    <?php foreach ($categories as $category) :?>
        <a href="<?echo site_url('category/').$category->id?>"><?=$category->name?></a><br>
    <?php endforeach; ?>
</p>

<h3>Links</h3>
<?=($this->session->user_id)?'<a href="'.site_url('/admin/dashboard').'">Admin Dashboard</a> | <a href="'.site_url('/admin/logout').'">Logout</a>':'<a href="'.site_url('/admin/register').'">Register</a> | <a href="'.site_url('/admin/login').'">Login</a>'?>
