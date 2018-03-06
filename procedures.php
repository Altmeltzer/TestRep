<?php

require_once 'phpquery.php';
ini_set('max_execution_time', 900);
$homepage = file_get_contents('http://www.diagnos.ru/procedures');
$doc = phpQuery::newDocument($homepage);
$count = count($doc->find('table')->find('a'));
$index = 0;
for($j = 0; $j < $count; $j++)
{
    if($doc->find('table')->find('tr:eq('.$j.')')->find('td:eq(0)')->text() != NULL)
    {
        $group[$index][0] = $doc->find('table')->find('a:eq('.$j.')')->text();
        $group[$index][1] = $doc->find('table')->find('a:eq('.$j.')')->attr('href');
        $index++;
    }
}
//print_r($group);
$count_group = count($group);
$f = 0;
for($q = 0; $q < $count_group; $q++)
{
    $url = file_get_contents('http://www.diagnos.ru'.$group[$q][1]);
    $doc = phpQuery::newDocument($url);
    $count_list = count($doc->find('table')->find('a'));
    for($k = 0; $k < $count_list; $k++)
    {
        $list[$f][0] = $doc->find('table')->find('a:eq('.$k.')')->text();
        $list[$f][1] = $doc->find('table')->find('a:eq('.$k.')')->attr('href');
        $f++;
    }
}
//print_r($list);
$count_listF = count($list);
for($i = 0; $i < $count_listF; $i++)
{
    $url = file_get_contents('http://www.diagnos.ru'.$list[$i][1]);
    $doc2 = phpQuery::newDocument($url);
    $listFin[$i][0] = $list[$i][0];
    $listFin[$i][1] = $doc2->find('.roomy:eq(1)')->html();
}
//echo $listFin;
//var_dump($listFin);
print_r($listFin);
phpQuery::unloadDocuments($homepage);
phpQuery::unloadDocuments($url);
?>