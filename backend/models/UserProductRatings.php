<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_product_ratings".
 *
 * @property string $id
 * @property integer $user_id
 * @property string $product_id
 * @property double $overall_rating
 * @property double $ease_of_use_rating
 * @property double $value_for_money
 * @property double $customer_support
 * @property string $using_app_duration
 * @property string $ratings_timestamp
 *
 * @property Product $product
 * @property UserLogin $user
 */
class UserProductRatings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_product_ratings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'product_id', 'using_app_duration', 'ratings_timestamp'], 'required'],
            [['user_id', 'product_id'], 'integer'],
            [['overall_rating', 'ease_of_use_rating', 'value_for_money', 'customer_support'], 'number'],
            [['ratings_timestamp'], 'safe'],
            [['using_app_duration'], 'string', 'max' => 30]
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
            'overall_rating' => 'Overall Rating',
            'ease_of_use_rating' => 'Ease Of Use Rating',
            'value_for_money' => 'Value For Money',
            'customer_support' => 'Customer Support',
            'using_app_duration' => 'Using App Duration',
            'ratings_timestamp' => 'Ratings Timestamp',
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
