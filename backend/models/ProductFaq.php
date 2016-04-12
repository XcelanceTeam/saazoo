<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_faq".
 *
 * @property integer $id
 * @property string $question_name
 *
 * @property ProductFaqAnswers[] $productFaqAnswers
 */
class ProductFaq extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_faq';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_name'], 'required'],
            [['question_name'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question_name' => 'Question Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductFaqAnswers()
    {
        return $this->hasMany(ProductFaqAnswers::className(), ['question_id' => 'id']);
    }
}
