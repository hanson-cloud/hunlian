<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%comment}}".
 *
 * @property integer $comment_id
 * @property integer $user_id
 * @property string $user_name
 * @property string $comment_type
 * @property string $comment_content
 * @property integer $comment_time
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_appointment';
    }

    /**
     * @inheritdoc
     * @return CommentQuery the active query used by this AR class.
     */
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'appointment_title' => '标题',
            'appointment_content' => '内容',
            'appointment_time'=> '时间' ,
            'address' => '地点',
            'appointment_image' => '图片',
        ];
    }

}
