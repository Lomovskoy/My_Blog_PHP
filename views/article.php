<!DOCTYPE html>
<hmtl>
    <head>
        <meta charset="utf-8">
        <title>My Blog Lomovskoy</title>
        <link rel="stylesheet" type="text/css" href="bootstrap.css">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <!-- Page div -->
        <div class="container">
            <!-- Header -->
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
            <!-- END Header -->
            <!-- Content -->
            <hr>
            <div class="article">
                <h3><?=$article['title']?></h3>
                <em>Опубликованно: <?=$article['date']?></em>
                <?php if ($article['image'] != ''){?>
                <img style="margin-right: 10px;" class="img-rounded pull-left" src="models/upload/<?=$article['image'];?>" width="180" height="180" alt="Картинка">
                <?php }?>
                <p><?=$article['content']?></p>
            </div>
            <hr>
            <!-- END Content -->
            <!-- Footer -->
            <footer>
                <p>
                    My Blog Lomovskoy<br>Copyright &copy; 2016
                </p>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page div -->
    </body>
</hmtl>