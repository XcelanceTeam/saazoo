<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_faq_answers".
 *
 * @property string $id
 * @property string $product_id
 * @property integer $question_id
 * @property string $answers
 *
 * @property Product $product
 * @property ProductFaq $question
 */
class ProductFaqAnswers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_faq_answers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'question_id', 'answers'], 'required'],
            [['product_id', 'question_id'], 'integer'],
            [['answers'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'question_id' => 'Question ID',
            'answers' => 'Answers',
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
    public function getQuestion()
    {
        return $this->hasOne(ProductFaq::className(), ['id' => 'question_id']);
    }
}
