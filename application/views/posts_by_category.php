<h1>Posts in Category <?=$category->name?></h1>

<h2>Posts</h2>
<p>
    <?php foreach ($posts as $post) :?>
        <h3><a href="<?echo site_url('/post/').$post->slug?>"><?=$post->title?></a></h3>
        <p>
            <?=word_limiter($post->content, 1)?>
        </p>
        <a href="<?=$post->slug?>">Read more</a>
    <?php endforeach; ?>
</p>

<h3>Links</h3>
<a href="<?echo site_url()?>">Home</a> | <?=($this->session->user_id)?'<a href="'.site_url('/admin/dashboard').'">Admin Dashboard</a> | <a href="'.site_url('/admin/logout').'">Logout</a>':'<a href="'.site_url('/admin/register').'">Register</a> | <a href="'.site_url('/admin/login').'">Login</a>'?>
