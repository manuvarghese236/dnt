<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Treatment;

/**
 * TreatmentSearch represents the model behind the search form about `app\models\Treatment`.
 */
class TreatmentSearch extends Treatment
{
                public $searchstring;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type_id', 'doc_id', 'patient_id'], 'integer'],
            [['searchstring'], 'safe'],
            [['cost', 'dicsount'], 'number'],
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
        $query = Treatment::find();

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

        $query->joinWith('treatmentType')
                ->joinWith('doctor')
                ->joinWith('patient');
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'cost' => $this->cost,
            'dicsount' => $this->dicsount,
        ]);

        $query->orFilterWhere(['like', 'treatment_type.name', $this->searchstring])
                ->orFilterWhere(['like', 'doctor.name', $this->searchstring])
                 ->orFilterWhere(['like', 'patient.name', $this->searchstring]);

        return $dataProvider;
    }
}
