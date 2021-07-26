<?php

namespace frontend\models;

use Yii;
use frontend\models\Driver;
use frontend\models\Passenger;
/**
 * This is the model class for table "ride".
 *
 * @property int $id
 * @property int $passenger_id
 * @property int $driver_id
 *
 * @property Driver $driver
 * @property Passenger $passenger
 */
class Ride extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    
    public static function tableName()
    {
        return 'ride';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['passenger_id', 'driver_id'], 'required'],
            [['passenger_id', 'driver_id'], 'integer'],
            [['driver_id'], 'exist', 'skipOnError' => true, 'targetClass' => Driver::className(), 'targetAttribute' => ['driver_id' => 'id']],
            [['passenger_id'], 'exist', 'skipOnError' => true, 'targetClass' => Passenger::className(), 'targetAttribute' => ['passenger_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'passenger_id' => 'Passenger ID',
            'driver_id' => 'Driver ID',
        ];
    }

    /**
     * Gets query for [[Driver]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDriver()
    {
        return $this->hasOne(Driver::className(), ['id' => 'driver_id']);
    }

    /**
     * Gets query for [[Passenger]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPassenger()
    {
        return $this->hasOne(Passenger::className(), ['id' => 'passenger_id']);
    }
}
