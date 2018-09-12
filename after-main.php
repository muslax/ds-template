
<!--[[ After main -->
<? if (!empty($content['archives'])) { ?>
<nav id="archives">
<h3>Kalender Arsip Dolan Strenan</h3>
<p style="color:#8f8f6f;margin-top:-2rem;line-height:1.4"><em>&mdash; Arsip sebelum Juli 2018 masih dalam proses migrasi.</em></p>
<div>
<?  $years = array();
    foreach ($content['archives'] as $archive) {
        $y = $archive['archives-year'];
        if (!isset($years[$y])) $years[$y] = array();
        $years[$y][] = $archive['archives-month-number'];
    }

    $tds = array(1 => 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des');
    foreach ($years as $year => $months) { 
        echo "<table>\n";
        echo '<tr><th class="on" colspan="4"><a href="/' . $year . '">' . $year . '</a></th></tr>' . "\n";
        echo '<tr>';
        for ($i = 1; $i < 13; $i++) {
            if (in_array($i, $months)) echo '<td class="on"><a href="/'. $year .'/'. str_pad($i, 2, '0', STR_PAD_LEFT) .'/">'. $tds[$i] .'</a></td>';
            else echo '<td>'. $tds[$i] .'</td>';
            if ($i % 4 == 0) {
                if ($i == 12) echo "</tr>\n";
                else echo "</tr>\n<tr>";
            }
        }
        echo "</table>\n\n";
    }
?>
</div>
</nav>
<? } ?>

<footer>
<p>
<span>Temukan Dolan Strenan melalui:</span>
<span><a href="https://twitter.com/strenan_">Twitter</a> dan <a href="<?= $content['blog-url'] . 'rss.xml' ?>">RSS</a>.</span> 
</p>
<p><span>Strenan.net diberdayakan dengan <a href="http://overcrack.web.id/">Overcrack</a>.</span></p>
</footer>
</section>
</div>
</div>
<? if ($content['page-type'] == 'page' || $content['page-type'] == 'post'): ?>
<script type="text/javascript">
    document.addEventListener("keydown", function(zEvent) { 
    if(zEvent.ctrlKey && zEvent.code === "KeyM") {
        window.location.href = window.location.href + '=markdown';
    }
});
</script>
<? endif; ?>
</body>
</html>