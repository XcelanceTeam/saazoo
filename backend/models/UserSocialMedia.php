<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_social_media".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $media_name
 * @property string $media_link
 *
 * @property UserLogin $user
 */
class UserSocialMedia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_social_media';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['media_name'], 'string', 'max' => 45],
            [['media_link'], 'string', 'max' => 250]
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
            'media_name' => 'Media Name',
            'media_link' => 'Media Link',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserLogin::className(), ['id' => 'user_id']);
    }
}
