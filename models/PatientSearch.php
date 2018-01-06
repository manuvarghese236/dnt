<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Patient;

/**
 * patientSearch represents the model behind the search form about `app\models\patient`.
 */
class patientSearch extends patient
{
                    public $searchstring;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'blood_group'], 'integer'],
            [['id', 'Sex'], 'integer'],
            [['name', 'phone', 'email', 'address','searchstring'], 'safe'],
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
        $query = patient::find();

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
            'Sex' => $this->Sex,
        ]);

        
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'blood_group' => $this->blood_group,
        ]);
        
        $query->orFilterWhere(['like', 'name', $this->searchstring])
            ->orFilterWhere(['like', 'phone', $this->searchstring])
            ->orFilterWhere(['like', 'email', $this->searchstring])
            ->orFilterWhere(['like', 'address', $this->searchstring])
                ->orFilterWhere(['like', 'blood_group', $this->searchstring]);

        return $dataProvider;
    }
}
