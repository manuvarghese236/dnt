<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Doctor;

/**
 * DoctorSearch represents the model behind the search form about `app\models\Doctor`.
 */
class DoctorSearch extends Doctor
{
                        public $searchstring;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'email', 'clinic_id', 'specialization_id', 'rating'], 'integer'],
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
        $query = Doctor::find();

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

        $query->joinWith('specialization');
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'clinic_id' => $this->clinic_id,
            'rating' => $this->rating,
        ]);

        $query->orFilterWhere(['like', 'doctor.name', $this->searchstring])
                ->orFilterWhere(['like', 'mobile', $this->searchstring])
                ->orFilterWhere(['like', 'email', $this->searchstring])
                ->orFilterWhere(['like', 'specialization.name', $this->searchstring]);

        return $dataProvider;
    }
}
