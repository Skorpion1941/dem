<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Quality $model */

$this->title = 'Create Quality';
$this->params['breadcrumbs'][] = ['label' => 'Qualities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quality-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
