<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Order $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if(Yii::$app->user->identity->isAdmin()): ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?php endif; ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'number',
            'date_start',
            'date_end',
            'client',
            'comment:ntext',
            'description:ntext',
            [
                'attribute' => 'user_id',
                'value' => function ($model) {
                    return $model->user->name;
                }
            ],

            [
                'attribute' => 'type_equipment_id',
                'value' => function ($model) {
                    return $model->typeEquipment->name;
                }
            ],
            [
                'attribute' => 'type_problem_id',
                'value' => function ($model) {
                    return $model->typeProblem->name;
                }
            ],
            [
                'attribute' => 'status_id',
                'value' => function ($model) {
                    return $model->status->name;
                }
            ],
        ],
    ]) ?>

</div>
