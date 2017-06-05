<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
/**
 * This is the model class for table "aa".
 *
 * @property integer $id
 * @property string $ids
 * @property string $content
 */
class Aa extends \yii\db\ActiveRecord
{
    public $verifyCode;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ids', 'content'], 'string', 'max' => 255],
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ids' => 'Ids',
            'content' => 'Content',
            'verifyCode' => 'Verification Code',
        ];
    }
}
