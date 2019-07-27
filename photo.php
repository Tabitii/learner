<?php
@mkdir("upload", 0777);
   if($_FILES["photos"]["size"] > 62*3*62)
   {
     echo ("Размер файла превышает 3 мегабайта");
     exit;
   }
   if(copy($_FILES["photos"]["tmp_name"],"./upload/".$_FILES["photos"]["name"]))
   {
      print "<img src='upload/".$_FILES["photos"]["name"]."'/><br/>";
      $fname=explode(".",$_FILES["photos"]["name"]);
      print "Имя файла: ".$fname[0]."<br/>";
      print "Размер файла: ".$_FILES['photos']['size']."<br/>" ;
      print "Тип файла: ".$_FILES['photos']['type']."<br/>";

   }
?>
