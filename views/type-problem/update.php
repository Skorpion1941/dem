<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TypeProblem $model */

$this->title = 'Update Type Problem: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Type Problems', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="type-problem-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
