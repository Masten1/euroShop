<?php

namespace app\modules\admin\controllers;

use yii\web\UploadedFile;
use Yii;
use app\modules\admin\models\Category;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\common\components\Transliterate;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
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
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Category::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
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
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ( UploadedFile::getInstance($model, 'file') ) {
                // get the instance of the uploaded file
                $imageName = $transBaseName = Transliterate::transliteration($model->name);

                $model->file = UploadedFile::getInstance($model, 'file');

                $transBaseName = Transliterate::transliteration($model->file->baseName);

                $model->file->saveAs('uploads/img/'.$imageName.$transBaseName.'.'.$model->file->extension);

                //save the path in the db column
                $model->photo = '/uploads/img/'.$imageName.$transBaseName.'.'.$model->file->extension;
                $model->save();
            }

            if ( UploadedFile::getInstance($model, 'fileIcon') ) {
                // get the instance of the uploaded file
                $imageName = $transBaseName = Transliterate::transliteration($model->name);

                $model->file = UploadedFile::getInstance($model, 'fileIcon');

                $transBaseName = Transliterate::transliteration($model->fileIcon->baseName);

                $model->file->saveAs('uploads/img/'.$imageName.$transBaseName.'.'.$model->fileIcon->extension);

                //save the path in the db column
                $model->navIcon = '/uploads/img/'.$imageName.$transBaseName.'.'.$model->fileIcon->extension;
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
     * Updates an existing Category model.
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
                $imageName = $transBaseName = Transliterate::transliteration($model->name);

                $model->file = UploadedFile::getInstance($model, 'file');

                $transBaseName = Transliterate::transliteration($model->file->baseName);

                $model->file->saveAs('uploads/img/'.$imageName.$transBaseName.'.'.$model->file->extension);

                //save the path in the db column
                $model->photo = '/uploads/img/'.$imageName.$transBaseName.'.'.$model->file->extension;
                $model->save();
            }

            if ( UploadedFile::getInstance($model, 'fileIcon') ) {
                // get the instance of the uploaded file
                $imageName = $transBaseName = Transliterate::transliteration($model->name);

                $model->file = UploadedFile::getInstance($model, 'fileIcon');

                $transBaseName = Transliterate::transliteration($model->fileIcon->baseName);

                $model->file->saveAs('uploads/img/'.$imageName.$transBaseName.'.'.$model->fileIcon->extension);

                //save the path in the db column
                $model->navIcon = '/uploads/img/'.$imageName.$transBaseName.'.'.$model->fileIcon->extension;
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
     * Deletes an existing Category model.
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
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
