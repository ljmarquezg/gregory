<?php

namespace backend\models\guest;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\guest\Event;

/**
 * EventSearch represents the model behind the search form about `backend\models\guest\Event`.
 */
class EventSearch extends Event
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_event', 'diration', 'id_event_type', 'status'], 'integer'],
            [['event_title', 'date', 'venue', 'venue_address', 'city', 'state', 'zip', 'image', 'created', 'updated'], 'safe'],
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
        $query = Event::find();

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
            'id_event' => $this->id_event,
            'date' => $this->date,
            'diration' => $this->diration,
            'id_event_type' => $this->id_event_type,
            'created' => $this->created,
            'updated' => $this->updated,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'event_title', $this->event_title])
            ->andFilterWhere(['like', 'venue', $this->venue])
            ->andFilterWhere(['like', 'venue_address', $this->venue_address])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'zip', $this->zip])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
