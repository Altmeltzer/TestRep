<?php
/**
 * Created by PhpStorm.
 * User: Сергей Александрович
 * Date: 18.02.2018
 * Time: 19:54
 */
echo '<form method="post" action="mail.php">
 
   <div class="left">
      <label for="name">Имя:</label>
      <input maxlength="30" type="text" name="name" />
 
      <label for="phone">Телефон:</label>
      <input maxlength="30" type="text" name="phone" />
 
      <label for="mail">E-mail:</label>
      <input maxlength="30" type="text" name="mail" />
   </div>
 
   <div class="right">
      <label for="message">Сообщение:</label>
      <textarea rows="7" cols="50" name="message"></textarea>
 
      <input type="submit" value="Отправить" />
   </div>
 
</form>';
?>