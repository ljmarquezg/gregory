<?php

namespace backend\models\list;

use Yii;

/**
 * This is the model class for table "guest_list".
 *
 * @property integer $id_list
 * @property string $description
 * @property integer $id_guest
 *
 * @property Guest[] $guests
 * @property GuestListSublist $idList
 */
class GuestList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guest_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_list', 'description', 'id_guest'], 'required'],
            [['id_list', 'id_guest'], 'integer'],
            [['description'], 'string', 'max' => 200],
            [['id_list'], 'exist', 'skipOnError' => true, 'targetClass' => GuestListSublist::className(), 'targetAttribute' => ['id_list' => 'id_list']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_list' => 'Id List',
            'description' => 'Description',
            'id_guest' => 'Id Guest',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGuests()
    {
        return $this->hasMany(Guest::className(), ['id_list' => 'id_list']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdList()
    {
        return $this->hasOne(GuestListSublist::className(), ['id_list' => 'id_list']);
    }
}
