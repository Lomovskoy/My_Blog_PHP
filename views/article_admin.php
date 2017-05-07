<!DOCTYPE html>
<hmtl>
    <head>
        <meta charset="utf-8">
        <title>My Blog Lomovskoy</title>
        <link rel="stylesheet" href="../style.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" type="text/css" href="../bootstrap.css">
    </head>
    <body>
        <div class="container">
            <!-- Header (navbar) -->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a id="blog" class="navbar-brand" href="../index.php">My Blog Lomovskoy</a>
                    </div>
                </div>
            </nav> 
            <!-- END Header (navbar) -->
            <div id="addart">
                <form method="post" action="index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>">
                    <label>
                        Название
                        <input type="text" name="title" value="<?=$article['title']?>" class="form-item" autofocus required>
                    </label>
                    <label>
                        Дата
                        <input type="date" name="date" value="<?=$article['date']?>" class="form-item" required>
                        <!--Не работает на мазиле-->
                    </label>
                    <label>
                        Содержимое
                        <textarea class="form-item" name="content" required><?=$article['content']?></textarea>
                    </label>
                    <input type="submit" value="Сохранить" class="btn">
                </form>
                <?php if($action == "add"){?>
                    <form enctype="multipart/form-data" action="upload.php" method="post"> <!--для сервера-->
                        <br>
                        <input type="hidden" name="MAX_FILE_SIZE" value="350000000" /><!--максимально допустимый размер файла для загрузки в байтах-->
                        Выбрать файл для загрузки: <input name="uploaded_file" type="file" class="btn"/><!--файл для загрузки-->
                        <br><br>
                        <input type="submit" value="Отправить" class="btn"/><!--кнопка загрузки-->
                    </form>
                <?php }?>
                </div>
                <?php if($action == "edit"){?>
                    <br><br>
                    <form enctype="multipart/form-data" action="delete.php" method="post"> <!--для сервера-->
                        <input type="submit" value="Удалить все файлы" class="btn"/><!--кнопка загрузки-->
                     </form>
                <?php }?>
            <footer>
                <p>
                    My Blog Lomovskoy<br>Copyright &copy; 2016
                </p>
            </footer>
        </div>
    </body>
</hmtl>