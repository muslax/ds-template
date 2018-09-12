<? 
// date_default_timezone_set('Asia/Jakarta');
// setlocale(LC_ALL, 'id_ID');
include('before-main.php');
if ($content['page-type'] == 'page') { ?>
<article>

<h2><?= h($content['page-title']) ?></h2>

<?= $content['page-body'] ?>

</article>
<?
} else {
    $post = $content['post']; ?>

<article class="<?= $post['post-type'] == 'link' ? 'linked' : '' ?>">

<? if ($post['post-type'] == 'link'): ?>
<h2><a href="<?= h($post['post-permalink-or-link']) ?>"><?= h($post['post-title']) ?></a></h2>
<? else: ?>
<h2><?= h($post['post-title']) ?></h2>
<p time="<?= $post['post-timestamp'] ?>" class="postdate">✪&nbsp;<?= strftime('%A, %d %B %Y', $post['post-timestamp']) ?></p>
<? endif; ?>

<?= $post['post-body'] ?>

<? if ($post['post-type'] == 'link'): ?>
<p time="<?= $post['post-timestamp'] ?>" class="postdate">✪&nbsp;<?= strftime('%A, %d %B %Y', $post['post-timestamp']) ?></p>
<? endif; ?>           
</article>

<? }
include('after-main.php');