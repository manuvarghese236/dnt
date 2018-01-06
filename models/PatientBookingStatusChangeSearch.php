<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PatientBookingStatusChange;

/**
 * PatientBookingStatusChangeSearch represents the model behind the search form about `app\models\PatientBookingStatusChange`.
 */
class PatientBookingStatusChangeSearch extends PatientBookingStatusChange
{
                            public $searchstring;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'doctors_id', 'patients_id', 'status_id', 'time_hour', 'time_minute', 'time_session'], 'integer'],
            [['searchstring'], 'safe'],
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
//        echo date('Y-m-d');
//        die();
        $query = PatientBookingStatusChange::find()->where(['date'=>date('Y-m-d')]);

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
            'datetime_start' => $this->datetime_start,
            'datetime_end' => $this->datetime_end,
            'status_id' => $this->status_id,
            'time' => $this->time,
            'time_hour' => $this->time_hour,
            'time_minute' => $this->time_minute,
            'time_session' => $this->time_session,
        ]);

        $query->andFilterWhere(['or',['like', 'patient.name', $this->searchstring],
            ['like', 'doctor.name', $this->searchstring]])
//               -> orFilterWhere(['like', 'doctor.nam', $this->searchstring])
                ;

        return $dataProvider;
    }
}
