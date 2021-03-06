<?php

namespace app\modules\admin\controllers;

use yii\web\UploadedFile;
use Yii;
use app\modules\admin\models\Whywe;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\common\components\Transliterate;

/**
 * WhyweController implements the CRUD actions for Whywe model.
 */
class WhyweController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Whywe models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Whywe::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Whywe model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Whywe model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Whywe();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            if ( UploadedFile::getInstance($model, 'file') ) {
                // get the instance of the uploaded file
                $imageName = $transBaseName = Transliterate::transliteration($model->title);

                $model->file = UploadedFile::getInstance($model, 'file');

                $transBaseName = Transliterate::transliteration($model->file->baseName);

                $model->file->saveAs('uploads/img/'.$imageName.$transBaseName.'.'.$model->file->extension);

                //save the path in the db column
                $model->icon = '/uploads/img/'.$imageName.$transBaseName.'.'.$model->file->extension;
                $model->save();
            }

            return $this->redirect(['index']);
        } else {

            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Whywe model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ( UploadedFile::getInstance($model, 'file') ) {
                // get the instance of the uploaded file
                $imageName = Transliterate::transliteration($model->title);

                $model->file = UploadedFile::getInstance($model, 'file');

                $transBaseName = Transliterate::transliteration($model->file->baseName);

                $model->file->saveAs('uploads/img/'.$imageName.$transBaseName.'.'.$model->file->extension);

                //save the path in the db column
                $model->icon = '/uploads/img/'.$imageName.$transBaseName.'.'.$model->file->extension;
                $model->save();
            }

            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Whywe model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Whywe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Whywe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Whywe::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
