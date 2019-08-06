<?php

use yii\helpers\Html;

/* @var $this  yii\web\View */
/* @var $card  app\models\Cards */
/* @var $image app\models\Images */

$this->title = 'Create Cards';
$this->params['breadcrumbs'][] = ['label' => 'Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cards-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'card'  => $card,
    ]) ?>

</div>
