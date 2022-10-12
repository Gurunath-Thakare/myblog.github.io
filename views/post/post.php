<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

/* @var $this yii\web\View */
/* @var $post_data app\models\Post */
/* @var $form yii\widgets\ActiveForm */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Create Post';

?>
<div class="post-form">
    <h1>Create Post </h1>

<?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>


<?= $form->field($post_data, 'title')->textInput() ?>

<?= $form->field($post_data, 'description')->textarea(['rows' => 6]) ?>


<?= $form->field($post_data, 'image')->fileInput()?>

<div class="form-group" >
    <?= Html::submitButton('Save', ['class' => 'btn btn-secondary'],) ?>
</div>

<?php ActiveForm::end(); ?>

</div>

