<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Help $model */

$this->title = 'Create Help';
$this->params['breadcrumbs'][] = ['label' => 'Helps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="help-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
