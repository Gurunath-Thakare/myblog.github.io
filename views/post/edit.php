<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
$this->title = 'Update Post';
?>
<div class="post-edit">



    <?= $this->render('post', [
        'post_data'=>$post_data,
    ]) 

    /*print_r($post_data);
    print_r($post_data->title);
    print_r($post_data->description);
    print_r($post_data->updated_at);
    */
    ?>

</div>