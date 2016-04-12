<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pricing_models".
 *
 * @property integer $id
 * @property string $model_name
 *
 * @property ProductPricingModels[] $productPricingModels
 */
class PricingModels extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pricing_models';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model_name'], 'required'],
            [['model_name'], 'string', 'max' => 60],
            [['model_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'model_name' => 'Model Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPricingModels()
    {
        return $this->hasMany(ProductPricingModels::className(), ['pricing_model_id' => 'id']);
    }
}
