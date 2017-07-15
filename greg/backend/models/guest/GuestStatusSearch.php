<?php

namespace backend\models\guest;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\guest\GuestStatus;

/**
 * GuestStatusSearch represents the model behind the search form about `backend\models\guest\GuestStatus`.
 */
class GuestStatusSearch extends GuestStatus
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_guest_status', 'theme'], 'integer'],
            [['description'], 'safe'],
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
        $query = GuestStatus::find();

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
            'id_guest_status' => $this->id_guest_status,
            'theme' => $this->theme,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
