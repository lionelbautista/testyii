<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\Driver;
use frontend\models\Passenger;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RideSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rides';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ride-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ride', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            [
                'label' => 'Passenger Name',
                'attribute' => 'passenger_name',
                'value'=>  function($model){
                    return $model->passenger->first_name." ".$model->passenger->last_name;
                }
                
            ],
            
            [
                'label' => 'Passenger Phone Number',
                'attribute' => 'passenger_phone',
                'value'=>  function($model){
                    return "under development";
                }
                
            ],
            [
                'label' => 'Driver Name',
                'attribute' => 'driver_name',
                'value'=>  function($model){
                    return "under development";
                }
            ],            
            [
                'label' => 'Driver Phone Number',
                'attribute' => 'driver_phone',
                'value'=>  function($model){
                    return "under development";
                }
            ],


            [
                'label' => 'Vehicle Model',
                'attribute' => 'vehicle_model',
                'value'=>  function($model){
                    return $model->driver->vehicle->model;
                }
            ],

            [
                'label' => 'Vehicle Plate Number',
                'attribute' => 'vehicle_plate_number',
                'value'=>  function($model){
                    return $model->driver->vehicle->plate_number;
                }
            ],

            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
