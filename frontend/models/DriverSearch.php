<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Driver;




/**
 * DriverSearch represents the model behind the search form of `frontend\models\Driver`.
 */
class DriverSearch extends Driver
{
    /**
     * {@inheritdoc}
     */
    public $vehicle; 
    public function rules()
    {
        return [
            [['id', 'vehicle_id'], 'integer'],
            [['vehicle','first_name', 'last_name', 'email', 'phone', 'city', 'province', 'zip_code'], 'safe'],
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
        $query = Driver::find()->joinWith(['vehicle']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' =>
                ['id',
                 'vehicle' => 
                    [   'asc' => ['vehicle.model' => SORT_ASC],
                        'desc' => ['vehicle.model' => SORT_DESC],
                        'default' => SORT_ASC,
                    ],
                 'first_name',
                 'last_name',
                 'email'
                ], 
             ]
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
            'vehicle_id' => $this->vehicle_id,
        ]);

        $query->andFilterWhere(['like', 'vehicle.model', $this->vehicle])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'province', $this->province]);

        return $dataProvider;
    }
}
