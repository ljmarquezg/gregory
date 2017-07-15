<?php

namespace backend\models\guest;

use Yii;

/**
 * This is the model class for table "guest".
 *
 * @property integer $id_guest
 * @property integer $id_list
 * @property integer $id_event
 * @property string $token
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $email
 * @property string $address
 * @property string $mailing_address
 * @property string $phone
 * @property string $guest_type
 * @property integer $gender
 * @property string $aditional_information
 * @property integer $status
 * @property string $picture
 *
 * @property Event $event
 * @property Gender $gender0
 * @property GuestList $idList
 * @property GuestStatus $status0
 * @property GuestActivity[] $guestActivities
 * @property GuestDetail[] $guestDetails
 * @property GuestPlusOne[] $guestPlusOnes
 */
class Guest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_list', 'id_event', 'first_name', 'last_name', 'email', 'address', 'mailing_address', 'phone', 'guest_type', 'gender', 'guest_status'], 'required'],
            [['id_guest', 'id_list', 'id_event', 'gender', 'guest_status'], 'integer'],
            [['guest_type'], 'string'],
            [['token', 'phone'], 'string', 'max' => 12],
            [['first_name', 'middle_name', 'last_name'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 120],
            [['address', 'mailing_address', 'aditional_information', 'picture'], 'string', 'max' => 255],
            //[['gender'], 'exist', 'skipOnError' => true, 'targetClass' => Gender::className(), 'targetAttribute' => ['gender' => 'id_gender']],
            //[['id_list'], 'exist', 'skipOnError' => true, 'targetClass' => GuestList::className(), 'targetAttribute' => ['id_list' => 'id_list']],
            //[['status'], 'exist', 'skipOnError' => true, 'targetClass' => GuestStatus::className(), 'targetAttribute' => ['status' => 'id_guest_status']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_guest' => 'Id Guest',
            'id_list' => 'Id List',
            'id_event' => 'Id Event',
            'token' => 'Token',
            'fullName' => Yii::t('app', 'Full Name'),
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'address' => 'Address',
            'mailing_address' => 'Mailing Address',
            'phone' => 'Phone',
            'guest_type' => 'Guest Type',
            'gender' => 'Gender',
            'aditional_information' => 'Aditional Information',
            'guest_status' => 'Status',
            'picture' => 'Picture',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEvent()
    {
        return $this->hasOne(Event::className(), ['id_event' => 'id_event']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGender()
    {
        return $this->hasOne(Gender::className(), ['id_gender' => 'gender']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdList()
    {
        return $this->hasOne(GuestList::className(), ['id_list' => 'id_list']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(GuestStatus::className(), ['id_guest_status' => 'guest_status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGuestActivities()
    {
        return $this->hasMany(GuestActivity::className(), ['id_guest' => 'id_guest']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGuestDetails()
    {
        return $this->hasMany(GuestDetail::className(), ['id_guest' => 'id_guest']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGuestPlusOnes()
    {
        return $this->hasMany(GuestPlusOne::className(), ['id_guest' => 'id_guest']);
    }

    /* Getter for person full name */
        public function getFullName() {
            return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
        }
}
