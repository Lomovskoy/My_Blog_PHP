<?php
    function delete_image($name){
        define('ROOT', dirname(__FILE__));
        $name = ROOT . '/upload/' . $name['image'];
        if (file_exists(ROOT . '/upload')){
            foreach (glob(ROOT . '/upload/*') as $file)
            {
                if ($file == $name){
                    unlink($file);}
                
            }}}
    function delete_audio($name){
        define('ROOT', dirname(__FILE__));
        $name = ROOT . '/audio/' . $name['audio'];
        if (file_exists(ROOT . '/audio')){
            foreach (glob(ROOT . '/audio/*') as $file)
            {
                if ($file == $name){
                    unlink($file);}
                
            }}}
?>
