<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Ride;

/**
 * RideSearch represents the model behind the search form of `frontend\models\Ride`.
 */
class RideSearch extends Ride
{
    /**
     * {@inheritdoc}
     */
    public $driver_name;    
    public $driver_phone;
    public $passenger_name;
    public $passenger_phone;
    public $vehicle_model;
    public $vehicle_plate_number;
    // public $driver;
    // public $passenger;
    public function rules()
    {
        return [
            [['id', 'passenger_id', 'driver_id'], 'integer'],
            // [['driver', 'passenger',], 'safe'],
            [['driver_name', 'driver_phone',
               'passenger_name', 'passenger_phone', 'vehicle_model', 'vehicle_plate_number'], 'safe']
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
    

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Ride::find()
                ->innerJoin("passenger", "passenger.id = ride.passenger_id")
                ->innerJoin("driver", "driver.id = ride.driver_id")
                ->innerJoin("vehicle", "vehicle.id = driver.vehicle_id");
      

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => 
                ['id',
                 'passenger_id',
                 'driver_id',
                 
                 'passenger_name'=>[
                    'asc' => ["CONCAT(passenger.first_name, ' ', passenger.last_name)" => SORT_ASC],
                    'desc' =>["CONCAT(passenger.first_name, ' ', passenger.last_name)" => SORT_DESC],
                     'default' => SORT_ASC,
                  ],

                  'vehicle_model'=>[
                    'asc' => ["vehicle.model" => SORT_ASC],
                    'desc' =>["vehicle.model" => SORT_DESC],
                     'default' => SORT_ASC,
                  ],

                
                 
                ],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'passenger_id' => $this->passenger_id,
            'driver_id' => $this->driver_id,
        ]);        
        
        $query->andFilterWhere(['like', "CONCAT(passenger.first_name, ' ', passenger.last_name)", $this->passenger_name]);
        $query->andFilterWhere(['like', 'passenger.phone', $this->passenger_phone]);
        $query->andFilterWhere(['like', 'vehicle.model', $this->vehicle_model]);
        
        return $dataProvider;
    }
}
