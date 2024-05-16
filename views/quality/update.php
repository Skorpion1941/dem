<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Quality $model */

$this->title = 'Update Quality: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Qualities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="quality-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
