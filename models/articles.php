<?php
    function articles_all($link){
    // Формируем запрос
        $query = "SELECT * FROM articles ORDER BY id DESC";
        $result = mysqli_query($link, $query);
        if(!$result)
            die(mysqli_error($link));
        
    // Извлекаем данные
        $n = mysqli_num_rows($result);
        $articles = array();
        
        for ($i = 0; $i < $n; $i++)
        {
            $row = mysqli_fetch_assoc($result);
            $articles[] = $row;
        }
        
        return $articles;
    }

    function article_get($link, $id_article){
        $query = sprintf("SELECT * FROM articles WHERE id=%d", (int)$id_article);
        $result = mysqli_query($link, $query);
        
        if (!$result)
            die(mysqli_error($link));
        
        $article = mysqli_fetch_assoc($result);
        
        return $article;
    }
    function articles_new($link, $title, $date, $content, $image, $audio){
        //--------------------------------------
        include("upload.php");//Загрузка самого файла картинки
        add_image($image);
        add_audio($audio);
        //--------------------------------------
        $image = $_FILES['image']['name'];
        $audio = $_FILES['audio']['name'];
        
        // Подготовка
        $title = trim($title);
        $content = trim($content);
        $image = trim($image);
        $audio = trim($audio);
        // Проверка
        if ($title == '')
            return false;
        
        // Запрос
        $template_add = "INSERT INTO articles (title, date, content, image, audio) "
                . "VALUES ('%s', '%s', '%s', '%s', '%s')";
        //mysqli_real_escape_string экранирует строку запроса для защиты от SQL инекций
        $query = sprintf($template_add, 
                         mysqli_real_escape_string($link, $title),
                         mysqli_real_escape_string($link, $date),
                         mysqli_real_escape_string($link, $content),
                         mysqli_real_escape_string($link, $image),
                         mysqli_real_escape_string($link, $audio));
        
        echo $query;
        $result = mysqli_query($link, $query);
        if (!$result)
            die(mysqli_error($link));
        
        return true;
    }

    function articles_edit($link, $id, $title, $date, $content, $image, $audio){
        // Проверка
        if ($title == '')
            return false;
        
        // удаление файла картинки
        //-------------------------
        $query_dell = sprintf("SELECT image FROM articles WHERE id=%d", $id);
        $result_dell = mysqli_query($link, $query_dell);
        $n_dell = mysqli_num_rows($result_dell);
        $row = mysqli_fetch_assoc($result_dell);
        
        include("delete.php");
        delete_image($row);
        //-----------------------
        
        // удаление файла музыки
        //-------------------------
        $query_dell = sprintf("SELECT audio FROM articles WHERE id=%d", $id);
        $result_dell = mysqli_query($link, $query_dell);
        $n_dell = mysqli_num_rows($result_dell);
        $row = mysqli_fetch_assoc($result_dell);
        
        delete_audio($row);
        //-----------------------
        
        // Подготовка
        $title = trim($title);
        $content = trim($content);
        $date = trim($date);
        $id = (int)$id;
        $imagebd = $_FILES['image']['name'];
        $imagebd = trim($imagebd);
        $audiobd = $_FILES['audio']['name'];
        $audiobd = trim($audiobd);
        
        // Запрос
        $template_update = "UPDATE articles SET title='%s', content='%s', "
                . "date='%s', image='%s', audio='%s' WHERE id='%d'";
            
        $query = sprintf($template_update, 
                         mysqli_real_escape_string($link, $title),
                         mysqli_real_escape_string($link, $content),
                         mysqli_real_escape_string($link, $date),
                         mysqli_real_escape_string($link, $imagebd),
                         mysqli_real_escape_string($link, $audiobd),
                         $id);
        
        $result = mysqli_query($link, $query);
        
        
        //--------------------------------------
        include("upload.php");//Загрузка самого файла картинки
        add_image($image);
        add_audio($audio);
        //--------------------------------------
        
        if (!result)
            die(mysqli_error($link));
        
        return mysqli_affected_rows($link);
    }

    function articles_delete($link, $id){
        $id = (int)$id;
        // Проверка
        if ($id == 0)
            return false;
            
        // удаление файла картинки
        //-------------------------
        $query_dell = sprintf("SELECT image FROM articles WHERE id=%d", $id);
        $result_dell = mysqli_query($link, $query_dell);
        $n_dell = mysqli_num_rows($result_dell);
        $row = mysqli_fetch_assoc($result_dell);

        include("delete.php");
        delete_image($row);
        //-----------------------
        
        // удаление файла музыки
        //-------------------------
        $query_dell_audio = sprintf("SELECT audio FROM articles WHERE id=%d", $id);
        $result_dell_audio = mysqli_query($link, $query_dell_audio);
        $n_dell_audio = mysqli_num_rows($result_dell_audio);
        $row_audio = mysqli_fetch_assoc($result_dell_audio);
        print_r($row_audio);

        delete_audio($row_audio);
        //-----------------------

        // Запрос
        $query = sprintf("DELETE FROM articles WHERE id='%d'", $id);
        
        $result = mysqli_query($link, $query);
        
        if (!result)
            die(mysqli_error($link));
        
        return mysqli_affected_rows($link);
    }

    function articles_intro($text, $len = 500)
    {
        return mb_substr($text, 0, $len);        
    }
?>