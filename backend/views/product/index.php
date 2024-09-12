<?php

use common\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Товары';
?>
<div class="panel panel-default">

    <div class="panel-heading">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <div class="panel-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
//                'title',
                'name',
                'slide_text',
                [
                    'attribute' => 'is_slide',
                    'value' => function ($model) {
                        return $model->is_hidden ? 'Показать' : 'Скрыть';
                    },
                ],
                //'description_excerpt',
                //'description:ntext',
                //'info:ntext',
                'price',
                //'old_price',
                //'is_hidden',
                //'url:url',
                [
                    'class' => ActionColumn::class,
                    'urlCreator' => function ($action, Product $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
            'emptyText' => 'Нет данных',
        ]); ?>
    </div>

</div>
