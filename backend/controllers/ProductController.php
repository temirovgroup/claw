<?php

namespace backend\controllers;

use common\models\Category;
use common\models\Product;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors(): array
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * @return array[]
     */
    public function actions(): array
    {
        return [
            'images-get' => [
                'class' => 'vova07\imperavi\actions\GetImagesAction',
                'url' => Url::to(['/images/editor'], true), // Directory URL address, where files are stored.
                'path' => '@webroot/images/editor', // Or absolute path to directory where files are stored.
                'options' => ['only' => ['*.jpg', '*.jpeg', '*.png', '*.gif', '*.ico']], // These options are by default.
            ],
            'image-upload' => [
                'class' => 'vova07\imperavi\actions\UploadFileAction',
                'url' => Url::to(['/images/editor'], true), // Directory URL address, where files are stored.
                'path' => '@webroot/images/editor', // Or absolute path to directory where files are stored.
            ],
            'file-delete' => [
                'class' => 'vova07\imperavi\actions\DeleteFileAction',
                'url' => Url::to(['/images/editor'], true), // Directory URL address, where files are stored.
                'path' => '@webroot/images/editor', // Or absolute path to directory where files are stored.
            ],
        ];
    }

    /**
     * Lists all Product models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Product::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
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
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Product();

        $categories = Category::find()
            ->all();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                // Загрузака картинки
                $model->images = UploadedFile::getInstances($model, 'images');
                if (!empty($model->images)) {
                    $model->uploads();
                }

                $model->slide_image = UploadedFile::getInstance($model, 'slide_image');
                if (!empty($model->slide_image)) {
                    $model->uploadSlideImage();
                }

                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'categories' => $categories,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $categories = Category::find()
            ->all();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            // Загрузака картинки
            $model->images = UploadedFile::getInstances($model, 'images');
            if (!empty($model->images)) {
                $model->uploads();
            }

            $model->slide_image = UploadedFile::getInstance($model, 'slide_image');
            if (!empty($model->slide_image)) {
                $model->uploadSlideImage();
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'categories' => $categories,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * @return true
     */
    public function actionDeleteImage(): bool
    {
        if (!empty($model = Product::findOne(['id' => $this->request->post('product_id')]))) {
            foreach ($model->getImages() as $image) {
                if ($image->id === (int)$this->request->post('image_id')) {
                    $model->removeImage($image);
                }
            }
        }

        return true;
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
