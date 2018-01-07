<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Consultations;

/**
 * ConsultationsSearch represents the model behind the search form about `app\models\Consultations`.
 */
class ConsultationsSearch extends Consultations
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'patient_id', 'doctor_Id', 'session_id', 'booking_id'], 'integer'],
            [['Date', 'findings', 'notes'], 'safe'],
            [['Amount'], 'number'],
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
        $query = Consultations::find();

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
            'id' => $this->id,
            'patient_id' => $this->patient_id,
            'doctor_Id' => $this->doctor_Id,
            'Date' => $this->Date,
            'session_id' => $this->session_id,
            'booking_id' => $this->booking_id,
            'Amount' => $this->Amount,
        ]);

        $query->andFilterWhere(['like', 'findings', $this->findings])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
