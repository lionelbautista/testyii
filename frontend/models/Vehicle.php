<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "vehicle".
 *
 * @property int $id
 * @property string $model
 * @property string $year
 * @property string $plate_number
 *
 * @property Driver[] $drivers
 */
class Vehicle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehicle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['model', 'year', 'plate_number'], 'required'],
            [['model', 'year'], 'string', 'max' => 200],
            [['plate_number'], 'string', 'max' => 100],
            [['year'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'model' => 'Model',
            'year' => 'Year',
            'plate_number' => 'Plate Number',
        ];
    }

    /**
     * Gets query for [[Drivers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDrivers()
    {
        return $this->hasMany(Driver::className(), ['vehicle_id' => 'id']);
    }
}
