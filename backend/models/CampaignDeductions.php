<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "campaign_deductions".
 *
 * @property string $id
 * @property integer $user_id
 * @property string $product_id
 * @property double $amount_deducted
 * @property string $comments
 *
 * @property Product $product
 * @property UserLogin $user
 */
class CampaignDeductions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'campaign_deductions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'product_id', 'comments'], 'required'],
            [['user_id', 'product_id'], 'integer'],
            [['amount_deducted'], 'number'],
            [['comments'], 'string']
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
            'product_id' => 'Product ID',
            'amount_deducted' => 'Amount Deducted',
            'comments' => 'Comments',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserLogin::className(), ['id' => 'user_id']);
    }
}
