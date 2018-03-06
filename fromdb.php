<?php

// --------------------Выводим данные из БД в браузер-----------//

$db = new SQLite3(test);

$rows = $db->query('select count(*) as count from Diseases');

$rezult = $rows->fetchArray(SQLITE3_ASSOC);
echo $rezult['count']."<br>"; // Количество статей в БД

$rows = $db->query('select * from Diseases');
while ($rezult = $rows->fetchArray(SQLITE3_ASSOC))
{
    echo "<h2>".$rezult['name_cat']."<br>";
    echo "<h3>".$rezult['name_dis']."<br>";
    echo "<h4>".$rezult['desc']."<br>";
    echo "<hr><hr><br>";
}
$db->close();
?>