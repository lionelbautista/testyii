<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Ride */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rides', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ride-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            // 'passenger_id',
            // 'driver_id',
             [
                'label' => 'Passenger Information',
                'attribute' => 'passenger_id',
                'format' => 'raw',
                'value'=> function($model){
                    // return "<a href='".Url::to(["product/buy", "id" => $model->id])."' class='btn btn-primary'>Buy Now</a>";
                    return "Passenger Name:" .' '. $model->passenger->first_name. " ". $model->passenger->last_name. 
                           ",  Passenger Phone Number:".' '.$model->passenger->phone ;
                }
            ],
            // 'driver_id',
            [
                'label' => 'Driver Information',
                'attribute' => 'driver_id',
                'format' => 'raw',
                'value'=> function($model){
                    // return "<a href='".Url::to(["product/buy", "id" => $model->id])."' class='btn btn-primary'>Buy Now</a>";
                    return "Driver Name :" .' '. $model->driver->first_name. " ". $model->driver->last_name. 
                           ",  Driver Phone Number: ".' '.$model->driver->phone ;
                }
            ],
        ],
    ]) ?>

</div>
