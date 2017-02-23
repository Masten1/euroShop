<?php

namespace app\modules\admin\controllers;

use yii\web\UploadedFile;
use Yii;
use app\modules\admin\models\Article;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\common\components\Transliterate;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
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
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Article::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
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
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ( UploadedFile::getInstance($model, 'file') ) {
                // get the instance of the uploaded file
                $imageName = $transBaseName = Transliterate::transliteration($model->title);

                $model->file = UploadedFile::getInstance($model, 'file');

                $transBaseName = Transliterate::transliteration($model->file->baseName);

                $model->file->saveAs('uploads/img/'.$imageName.$transBaseName.'.'.$model->file->extension);

                //save the path in the db column
                $model->image = '/uploads/img/'.$imageName.$transBaseName.'.'.$model->file->extension;
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
     * Updates an existing Article model.
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
                $imageName = $transBaseName = Transliterate::transliteration($model->title);

                $model->file = UploadedFile::getInstance($model, 'file');

                $transBaseName = Transliterate::transliteration($model->file->baseName);

                $model->file->saveAs('uploads/img/'.$imageName.$transBaseName.'.'.$model->file->extension);

                //save the path in the db column
                $model->image = '/uploads/img/'.$imageName.$transBaseName.'.'.$model->file->extension;
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
     * Deletes an existing Article model.
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
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
