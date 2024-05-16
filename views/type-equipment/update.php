<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TypeEquipment $model */

$this->title = 'Update Type Equipment: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Type Equipments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="type-equipment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
