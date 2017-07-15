<?php

namespace backend\models\guest;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\guest\Guest;

/**
 * GuestSearch represents the model behind the search form about `backend\models\guest\Guest`.
 */
class GuestSearch extends Guest
{

    public $fullName;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_guest', 'id_list', 'id_event', 'gender', 'status'], 'integer'],
            [['token', 'first_name', 'middle_name', 'last_name', 'email', 'address', 'mailing_address', 'phone', 'guest_type', 'aditional_information', 'picture', 'fullName'], 'safe'],

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
        $query = Guest::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

       $dataProvider->setSort([
        'attributes' => [
        'guest_type',
            'id_guest',
            'email',
            'phone',
            'mailing_address',
            'gender',
            'aditional_information',
            'fullName' => [
                'asc' => ['first_name' => SORT_ASC,  'middle_name' => SORT_ASC, 'last_name' => SORT_ASC],
                'desc' => ['first_name' => SORT_DESC, 'middle_name' => SORT_ASC, 'last_name' => SORT_DESC],
                'label' => 'Full Name',
                'default' => SORT_ASC
            ],
            ],
           
        ]);

        if (!($this->load($params) && $this->validate())) {
        return $dataProvider;
        }
 
           /* $this->addCondition($query, 'id_guest');
            $this->addCondition($query, 'first_name', true);
            $this->addCondition($query, 'middle_name', true);
            $this->addCondition($query, 'last_name', true);*/

        /*$this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }*/

       

        // grid filtering conditions
        $query->andFilterWhere([
            'id_guest' => $this->id_guest,
            'id_list' => $this->id_list,
            'id_event' => $this->id_event,
            'gender' => $this->gender,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'token', $this->token])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'mailing_address', $this->mailing_address])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'guest_type', $this->guest_type])
            ->andFilterWhere(['like', 'aditional_information', $this->aditional_information])
            ->andFilterWhere(['like', 'picture', $this->picture]);

             $query->andWhere('first_name LIKE "%' . $this->fullName . '%" ' .
        'OR middle_name LIKE "%' . $this->fullName . '%"' . 'OR last_name LIKE "%' . $this->fullName . '%"'
    );
        return $dataProvider;
    }
}
