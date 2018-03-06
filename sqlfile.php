<?php

include 'diseases.php';

$fp = fopen('diseases.sql', 'w');
fwrite($fp, "create table Diseases(id int auto_increment, name_cat text, name_dis text, desc_ text, primary key(id)); \r\n");
$l = 0;
$rezult = 0;
while($l < $count_listF)
{
    $s1 = str_replace("'","\"",$list[$l][0]);
    $s2 = str_replace("'","\"",$list[$l][1]);
    $s3 = str_replace("'","\"",$list[$l][2]);
    $str = "insert into Diseases (name_cat, name_dis, desc_) values ('".$s1."','".$s2."','".$s3."');\r\n";
    $rezult += fwrite($fp, $str);
    $l++;
}
echo round($rezult/1024)." KБ (".($rezult/1024)." КБ)";
?>