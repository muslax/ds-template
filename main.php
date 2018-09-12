<? include('before-main.php');

if ($content['page-type'] == 'page') { ?>
<article>

<h2><?= h($content['page-title']) ?></h2>

<p class="postdate"><?= strftime('%A, %d %B %Y', $post['post-timestamp']) ?></p>

<?= $content['page-body'] ?>

</article>

<?   
} else {
    $count = 0;
    if (isset($content['posts'])) foreach ($content['posts'] as $post) { ?>
<? if ($count > 0 && $post['post-is-first-on-date']): ?>        
<div class="dateline"><span><?= strftime('%A, %d %B %Y', $post['post-timestamp']) ?></span></div>

<? endif; ?>
<article class="<?= $post['post-type'] == 'link' ? 'linked' : '' ?>">

<h2><a href="<?= h($post['post-permalink-or-link']) ?>"><?= h($post['post-title']) ?></a><?= $post['post-type'] == 'link' ? '&nbsp;<a class="permalink" href="'. h($post['post-permalink']) .'">★</a>' : '' ?></h2>

<p time="<?= $post['post-timestamp'] ?>" class="postdate" style="display:none"><?= strftime('%A, %d %B %Y', $post['post-timestamp']) ?></p>

<?= $post['post-body'] ?>

</article>

<?  $count++;
    }
}

include('after-main.php');



