<?php

namespace app\modules\admin\controllers;

use yii\web\UploadedFile;
use Yii;
use app\modules\admin\models\Product;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\common\components\Transliterate;
use zxbodya\yii2\galleryManager;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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

    public function actions()
    {
        return [
            'galleryApi' => [
                'class' => galleryManager\GalleryManagerAction::className(),
                // mappings between type names and model classes (should be the same as in behaviour)
                'types' => [
                    'product' => Product::className()
                ]
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Product::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            if ( UploadedFile::getInstance($model, 'file') ) {
                // get the instance of the uploaded file
                $imageName = $transBaseName = Transliterate::transliteration($model->title);

                $model->file = UploadedFile::getInstance($model, 'file');

                $transBaseName = Transliterate::transliteration($model->file->baseName);

                $model->file->saveAs('uploads/img/'.$imageName.$transBaseName.'.'.$model->file->extension);

                //save the path in the db column
                $model->img = '/uploads/img/'.$imageName.$transBaseName.'.'.$model->file->extension;
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
     * Updates an existing Product model.
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
                $model->img = '/uploads/img/'.$imageName.$transBaseName.'.'.$model->file->extension;
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
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        /*$product = $this->findModel($id);
        $category = $product->category_id;
        //var_dump($category);
        $category->delete();
        $product->delete();*/

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
