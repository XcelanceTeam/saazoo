<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "geographic_areas".
 *
 * @property integer $id
 * @property string $geographic_name
 *
 * @property ProductGeographicAreas[] $productGeographicAreas
 * @property UserLinkdinDetails[] $userLinkdinDetails
 */
class GeographicAreas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'geographic_areas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['geographic_name'], 'required'],
            [['geographic_name'], 'string', 'max' => 100],
            [['geographic_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'geographic_name' => 'Geographic Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductGeographicAreas()
    {
        return $this->hasMany(ProductGeographicAreas::className(), ['geographic_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserLinkdinDetails()
    {
        return $this->hasMany(UserLinkdinDetails::className(), ['user_geographic_area' => 'id']);
    }
}
