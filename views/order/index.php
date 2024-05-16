<?php

use app\models\Order;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if(Yii::$app->user->identity->isAdmin()): ?>
        <?= Html::a('Создать заявки', ['create'], ['class' => 'btn btn-success']) ?>
        <?php endif; ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'number',
            'date_start',
            'date_end',
            'client',
            //'comment:ntext',
            //'description:ntext',
            [
              'attribute' => 'user_id',
              'value' => function ($model) {
                    return $model->user->name;
              }
            ],

            //'type_equipment_id',
            //'type_problem_id',
            [
                'attribute' => 'status_id',
                'value' => function ($model) {
                    return $model->status->name;
                }
            ],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Order $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 },
                'visibleButtons' => [
                        'delete' => function ($model, $key, $index) {
                            return Yii::$app->user->identity->isAdmin();
                        }
                ]
            ],
        ],
    ]); ?>


</div>
