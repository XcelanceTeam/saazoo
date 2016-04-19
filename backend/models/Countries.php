<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "countries".
 *
 * @property integer $id
 * @property string $name
 *
 * @property UserPersonalDetails[] $userPersonalDetails
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'countries';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserPersonalDetails()
    {
        return $this->hasMany(UserPersonalDetails::className(), ['countryid' => 'id']);
    }
}
