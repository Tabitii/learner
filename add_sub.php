<?php
// ----------------------------конфигурация-------------------------- //


$backurl="/learner/add_subject.html";  // На какую страничку переходит после отправки письма

//---------------------------------------------------------------------- //



// Принимаем данные с формы


$name = $_POST['name'];
$category = $_POST['category'];
$hours = $_POST['hours'];
$comments = $_POST['comments'];

// Параметры для подключения
$db_host = "p240539.mysql.ihc.ru";
$db_user = "p240539_learn"; // Логин БД
$db_password = "akF25366ct"; // Пароль БД
$db_base = 'p240539_learn'; // Имя БД
$db_table = "subjects"; // Имя Таблицы БД

// Подключение к базе данных
$mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);

// Если есть ошибка соединения, выводим её и убиваем подключение
if ($mysqli->connect_error) {
    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

$result = $mysqli->query("INSERT INTO ".$db_table." (name,category, hours, comments) VALUES ('$name','$category','$hours','$comments')");

  if ($result == true){
      echo "Информация занесена в базу данных";
  }else{
      echo "Информация НЕ!!!!! занесена в базу данных";
  }

print "<script language='Javascript'><!--
function reload() {location = \"$backurl\"}; setTimeout('reload()', 6000);
//--></script>
<p>Имя: $name</p>
<p>Категория: $category</p>
<p>Часы: $hours</p>
<p>Сообщение: $comments</p>
<p>Сообщение отправлено! Подождите, сейчас вы будете перенаправлены на главную страницу...</p>";
exit;


?>
