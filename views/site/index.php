<?php

use yii\helpers\Html;
use app\models\Post;

/** @var yii\web\View $this */
/** @var $post_data yii\data\ActiveDataProvider */
/* @var $model app\models\Post */

$this->title = 'My Blog';
?>
<div class="container" >
    <div class="mt-sm-3"><h1>Blogs</h1></div>
    
    <div class="mt-sm-5">

    <?php


    //echo "<pre>";
    //print_r($post_data->title);

    foreach($post_data as $d => $v)
    {
        ?>
        <div class="shadow-lg p-2  mb-4 bg-white">
        <?php

        echo "<div style=color:black;><h5 class=mt-sm-5> 
        <a href='index.php?r=post%2Fview&id=$v[id]' 
        style=text-decoration-line:none;color:black;>{$v['title']} </a></h5> 
        <hr>";?>
        <img src="upload/<?=$v['image']?>" width="100%" height="230px"><br><hr> 
        <?php echo ($v['preview'])."<br>"."<hr>"?>
        <div class=" " style="text-align:right">
        <?php echo ($v['updated_at'])."<hr>"."</div>";
        ?>
        </div>
        </div>
        <?php
    }

    
    //print_r($post_data);
   

    ?>


    </div>
    

</div>
