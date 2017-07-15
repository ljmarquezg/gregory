<?php

namespace backend\models\guest;

use Yii;

/**
 * This is the model class for table "guest_status".
 *
 * @property integer $id_guest_status
 * @property string $description
 * @property integer $theme
 */
class GuestStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guest_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['id_guest_status', 'theme'], 'integer'],
            [['description'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_guest_status' => 'Id Guest Status',
            'description' => 'Description',
            'theme' => 'Theme',
        ];
    }
}
