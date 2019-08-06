<?php

namespace backend\controllers;

use app\models\Images;
use app\models\UploadImage;
use Yii;
use app\models\Cards;
use yii\data\ActiveDataProvider;
use yii\db\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CardsController implements the CRUD actions for Cards model.
 */
class CardsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Cards models.
     * @return mixed
     */
    public function actionIndex()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => Cards::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cards model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id)->incrementCount(),
        ]);
    }

    /**
     * Creates a new Cards model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $card = $this->createCard();
        return $this->render('create', [
            'card'  => $card,
        ]);
    }

    /**
     * @param null $imageId
     *
     * @return \app\models\Cards
     */
    private function createCard($imageId = null): Cards
    {
        $card  = new Cards();
        $post  = Yii::$app->request->post();
        if($this->uploadImage()) $post['image_id'] = $imageId;

        if ($card->load($post) && $card->save())
            return $this->redirect(['view', 'id' => $card->id]);

        return $card;
    }

    /**
     * @return int|null
     */
    private function uploadImage(): ?int
    {
        $uploadImage = new UploadImage();

        if (Yii::$app->request->isPost){
            $uploadImage->imageFile = UploadedFile::getInstance($uploadImage, 'imageFile');
            return $uploadImage->upload();
        }
        return null;
    }

    /**
     * Updates an existing Cards model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cards model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cards model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cards the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cards::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
