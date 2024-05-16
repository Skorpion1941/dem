<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Order $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if(Yii::$app->user->identity->isAdmin()): ?>
    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_start')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'date_end')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'client')->textInput(['maxlength' => true]) ?>
    <?php endif; ?>

    <?php if(!$model -> isNewRecord): ?>
    <?= $form->field($model, 'status_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Status::find()->all(), 'id', 'name'),
        ['prompt' => '', 'value' => '1', 'onchange' => 'selectStatus(this)']) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <?php endif; ?>

    <?php if(Yii::$app->user->identity->isAdmin()): ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'user_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\User::find()->where(['user_role_id' => 2])->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'type_equipment_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\TypeEquipment::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'type_problem_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\TypeProblem::find()->all(), 'id', 'name')) ?>

    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
