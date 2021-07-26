<?php

namespace frontend\models;


use Yii;
use frontend\models\Vehicle;
/**
 * This is the model class for table "driver".
 *
 * @property int $id
 * @property int $vehicle_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $city
 * @property string $province
 * @property string $zip_code
 *
 * @property Vehicle $vehicle
 * @property Ride[] $rides
 */
class Driver extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'driver';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vehicle_id', 'first_name', 'last_name', 'email', 'phone', 'city', 'province', 'zip_code'], 'required'],
            [['vehicle_id'], 'integer'],
            [['first_name', 'last_name', 'email', 'phone', 'city', 'province', 'zip_code'], 'string', 'max' => 200],
            [['email'], 'unique'],
            [['vehicle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vehicle::className(), 'targetAttribute' => ['vehicle_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vehicle_id' => 'Vehicle Model',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'city' => 'City',
            'province' => 'Province',
            'zip_code' => 'Zip Code',
        ];
    }

    /**
     * Gets query for [[Vehicle]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehicle()
    {
        return $this->hasOne(Vehicle::className(), ['id' => 'vehicle_id']);
    }

    /**
     * Gets query for [[Rides]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRides()
    {
        return $this->hasMany(Ride::className(), ['driver_id' => 'id']);
    }
}
