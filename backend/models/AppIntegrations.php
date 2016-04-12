<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "app_integrations".
 *
 * @property integer $id
 * @property string $app_name
 * @property string $app_logo
 *
 * @property ProductAppIntegrations[] $productAppIntegrations
 */
class AppIntegrations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'app_integrations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['app_name'], 'required'],
            [['app_name'], 'string', 'max' => 100],
            [['app_logo'], 'string', 'max' => 60],
            [['app_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'app_name' => 'App Name',
            'app_logo' => 'App Logo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductAppIntegrations()
    {
        return $this->hasMany(ProductAppIntegrations::className(), ['app_id' => 'id']);
    }
}
