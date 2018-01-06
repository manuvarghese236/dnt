<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Availability;

/**
 * AvailabilitySearch represents the model behind the search form about `app\models\Availability`.
 */
class AvailabilitySearch extends Availability
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'Doc_id', 'd1', 's1', 'd2', 's2', 'd3', 's3', 'd4', 's4', 'd5', 's5', 'd6', 's6', 'd7', 's7', 'dall', 'sall'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Availability::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
            'Doc_id' => $this->Doc_id,
            'd1' => $this->d1,
            's1' => $this->s1,
            'd2' => $this->d2,
            's2' => $this->s2,
            'd3' => $this->d3,
            's3' => $this->s3,
            'd4' => $this->d4,
            's4' => $this->s4,
            'd5' => $this->d5,
            's5' => $this->s5,
            'd6' => $this->d6,
            's6' => $this->s6,
            'd7' => $this->d7,
            's7' => $this->s7,
            'dall' => $this->dall,
            'sall' => $this->sall,
        ]);

        return $dataProvider;
    }
}
