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

    function articles_new($link, $title, $date, $content, $image){
        //--------------------------------------
        include("upload.php");//Загрузка самого файла
        //--------------------------------------
        $image = $_FILES['image']['name'];
        
        // Подготовка
        $title = trim($title);
        $content = trim($content);
        $image = trim($image);
        // Проверка
        if ($title == '')
            return false;
        
        // Запрос
        $template_add = "INSERT INTO articles (title, date, content, image) "
                . "VALUES ('%s', '%s', '%s', '%s')";
        //mysqli_real_escape_string экранирует строку запроса для защиты от SQL инекций
        $query = sprintf($template_add, 
                         mysqli_real_escape_string($link, $title),
                         mysqli_real_escape_string($link, $date),
                         mysqli_real_escape_string($link, $content),
                         mysqli_real_escape_string($link, $image));
        
        echo $query;
        $result = mysqli_query($link, $query);
        if (!$result)
            die(mysqli_error($link));
        
        return true;
    }

    function articles_edit($link, $id, $title, $date, $content, $image){
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
        
        // Подготовка
        $title = trim($title);
        $content = trim($content);
        $date = trim($date);
        $id = (int)$id;
        $imagebd = $_FILES['image']['name'];
        $imagebd = trim($imagebd);
        
        // Запрос
        $template_update = "UPDATE articles SET title='%s', content='%s', "
                . "date='%s', image='%s' WHERE id='%d'";
            
        $query = sprintf($template_update, 
                         mysqli_real_escape_string($link, $title),
                         mysqli_real_escape_string($link, $content),
                         mysqli_real_escape_string($link, $date),
                         mysqli_real_escape_string($link, $imagebd),
                         $id);
        
        $result = mysqli_query($link, $query);
        
        //--------------------------------------
        include("upload.php");//Загрузка самого файла
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