<!DOCTYPE html>
<hmtl>
    <head>
        <link rel="shortcut icon" type="image/x-icon" href="photo\favicon.ico">
        <meta charset="utf-8">
        <title>My Blog Lomovskoy</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <img src="photo/photo.png" width="50px" height="50px">
                        <a id="blog" class="navbar-brand" href="index.php">My Blog Lomovskoy</a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="admin">Панель администратора</a></li>
                    </ul>
                </div>
            </nav> 
            <hr>
            <?php foreach($articles as $article): ?>
            <div class="article">
                <h3><a href="article.php?id=<?=$article['id']?>"><?=$article['title']?></a></h3>
                <em>Опубликованно: <?=$article['date']?></em>
                <table>
                    <tr>
                        <?php if ($article['image'] != ''){?>
                        <td style="padding-right: 5px;"><img class="img-rounded pull-left" src="models/upload/<?=$article['image'];?>" width="80" height="80" alt="Картинка"></td>
                        <?php }?>
                        <td><?=articles_intro($article['content'])?></td>
                    </tr>
                </table>
            </div>
            <hr>
            <?php endforeach ?>
            <footer>
                <p>
                    My Blog Lomovskoy<br>Copyright &copy; 2016
                </p>
            </footer>
        </div>
    </body>
</hmtl>