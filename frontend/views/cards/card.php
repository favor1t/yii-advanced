<?php

use yii\widgets\DetailView;

/* @var $card app\models\Cards */
?>
<div class="card-view">
    <?= DetailView::widget([
        'model' => $card,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            'image_id',
        ],
    ]) ?>
</div>
