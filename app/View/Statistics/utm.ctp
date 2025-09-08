<?php

/**
 * Представление для /statistics/utm/list
 *
 * @author Mansur
 */
/* $source = '';
  $medium = '';
  $campaign = '';
  $content = '';
  $term = ''; */
echo '<pre>';
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
}
echo '</pre>';
