<?php

include 'diet.php';

$fp = fopen('diet.sql', 'w');
fwrite($fp, "create table Diet(id int auto_increment, name_diet text, desc text, primary key(id) ); \r\n");
$l = 0;
$rezult = 0;
while($l < $count_group)
{
    $s1 = str_replace("'","\"",$listFin[$l][0]);
    $s2 = str_replace("'","\"",$listFin[$l][1]);
    $str = "insert into Diet (name_diet, desc) values ('".$s1."','".$s2."');\r\n";
    $rezult += fwrite($fp, $str);
    $l++;
}
echo round($rezult/1024)." KБ (".($rezult/1024)." КБ)";
?>