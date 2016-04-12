<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_post".
 *
 * @property string $id
 * @property integer $user_id
 * @property string $product_id
 * @property string $post_title
 * @property string $post_content
 * @property string $post_date
 * @property integer $status
 * @property integer $like
 * @property integer $dislike
 *
 * @property Product $product
 * @property UserLogin $user
 */
class ProductPost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'product_id', 'post_title', 'post_content', 'post_date'], 'required'],
            [['user_id', 'product_id', 'status', 'like', 'dislike'], 'integer'],
            [['post_content'], 'string'],
            [['post_date'], 'safe'],
            [['post_title'], 'string', 'max' => 200]
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
            'post_title' => 'Post Title',
            'post_content' => 'Post Content',
            'post_date' => 'Post Date',
            'status' => '0: Unpublished | 1: Published | 2: Draft | 3: Blocked | 4: Deleted',
            'like' => 'Like',
            'dislike' => 'Dislike',
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
