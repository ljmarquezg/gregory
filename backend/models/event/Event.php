<?php

namespace backend\models\event;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property integer $id_event
 * @property string $event_title
 * @property string $date
 * @property integer $diration
 * @property integer $id_event_type
 * @property string $venue
 * @property string $venue_address
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property string $image
 * @property string $created
 * @property string $updated
 * @property integer $status
 *
 * @property Guest $idEvent
 * @property EventStatus[] $eventStatuses
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_title', 'date', 'diration', 'id_event_type', 'created', 'updated', 'status'], 'required'],
            [['date', 'created', 'updated'], 'safe'],
            [['diration', 'id_event_type', 'status'], 'integer'],
            [['venue_address'], 'string'],
            [['event_title'], 'string', 'max' => 200],
            [['venue', 'image'], 'string', 'max' => 255],
            [['city', 'state', 'zip'], 'string', 'max' => 50],
            [['id_event'], 'exist', 'skipOnError' => true, 'targetClass' => Guest::className(), 'targetAttribute' => ['id_event' => 'id_event']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_event' => 'Id Event',
            'event_title' => 'Event Title',
            'date' => 'Date',
            'diration' => 'Diration',
            'id_event_type' => 'Id Event Type',
            'venue' => 'Venue',
            'venue_address' => 'Venue Address',
            'city' => 'City',
            'state' => 'State',
            'zip' => 'Zip',
            'image' => 'Image',
            'created' => 'Created',
            'updated' => 'Updated',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEvent()
    {
        return $this->hasOne(Guest::className(), ['id_event' => 'id_event']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventStatuses()
    {
        return $this->hasMany(EventStatus::className(), ['id_event' => 'id_event']);
    }
}
