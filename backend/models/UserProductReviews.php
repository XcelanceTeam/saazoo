<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_product_reviews".
 *
 * @property string $id
 * @property integer $user_id
 * @property string $product_id
 * @property string $review_title
 * @property string $review_text
 * @property string $review_pros
 * @property string $review_cons
 * @property string $review_timestamp
 * @property string $review_for
 *
 * @property Product $product
 * @property UserLogin $user
 */
class UserProductReviews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_product_reviews';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'product_id', 'review_title', 'review_text', 'review_timestamp', 'review_for'], 'required'],
            [['user_id', 'product_id'], 'integer'],
            [['review_text', 'review_pros', 'review_cons'], 'string'],
            [['review_timestamp'], 'safe'],
            [['review_title'], 'string', 'max' => 100],
            [['review_for'], 'string', 'max' => 10]
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
            'review_title' => 'Review Title',
            'review_text' => 'Review Text',
            'review_pros' => 'Review Pros',
            'review_cons' => 'Review Cons',
            'review_timestamp' => 'Review Timestamp',
            'review_for' => 'app | pricing',
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
