<?php

namespace backend\models\event;

use Yii;

/**
 * This is the model class for table "event_status".
 *
 * @property integer $id_status
 * @property integer $id_event
 * @property string $description
 *
 * @property Event $idEvent
 */
class EventStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_status', 'id_event', 'description'], 'required'],
            [['id_status', 'id_event'], 'integer'],
            [['description'], 'string', 'max' => 100],
            [['id_event'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['id_event' => 'id_event']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_status' => 'Id Status',
            'id_event' => 'Id Event',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEvent()
    {
        return $this->hasOne(Event::className(), ['id_event' => 'id_event']);
    }
}
