<?php

namespace backend\models\guest;

use Yii;

/**
 * This is the model class for table "guest_list_sublist".
 *
 * @property integer $id_sublist
 * @property integer $id_list
 * @property integer $description
 *
 * @property GuestList $guestList
 */
class GuestListSublist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guest_list_sublist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sublist', 'id_list', 'description'], 'required'],
            [['id_sublist', 'id_list', 'description'], 'integer'],
            [['id_list'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_sublist' => 'Id Sublist',
            'id_list' => 'Id List',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGuestList()
    {
        return $this->hasOne(GuestList::className(), ['id_list' => 'id_list']);
    }
}
