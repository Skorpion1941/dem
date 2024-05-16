<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Статистика';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <h4>Количество выполненной работы: <?= \app\models\Order::find()->where(['status_id' => 3])->count() ?></h4>
    <h4>Среднее время выполнения работы: <?= intval(\app\models\Report::find()->average('days')) ?> дней</h4>

    <h4>Количество внешней поломки: <?= \app\models\Order::find()->where(['type_problem_id' => 1])->count() ?></h4>
    <h4>Количество внутренние поломки: <?= \app\models\Order::find()->where(['type_problem_id' => 2])->count() ?></h4>
    <h4>Количество общей поломки: <?= \app\models\Order::find()->where(['type_problem_id' => 3])->count() ?></h4>
</div>
