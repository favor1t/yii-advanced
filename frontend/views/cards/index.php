<?php
/* @var $this yii\web\View */
/* @var $cards app\models\Cards[] */
?>
<div class="cards-list">
    <?php
    foreach ($cards as $card):
        echo $this->render('card', ['card' => $card]);
    endforeach;
    ?>
</div>
