<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Prescription;

/**
 * PrescriptionSearch represents the model behind the search form about `app\models\Prescription`.
 */
class PrescriptionSearch extends Prescription
{
                        public $searchstring;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'medicine_id', 'doc_id', 'dosage_id', 'nos'], 'integer'],
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
        $query = Prescription::find();

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

        $query->joinWith('medicines')
                ->joinWith('doctor')
                ->joinWith('patient');
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'doc_id' => $this->doc_id,
            'dosage_id' => $this->dosage_id,
            'nos' => $this->nos,
        ]);

        $query->orFilterWhere(['like', 'medicines.name', $this->searchstring])
                ->orFilterWhere(['like', 'doctor.name', $this->searchstring])
                ->orFilterWhere(['like', 'patient.name', $this->searchstring]);

        return $dataProvider;
    }
}
