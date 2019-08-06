<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $card app\models\Cards */
/* @var $form yii\widgets\ActiveForm */
$uploadImage = new \app\models\UploadImage();
?>

<div class="cards-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($card, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($card, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($uploadImage, 'imageFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
