<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cards */

$this->title = 'Update Cards: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cards-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'card' => $model,
    ]) ?>

</div>
