<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TypeEquipment $model */

$this->title = 'Create Type Equipment';
$this->params['breadcrumbs'][] = ['label' => 'Type Equipments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-equipment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
