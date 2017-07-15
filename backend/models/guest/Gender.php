<?php

namespace backend\models\guest;

use Yii;
use yii\helpers\Json;
/**
 * This is the model class for table "gender".
 *
 * @property integer $id_gender
 * @property string $description
 *
 * @property Guest[] $guests
 */
class Gender extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gender';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_gender', 'description'], 'required'],
            [['id_gender'], 'integer'],
            [['description'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_gender' => 'Id Gender',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGuests()
    {
        return $this->hasMany(Guest::className(), ['gender' => 'id_gender']);
    }
}
