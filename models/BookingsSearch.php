<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bookings;

/**
 * BookingsSearch represents the model behind the search form about `app\models\Bookings`.
 */
class BookingsSearch extends Bookings
{
            public $searchstring;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'doctors_id', 'status_id'], 'integer'],
            [['date', 'datetime_start','patients_id', 'datetime_end', 'diseases_description','searchstring'], 'safe'],
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
    public function searchToday($params)
    {
        $query = Bookings::find();

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

        $query->joinWith('patient')
                ->joinWith('doctor');
        
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'date' => $this->date,
            'datetime_start' => $this->datetime_start,
            'datetime_end' => $this->datetime_end,
            'status_id' => $this->status_id,
        ]);

        $query->orFilterWhere(['like', 'patient.name',$this->searchstring])
                ->orFilterWhere(['like', 'doctor.name',$this->searchstring]);

//        echo 'q: '.$query;
        
        return $dataProvider;
    }
    public function search($params)
    {
        $query = Bookings::find();

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

        $query->joinWith('patient')
                ->joinWith('doctor');
        
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'date' => $this->date,
            'datetime_start' => $this->datetime_start,
            'datetime_end' => $this->datetime_end,
            'status_id' => $this->status_id,
        ]);

        $query->orFilterWhere(['like', 'patient.name',$this->searchstring])
                ->orFilterWhere(['like', 'doctor.name',$this->searchstring]);

//        echo 'q: '.$query;
        
        return $dataProvider;
    }
}
