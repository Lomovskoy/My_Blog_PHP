<?php
    function delete_image($name){
        print_r($name['image']);
        echo '<br>';
        echo $_SERVER['DOCUMENT_ROOT'];
        if (file_exists("My_Blog_PHP/models/upload")){
            print_r($name['image']);
            foreach (glob("My_Blog_PHP/models/upload/*") as $file)
            {
                //if ($file == $name['image']){
                    //unlink($file);}
                
            }
        }
    }

?>
