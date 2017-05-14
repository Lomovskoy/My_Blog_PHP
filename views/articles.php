<!DOCTYPE html>
<hmtl>
    <head>
        <link rel="shortcut icon" type="image/x-icon" href="photo\favicon.ico">
        <meta charset="utf-8">
        <title>My Blog Lomovskoy</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <!-- Yandex.Metrika counter -->
        <script type="text/javascript">
            (function (d, w, c) {
                (w[c] = w[c] || []).push(function() {
                    try {
                        w.yaCounter44565259 = new Ya.Metrika({
                            id:44565259,
                            clickmap:true,
                            trackLinks:true,
                            accurateTrackBounce:true
                        });
                    } catch(e) { }
                });
        
                var n = d.getElementsByTagName("script")[0],
                    s = d.createElement("script"),
                    f = function () { n.parentNode.insertBefore(s, n); };
                s.type = "text/javascript";
                s.async = true;
                s.src = "https://mc.yandex.ru/metrika/watch.js";
        
                if (w.opera == "[object Opera]") {
                    d.addEventListener("DOMContentLoaded", f, false);
                } else { f(); }
            })(document, window, "yandex_metrika_callbacks");
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/44565259" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->
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
                <table >
                    <tr >
                        <?php if ($article['image'] != ''){?>
                        <td style="padding-right: 5px;">
                            <img class="img-rounded pull-left" src="models/upload/<?=$article['image'];?>" width="80" height="80" alt="Картинка">
                        </td>
                        <?php }?>
                        <td><?=articles_intro($article['content'])?></td>
                    </tr>
                    <tr >
                        <?php if ($article['image'] != ''){?>
                        <td >
                            <!-- LikeBtn.com BEGIN -->
                            <span class="likebtn-wrapper" data-theme="custom" data-icon_l="hrt9" data-icon_l_c="#337ab7" data-icon_l_c_v="#c9c9c9" data-icon_d_c="#f8f8f8" data-icon_d_c_v="#dedede" data-label_c="#337ab7" data-label_c_v="#c9c9c9" data-counter_l_c="#337ab7" data-bg_c="rgba(252,252,252,0.87)" data-brdr_c="#e7e7e7" data-label_fs="r" data-identifier="like<?php echo $article['id'] ?>" data-dislike_enabled="false" data-lazy_load="true"></span>
                            <script>(function(d,e,s){if(d.getElementById("likebtn_wjs"))return;a=d.createElement(e);m=d.getElementsByTagName(e)[0];a.async=1;a.id="likebtn_wjs";a.src=s;m.parentNode.insertBefore(a, m)})(document,"script","//w.likebtn.com/js/w/widget.js");</script>
                            <!-- LikeBtn.com END -->
                        </td>
                        <td >
                            <div>
                            <?php if ($article['audio'] != ''){?>
                                <span style="color: #23527c"><?php echo $article['audio'];?></span>
                                <br>
                                <object id="audioplayer197" type="application/x-shockwave-flash" data="player/uppod-audio2.swf" width="350" height="40">
                                <param name="bgcolor" value="#ffffff" />
                                <param name="allowScriptAccess" value="always" />
                                <param name="movie" value="player/uppod-audio2.swf" />
                                <param name="flashvars" value="comment=models/<?php echo $article['audio'] ?>&amp;st=css/audio252-107.txt&amp;file=models/audio/<?php echo $article['audio'] ?>" />
                            </object>
                            </div>
                            <?php } ?>
                        </td>
                        <?php } else {?>
                        <td >
                            <div style="display: inline-block; position: relative; <?php if ($article['audio'] != ''){?>top: -15px<?php } ?>">
                                <!-- LikeBtn.com BEGIN -->
                                <span class="likebtn-wrapper" data-theme="custom" data-icon_l="hrt9" data-icon_l_c="#337ab7" data-icon_l_c_v="#c9c9c9" data-icon_d_c="#f8f8f8" data-icon_d_c_v="#dedede" data-label_c="#337ab7" data-label_c_v="#c9c9c9" data-counter_l_c="#337ab7" data-bg_c="rgba(252,252,252,0.87)" data-brdr_c="#e7e7e7" data-label_fs="r" data-identifier="like<?php echo $article['id'] ?>" data-dislike_enabled="false" data-lazy_load="true"></span>
                                <script>(function(d,e,s){if(d.getElementById("likebtn_wjs"))return;a=d.createElement(e);m=d.getElementsByTagName(e)[0];a.async=1;a.id="likebtn_wjs";a.src=s;m.parentNode.insertBefore(a, m)})(document,"script","//w.likebtn.com/js/w/widget.js");</script>
                                <!-- LikeBtn.com END -->
                            </div>
                            <div style="display: inline-block">
                                <?php if ($article['audio'] != ''){?>
                                <span style="color: #23527c"><?php echo $article['audio'];?></span>
                                <br>
                                <object id="audioplayer197" type="application/x-shockwave-flash" data="player/uppod-audio2.swf" width="350" height="40">
                                    <param name="bgcolor" value="#ffffff" />
                                    <param name="allowScriptAccess" value="always" />
                                    <param name="movie" value="player/uppod-audio2.swf" />
                                    <param name="flashvars" value="comment=models/<?php echo $article['audio'] ?>&amp;st=css/audio252-107.txt&amp;file=models/audio/<?php echo $article['audio'] ?>" />
                                </object>
                                <?php }?>
                            </div>
                        </td>
                        <?php }?>
                    </tr> 
                </table>
            </div>
            <hr>
            <?php endforeach ?>
            <footer>
            <?php global $text_var;
                $text_var = "Нет данных";?>
                <p>
                    My Blog Lomovskoy<br>Copyright &copy; 2016
                </p>
            </footer>
        </div>
    </body>
</hmtl>