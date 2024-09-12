<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Product $model */

$this->title = $model->title;
\yii\web\YiiAsset::register($this);
?>
<div class="panel panel-default">

    <div class="panel-heading">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Добавить еще', ['create'], ['class' => 'btn btn-info']) ?>
            <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы уверены?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>

    <div class="panel-body">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'title',
                'name',
                'slide_text',
                [
                    'attribute' => 'is_slide',
                    'value' => function ($model) {
                        return $model->is_hidden ? 'Показать' : 'Скрыть';
                    },
                ],
                'description_excerpt',
                'description:html',
                'info:html',
                'price',
                'old_price',
                [
                    'attribute' => 'is_hidden',
                    'value' => function ($model) {
                        return $model->is_hidden ? 'Показать' : 'Скрыть';
                    },
                ],
                'meta_description',
                'meta_keywords',
            ],
        ]) ?>
    </div>

</div>
