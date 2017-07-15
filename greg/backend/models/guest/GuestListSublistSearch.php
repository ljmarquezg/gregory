<?php

namespace backend\models\guest;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\guest\GuestListSublist;

/**
 * GuestListSublistSearch represents the model behind the search form about `backend\models\guest\GuestListSublist`.
 */
class GuestListSublistSearch extends GuestListSublist
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sublist', 'id_list', 'description'], 'integer'],
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
        $query = GuestListSublist::find();

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
            'id_sublist' => $this->id_sublist,
            'id_list' => $this->id_list,
            'description' => $this->description,
        ]);

        return $dataProvider;
    }
}
