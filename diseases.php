<?php

//-------------------Парсим с сайта раздел "Болезни"--------------------------//

require_once 'phpquery.php';
ini_set('max_execution_time', 900);
$homepage = file_get_contents('http://www.diagnos.ru/diseases');
$doc = phpQuery::newDocument($homepage);
$count = count($doc->find('table')->find('a'));
$index = 0;

// Парсим названия категорий
for($j = 0; $j < $count; $j++)
{
    if($doc->find('table')->find('tr:eq('.$j.')')->find('td:eq(0)')->text() != NULL)
    {
        $group[$index][0] = $doc->find('table')->find('a:eq('.$j.')')->text();
        $group[$index][1] = $doc->find('table')->find('a:eq('.$j.')')->attr('href');
        $index++;
    }
}

echo "<br> 1 FINISH";
echo "<br>".date('l jS \of F Y h:i:s A');

$count_group = count($group);
$f = 0;

// Парсим названия болезней
for($q = 0; $q < $count_group - 1; $q++)
{
    $url = file_get_contents('http://www.diagnos.ru'.$group[$q][1]);
    $doc = phpQuery::newDocument($url);
    $count_list = count($doc->find('table')->find('a'));
    for($k = 0; $k < $count_list; $k++)
    {
        $list[$f][0] = $group[$q][0];
        $list[$f][1] = $doc->find('table')->find('a:eq('.$k.')')->text();
        $list[$f][2] = $doc->find('table')->find('a:eq('.$k.')')->attr('href');
        $f++;
    }
}

echo "<br> 2 FINISH";
echo "<br>".date('l jS \of F Y h:i:s A');

// Парсим статью с описанием для каждой болезни
$count_listF = count($list);
for($i = 0; $i < $count_listF; $i++)
{
    $url = file_get_contents('http://www.diagnos.ru'.$list[$i][2]);
    $doc2 = phpQuery::newDocument($url);
    $list[$i][2] = $doc2->find('.roomy:eq(1)')->text();
}
echo "<br> 3 FINISH";
echo "<br>".date('l jS \of F Y h:i:s A');
phpQuery::unloadDocuments($homepage);
phpQuery::unloadDocuments($url);
echo "<br> DONE <br><hr>";
?>