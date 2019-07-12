<?php
// ----------------------------конфигурация-------------------------- //


$backurl2="/learner/links.php";  // На какую страничку переходит после отправки письма

//---------------------------------------------------------------------- //



// Принимаем данные с формы


$name2 = $_POST['name2'];
$link = $_POST['link'];


// Параметры для подключения
$db_host2 = "localhost";
$db_user2 = "root"; // Логин БД
$db_password2 = ""; // Пароль БД
$db_base2 = 'learnerdb'; // Имя БД
$db_table2 = "links"; // Имя Таблицы БД

// Подключение к базе данных
$mysqli2 = new mysqli($db_host2,$db_user2,$db_password2,$db_base2);

// Если есть ошибка соединения, выводим её и убиваем подключение
if ($mysqli2->connect_error) {
    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

$result2 = $mysqli2->query("INSERT INTO ".$db_table2." (name2,link) VALUES ('$name2','$link')");

  if ($result2 == true){
      echo "Информация занесена в базу данных";
  }else{
      echo "Информация НЕ!!!!! занесена в базу данных";
  }

print "<script language='Javascript'><!--
function reload() {location = \"$backurl2\"}; setTimeout('reload()', 6000);
//--></script>
<p>Имя: $name2</p>
<p>Категория: $link</p>
<p>Сообщение отправлено! Подождите, сейчас вы будете перенаправлены на главную страницу...</p>";
exit;


?>
