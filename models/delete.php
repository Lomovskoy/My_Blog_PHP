<?php
    function delete_image($name){
        //print_r($name['image']);
        //echo '<br>';
        //echo $_SERVER['DOCUMENT_ROOT'];
        //echo '<br>';
        define('ROOT', dirname(__FILE__));
        //echo ROOT;
        //echo '<br>';
        //echo (string(file_exists('upload')));
        $name = ROOT . '/upload/' . $name['image'];
        if (file_exists(ROOT . '/upload')){
            //echo ROOT . '/upload';
            //echo '<br>';
            foreach (glob(ROOT . '/upload/*') as $file)
            {
                //echo ROOT . '/upload/' . $name['image'];
                //echo '<br>';
                //echo $file;
                if ($file == $name){
                    unlink($file);}
                
            }
        }
    }

?>
