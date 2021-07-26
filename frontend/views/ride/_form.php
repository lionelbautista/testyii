<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Driver;
use frontend\models\Passenger;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Ride */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ride-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'passenger_id')->textInput() ?>

    <?= $form->field($model, 'driver_id')->textInput() ?> -->

    <?= $form->field($model,'passenger_id')->dropDownList(
        ArrayHelper::map(Passenger::find()->all(), 'id',
		function($model) {
		        return 'Passenger: '.$model['first_name'].' '.$model['last_name'].', '. 'Phone: '. $model['phone'];
		    })) ?>
    <?= $form->field($model,'driver_id')->dropDownList(
        ArrayHelper::map(Driver::find()->all(), 'id',
        	function($model) {
		        return 'Driver: '.$model['first_name'].' '.$model['last_name'].', '.
		        'Phone: '. $model['phone'];
		    })) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
