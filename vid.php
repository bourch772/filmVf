<?php
include('simple_html_dom.php');
$html = file_get_html($href);
$link = $html->find('iframe')[0]->src;
$html2 = file_get_html($link);
$vid = explode('"', $html2);
foreach ($vid as $lv) {
if (strpos($lv, '.mp4') !== false) {
    echo $lv;
}}
?>
