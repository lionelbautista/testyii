<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "passenger".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $city
 * @property string $province
 * @property string $zipcode
 *
 * @property Ride[] $rides
 */
class Passenger extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'passenger';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'phone', 'city', 'province', 'zipcode'], 'required'],
            
            [['email'], 'email'],
            [['email'], 'unique'],

            [['first_name', 'last_name', 'email', 'phone', 'city', 'province', 'zipcode'], 'string', 'max' => 200],
            [['email'], 'unique'],

            [['city'], 'validateCity'],
        ];
    }


    public function validateCity($attribute, $params, $validator)
    {
        if (!in_array($this->$attribute, ['manila', 'pasay', 'makati'])) {
            $this->addError($attribute, 'The city must be either manila, pasay or makati');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'city' => 'City',
            'province' => 'Province',
            'zipcode' => 'Zipcode',
        ];
    }

    /**
     * Gets query for [[Rides]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRides()
    {
        return $this->hasMany(Ride::className(), ['passenger_id' => 'id']);
    }
}
