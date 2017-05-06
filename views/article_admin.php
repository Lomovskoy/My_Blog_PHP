<!DOCTYPE html>
<hmtl>
    <head>
        <meta charset="utf-8">
        <title>My Blog Lomovskoy</title>
        <link rel="stylesheet" href="../style.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
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
            </div>
            <footer>
                <p>
                    My Blog Lomovskoy<br>Copyright &copy; 2016
                </p>
            </footer>
        </div>
    </body>
</hmtl>