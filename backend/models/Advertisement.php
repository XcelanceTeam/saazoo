<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "advertisement".
 *
 * @property string $id
 * @property string $title
 * @property integer $user_id
 * @property string $product_id
 * @property string $image_url
 * @property string $added_on
 * @property integer $status
 *
 * @property Product $product
 * @property UserLogin $user
 */
class Advertisement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advertisement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'user_id', 'product_id', 'image_url', 'added_on'], 'required'],
            [['user_id', 'product_id', 'status'], 'integer'],
            [['added_on'], 'safe'],
            [['title'], 'string', 'max' => 125],
            [['image_url'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'user_id' => 'User ID',
            'product_id' => 'Product ID',
            'image_url' => 'Image Url',
            'added_on' => 'Added On',
            'status' => '0: publish | 1: unpublish | 3: deleted',
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
