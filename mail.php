<!doctype html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
   <title>Ваше сообщение успешно отправлено</title>
</head>

<body>
<?php
   $back = "<p><a href=\"javascript: history.back()\">Вернуться назад</a></p>";

   if(!empty($_POST['name']) and !empty($_POST['phone']) and !empty($_POST['mail'])
       and !empty($_POST['message'])){
       $name = trim(strip_tags($_POST['name']));
       $phone = trim(strip_tags($_POST['phone']));
       $mail = trim(strip_tags($_POST['mail']));
       $message = trim(strip_tags($_POST['message']));

       echo $name."<br>";
       echo $phone."<br>";
       echo $mail."<br>";
       echo $message."<br>";
       echo "Ваше сообщение успешно отправлено!<Br> Вы получите ответ в 
      ближайшее время<Br> $back";

       exit;
   }
   else {
       echo "Для отправки сообщения заполните все поля! $back";
       exit;
   }
?>
</body>
</html>
