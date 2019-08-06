<?php
namespace frontend\controllers;

use common\models\Cards;
use yii\web\Controller;


/**
 * Card controller
 */
class CardsController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $cards = Cards::find()->orderBy(['id' => SORT_DESC])->limit(2)->all();
        return $this->render('index', ['cards' => $cards]);
    }

}
