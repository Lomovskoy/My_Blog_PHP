<!DOCTYPE html>
<hmtl>
    <head>
        <link rel="shortcut icon" type="image/x-icon" href="photo\favicon.ico">
        <meta charset="utf-8">
        <title>My Blog Lomovskoy</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
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
            <?php foreach($articles as $article): ?>
                <div class="article">
                    <h3><a href="article.php?id=<?=$article['id']?>"><?=$article['title']?></a></h3>
                        <em>Опубликованно: <?=$article['date']?></em>
                    <p><?=articles_intro($article['content'])?></p>
                </div> 
            <?php endforeach ?>
            <footer>
                <p>My Blog Lomovskoy<br>Copyright &copy; 2017</p>
            </footer>
        </div>
    </body>
</hmtl>