<!DOCTYPE html>
<hmtl>
    <head>
        <meta charset="utf-8">
        <title>My Blog Lomovskoy</title>
        <link rel="stylesheet" href="style.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" type="text/css" href="bootstrap.css">
    </head>
    <body>
        <div class="container">
            <!-- Header (navbar) -->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a id="blog" class="navbar-brand" href="index.php">My Blog Lomovskoy</a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="admin">Панель администратора</a></li>
                    </ul>
                </div>
            </nav> 
            <!-- END Header (navbar) -->
            <?php foreach($articles as $article): ?>
            <div class="article">
                <h3><a href="article.php?id=<?=$article['id']?>"><?=$article['title']?></a></h3>
                <em>Опубликованно: <?=$article['date']?></em>
                <p><?=articles_intro($article['content'])?></p>
            </div>
            <?php endforeach ?>
            <footer>
                <p>
                    My Blog Lomovskoy<br>Copyright &copy; 2016
                </p>
            </footer>
        </div>
    </body>
</hmtl>