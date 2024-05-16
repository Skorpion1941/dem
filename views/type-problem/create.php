<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TypeProblem $model */

$this->title = 'Create Type Problem';
$this->params['breadcrumbs'][] = ['label' => 'Type Problems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-problem-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
