<?php

require_once 'phpquery.php';
ini_set('max_execution_time', 900);
$homepage = file_get_contents('http://www.diagnos.ru/diet');
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
for($i = 1; $i < $count_group; $i++)
{
    $url = file_get_contents('http://www.diagnos.ru'.$group[$i][1]);
    $doc2 = phpQuery::newDocument($url);
    $listFin[$i][0] = $group[$i][0];
    $listFin[$i][1] = $doc2->find('.roomy:eq(1)')->html();
}
//echo $listFin;
//var_dump($listFin);
print_r($listFin);
phpQuery::unloadDocuments($homepage);
phpQuery::unloadDocuments($url);
?>