<?php
$backurl="/learner/add_subject.html";  // На какую страничку переходит после отправки письма

$mysqli = new mysqli('localhost', 'root', '', 'learnerdb') or die(mysqli_error($mysqli));

if (isset($_GET['delete'])){
  $id = $_GET['delete'];
  $result = $mysqli->query("DELETE FROM subjects WHERE id=$id") or die($mysqli->error());
}
if ($result == true){
    echo "Информация удалена из базы данных";
}else{
    echo "Информация НЕ!!!!! удалена из базы данных";
}

print "<script language='Javascript'><!--
function reload() {location = \"$backurl\"}; setTimeout('reload()', 2000);
//--></script>
<p>Предмет удален! Подождите, сейчас вы будете перенаправлены на главную страницу...</p>";
exit;


?>

 ?>
