<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_personal_details".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $gender
 * @property string $doj
 * @property integer $industry_type
 * @property string $notification_email
 * @property string $monthly_budget
 *
 * @property BusinessIndustries $industryType
 * @property UserLogin $user
 */
class UserPersonalDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_personal_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'first_name', 'doj', 'industry_type'], 'required'],
            [['user_id', 'industry_type'], 'integer'],
            [['doj'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 25],
            [['gender'], 'string', 'max' => 7],
            [['notification_email'], 'string', 'max' => 150],
            [['monthly_budget'], 'string', 'max' => 15],
            [['user_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'gender' => 'Gender',
            'doj' => 'Doj',
            'industry_type' => 'Industry Type',
            'notification_email' => 'Notification Email',
            'monthly_budget' => 'Monthly Budget',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndustryType()
    {
        return $this->hasOne(BusinessIndustries::className(), ['id' => 'industry_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserLogin::className(), ['id' => 'user_id']);
    }
}
