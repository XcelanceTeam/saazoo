<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company_size".
 *
 * @property integer $id
 * @property string $members
 * @property integer $start_index
 * @property integer $end_index
 *
 * @property UserCompanyDetails[] $userCompanyDetails
 * @property UserLinkdinDetails[] $userLinkdinDetails
 */
class CompanySize extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_size';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'members', 'start_index'], 'required'],
            [['id', 'start_index', 'end_index'], 'integer'],
            [['members'], 'string', 'max' => 20],
            [['members'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'members' => 'Members',
            'start_index' => 'Start Index',
            'end_index' => 'End Index',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserCompanyDetails()
    {
        return $this->hasMany(UserCompanyDetails::className(), ['company_size' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserLinkdinDetails()
    {
        return $this->hasMany(UserLinkdinDetails::className(), ['user_company_size' => 'id']);
    }
}
