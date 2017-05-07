<?php
// проверяем, что есть файл
if((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0)) {
  // проверяем, что файл это изображение JPEG и его размер не больше 350кб
  $filename = basename($_FILES['uploaded_file']['name']);
  $ext = substr($filename, strrpos($filename, '.') + 1);
  if (($ext == "jpg") && ($_FILES["uploaded_file"]["type"] == "image/jpeg") && 
    ($_FILES["uploaded_file"]["size"] < 350000000)) {
    // путь для сохранения файла
      $newname = dirname(__FILE__).'../photo/'.$filename;
      // проверяем, файл с таким названием уже есть на сервере
      if (!file_exists($newname)) {
        // переместить загруженный файл в новое место
        if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname))) {
           echo "Файл был загружен: ".$newname;
        } else {
           echo "Произошла ошибка при загрузке файла!";
        }
      } else {
         echo "Ошибка: файл ".$_FILES["uploaded_file"]["name"]." уже существует";
      }
  } else {
     echo "Ошибка при загрузке файла, изображение не .jpg или больше чем 350кб.";
  }
} else {
 echo "Ошибка: файл не загружен!";
}
?>

