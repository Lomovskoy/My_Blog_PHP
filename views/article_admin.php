<!DOCTYPE html>
<hmtl>
    <head>
        <link rel="shortcut icon" type="image/x-icon" href="../photo/favicon.ico">
        <meta charset="utf-8">
        <title>My Blog Lomovskoy</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <img src="../photo/photo.png" width="50px" height="50px">
                        <a id="blog" class="navbar-brand" href="../index.php">My Blog Lomovskoy</a>
                    </div>
                </div>
            </nav> 
            <div id="addart">
                <form method="post" action="index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>" enctype="multipart/form-data">
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
                    <?php if($action == 'edit' && ($article['image'] != '')){?>
                        <label>
                            Изображение:
                            <table>
                                <tr>
                                    <td style="padding-right: 5px;">
                                        <img class="img-rounded pull-left" src="../models/upload/<?=$article['image'];?>" width="80" height="80" alt="Картинка">
                                    </td>
                                </tr>
                                <tr>
                                    <td><?=$article['image'];?></td>
                                </tr>
                            </table>
                        </label>
                    <?php }?>
                    <label>
                        <?php if($action == 'add'){?>Добавить изображение:<?php }?>
                        <?php if(($action == 'edit') && ($article['image'] != '')){?>Изменить или удалить изображение:<?php }?>
                        <?php if(($action == 'edit') && ($article['image'] == '')){?>Добавить изображение:<?php }?>
                        <input type="hidden" name="MAX_FILE_SIZE" value="350000000" />
                        <input name="image" type="file" class="btn"/>
                    </label>
                    <!----------------------------------------------------------------------------->
                    <hr>
                    <?php if($action == 'edit' && ($article['audio'] != '')){?>
                        <label>
                            Трек:
                            <table>
                                <tr>
                                <object id="audioplayer197" type="application/x-shockwave-flash" data="../player/uppod-audio2.swf" width="350" height="40">
                                <param name="bgcolor" value="#ffffff" />
                                <param name="allowScriptAccess" value="always" />
                                <param name="movie" value="../player/uppod-audio2.swf" />
                                <param name="flashvars" value="comment=Start_Musuk&amp;st=../css/audio252-107.txt&amp;file=../models/audio/<?=$article['audio'];?>" />
                                </object>
                                </tr>
                                <tr>
                                    <td><?=$article['audio'];?></td>
                                </tr>
                            </table>
                        </label>
                    <?php }?>
                    <label>
                        <?php if($action == 'add'){?>Добавить трек:<?php }?>
                        <?php if(($action == 'edit') && ($article['audio'] != '')){?>Изменить или удалить трек:<?php }?>
                        <?php if(($action == 'edit') && ($article['audio'] == '')){?>Добавить трек:<?php }?>
                        <input type="hidden" name="MAX_FILE_SIZE" value="67108864" />
                        <input name="audio" type="file" class="btn"/>
                    </label>
                    <input type="submit" value="Сохранить" class="btn">
                </form>
            <footer>
                <p>
                    My Blog Lomovskoy<br>Copyright &copy; 2016
                </p>
            </footer>
        </div>
    </body>
</hmtl>