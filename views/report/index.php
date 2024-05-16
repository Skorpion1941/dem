<?php

use app\models\Report;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Reports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if(!Yii::$app->user->isGuest && !Yii::$app->user->identity->isAdmin()): ?>
        <?= Html::a('Create Report', ['create'], ['class' => 'btn btn-success']) ?>
        <?php endif; ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         //   'id',
            [
                'attribute' => 'order_id',
                'value' => function ($model) {
                    return $model->order->number;
                }
            ],
            [
                'attribute' => 'user_id',
                'label' => 'Ответственный',
                'value' => function ($model) {
                    return $model->order->user->name;
                }
            ],
            'days',
            'detail',
            'price',
            //'reason',
            //'help_id',
            //'quality_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Report $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
