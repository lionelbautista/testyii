<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Vehicle;

/* @var $this yii\web\View */
/* @var $model frontend\models\Driver */
/* @var $form yii\widgets\ActiveForm */
/* @var $vehicle_list frontend\models\Vehicle */
?>

<div class="driver-form">

    <?php $form = ActiveForm::begin(); ?>

<!--     <?= $form->field($model, 'vehicle_id')->textInput() ?> -->    
    <?= $form->field($model,'vehicle_id')->dropDownList(
        ArrayHelper::map(Vehicle::find()->all(), 'id', 'model')) ?> 
    

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zip_code')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
