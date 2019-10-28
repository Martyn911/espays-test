<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Auto;

/**
 * AutoSearch represents the model behind the search form of `app\models\Auto`.
 */
class AutoSearch extends Auto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'payed'], 'integer'],
            [['mark', 'model', 'number', 'color', 'comment'], 'safe'],
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
        $query = Auto::find();

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
            'payed' => $this->payed,
        ]);

        $query->andFilterWhere(['like', 'mark', $this->mark])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'number', $this->number])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
