<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Help $model */

$this->title = 'Update Help: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Helps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="help-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
