<!DOCTYPE html>
<hmtl>
    <head>
        <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico">
        <meta charset="utf-8">
        <title>My Blog Lomovskoy</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    </head>
    <body>
        <div class="container">
            <!-- Header (navbar) -->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <img src="../images/photo.png" width="50px" height="50px">
                        <a id="blog" class="navbar-brand" href="../index.php">My Blog Lomovskoy</a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php?action=add">Создать статью</a></li>
                    </ul>
                </div>
            </nav> 
            <!-- END Header (navbar) -->
            <table id="admin_table" class="table">
                <tr>
                    <th>Дата</th>
                    <th>Заголовок</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach($articles as $article): ?>
                    <tr>
                        <td><?=$article['date']?></td>
                        <td><?=articles_intro($article['title'], 80)?></td>
                        <td>
                            <a href="index.php?action=edit&id=<?=$article['id']?>">Редактировать</a>
                        </td>
                        <td>
                            <a href="index.php?action=delete&id=<?=$article['id']?>">Удалить</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
            <footer>
                <p>
                    My Blog Lomovskoy<br>Copyright &copy; 2017
                </p>
            </footer>
        </div>
    </body>
</hmtl>

