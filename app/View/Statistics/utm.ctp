<?php

/**
 * Представление для /statistics/utm/list
 *
 * @author Mansur
 */
?>
<h4>Utm Data</h4>
<pre style="margin-left:50px; font-size:10px;">
<?php
foreach ($data as $source => $data2) {
    echo $source . PHP_EOL;
    foreach ($data2 as $medium => $data3) {
        echo '....' . $medium . PHP_EOL;
        foreach ($data3 as $campaign => $data4) {
            echo '....' . '....' . $campaign . PHP_EOL;
            foreach ($data4 as $content => $data5) {
                echo '....' . '....' . '....' . $content . PHP_EOL;
                foreach ($data5 as $term) {
                    echo '....' . '....' . '....' . '....' . (is_null($term) ? 'NULL' : $term) . PHP_EOL;
                }
            }
        }
    }
}?>
</pre>
<nav aria-label="Pagination">
  <ul class="pagination text-center">
    <?php $pagePrevious = $page - 1?>
    <?php if ($pagePrevious < 1) : ?>
    <li class="pagination-previous disabled">Previous</li>
    <?php else : ?>
    <li class="pagination-previous"><a href="/statistics/utm/list?page=<?= $pagePrevious?>" aria-label="Previous page">Previous</a></li>
    <?php endif ?>
    <?php for ($i=1; $i<=$pagesCount; $i++) : ?>
    <?php if ($i === $page) : ?>
    <li class="current"><span class="show-for-sr">You're on page</span> <?= $i?></li>
    <?php else : ?>
    <li><a href="/statistics/utm/list?page=<?= $i?>" aria-label="Page <?= $i?>"><?= $i?></a></li>
    <?php endif ?>
    <?php endfor ?>
    <?php $pageNext = $page + 1?>
    <?php if ($pageNext <= $pagesCount) : ?>
    <li class="pagination-next"><a href="/statistics/utm/list?page=<?= $pageNext?>" aria-label="Next page">Next</a></li>
    <?php else : ?>
    <li class="pagination-next disabled">Next</li>
    <?php endif ?>
  </ul>
</nav>
