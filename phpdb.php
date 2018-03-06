<?php

//--------------------------Заполняем БД-----------------------//

include 'diseases.php';

// Проверяем существует ли БД
if(!file_exists("test"))
{
    // если БД нет то создадим её и таблицу в ней 
    $db = new SQLite3(test);
    $db->query("create table Diseases(id number, name_cat text, name_dis text, desc text )");
    echo " <br> CREATE_ FINISH";
    echo "<br>".date('l jS \of F Y h:i:s A')."<br>";
}
else
{
    // если бд есть - то просто подключимся к ней и отчистим таблицу
    $db = new SQLite3(test);
    $db->query("delete from Diseases");
    echo " <br> DELETE_ FINISH";
    echo "<br>".date('l jS \of F Y h:i:s A')."<br>";
}

// Заполняем БД данными из массива
$idx = 0;
$indx = 1;
while($idx < $count_listF)
{
    $stmn = $db->prepare("insert into Diseases(id, name_cat, name_dis, desc) values(?,?,?,?)");
    $stmn->bindParam(1, $indx, SQLITE3_INTEGER);
    $stmn->bindParam(2, $list[$idx][0], SQLITE3_TEXT);
    $stmn->bindParam(3, $list[$idx][1], SQLITE3_TEXT);
    $stmn->bindParam(4, $list[$idx][2], SQLITE3_TEXT);
    $stmn->execute();
    $stmn->reset();
    $idx++;
    $indx++;
}
$db->close();
?>