<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\VarDumper;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DriverSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Drivers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="driver-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Driver', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            // 'vehicle_id',
            [
                'label' => 'Vehicle Model',
                'attribute'=>'vehicle',
                'value' => 'vehicle.model'
            ],
            'first_name',
            'last_name',
            'email:email',
            //'phone',
            //'city',
            //'province',
            //'zip_code',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
