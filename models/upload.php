<?php
    //echo dirname(__FILE__).'/upload/'.$filename;
    // проверяем, что есть файл
    if((!empty($_FILES["image"])) && ($_FILES['image']['error'] == 0)) {
      // проверяем, что файл это изображение JPEG и его размер не больше 350кб
      $filename = basename($_FILES['image']['name']);
      $ext = substr($filename, strrpos($filename, '.') + 1);
      if ((($ext == "jpg") || ($ext == "png")) && (($_FILES["image"]["type"] == "image/jpeg") ||
        ($_FILES["image"]["type"] == "image/png")) && ($_FILES["image"]["size"] <= 350000000)) {
        // путь для сохранения файла
          $newname = dirname(__FILE__).'/upload/'.$filename;
          echo $newname;
          // проверяем, файл с таким названием уже есть на сервере
          if (!file_exists($newname)) {
            // переместить загруженный файл в новое место
            if ((move_uploaded_file($_FILES['image']['tmp_name'],$newname))) {
               echo "Файл был загружен: ".$newname;
            } else {
               echo "Произошла ошибка при загрузке файла!";
            }
          } else {
             echo "Ошибка: файл ".$_FILES["image"]["name"]." уже существует";
          }
      } else {
         echo "Ошибка при загрузке файла, изображение не .jpg и не .png или больше чем 350кб.";
      }
    } else {
     echo "Ошибка: файл не загружен!";
    }
?>

