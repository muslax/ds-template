<? include('before-main.php'); 
$tahun = substr(trim($content['page-title']), -4);
?>


<article class="archives">
<h2>Catatan dan Komentar <?= $tahun ?></h2>
<? if($tahun == '2016' || $tahun == '2017'): ?>
<p style="color:#8f8f6f;margin-top:-2rem;margin-bottom:3rem;padding-left:0;"><em>&mdash; Arsip sebelum Juli 2018 masih dalam proses migrasi.</em></p>
<? endif; ?>
<?
// krsort($content['posts']);
$bulan = '';
if (isset($content['posts'])) foreach ($content['posts'] as $post) { ?>
<? if (date('F', $post['post-timestamp']) != $bulan): ?>
<h3><?= date('F', $post['post-timestamp']) ?></h3>
<? endif; ?>
<p class="<?= $post['post-type'] == 'link' ? '' : 'catatan' ?>"><span><?= $post['post-type'] == 'link' ? 'Komentar' : 'Catatan' ?></span><a href="<?= h($post['post-permalink']) ?>"><?= h($post['post-title']) ?></a>
<span>— <?= date('d F Y', $post['post-timestamp']) ?></span></p>

<? $bulan = date('F', $post['post-timestamp']);
} ?>

</article>
    
<? include('after-main.php'); ?>