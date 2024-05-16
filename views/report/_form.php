<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Report $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="report-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'order_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Order::find()->where(['user_id' => Yii::$app->user->id])->all(), 'id', 'number')) ?>

    <?= $form->field($model, 'days')->textInput() ?>

    <?= $form->field($model, 'detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reason')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'help_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Help::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'quality_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Quality::find()->all(), 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
