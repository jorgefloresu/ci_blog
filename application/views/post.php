<h1><?=$post->title?></h1>

<?=$post->content?>

<h2>Categories</h2>
<?php foreach ($categories as $category) :?>
    <?=$category->name?><br>
<?php endforeach; ?>

<h3>Author</h3>
<?=$post->first_name . ' ' . $post->last_name?>

<h3>Links</h3>
<a href="<?echo site_url()?>">Home</a> | <?=($this->session->user_id)?'<a href="'.site_url('/admin/dashboard').'">Admin Dashboard</a> | <a href="'.site_url('/admin/logout').'">Logout</a>':'<a href="'.site_url('/admin/register').'">Register</a> | <a href="'.site_url('/admin/login').'">Login</a>'?>
