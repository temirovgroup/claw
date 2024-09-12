<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Product $model */
/** @var $categories \common\models\Category */

$this->title = 'Изменить: ' . $model->title;
?>
<div class="panel panel-default">

    <div class="panel-heading">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="panel-body">
        <?= $this->render('_form', [
            'model' => $model,
            'categories' => $categories,
        ]) ?>
    </div>

</div>
