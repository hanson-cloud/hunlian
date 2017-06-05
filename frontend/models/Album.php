<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "album".
 *
 * @property integer $id
 * @property string $file
 * @property integer $u_id
 */
class Album extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'album';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['u_id'], 'integer'],
            [['file'], 'file','extensions' => 'png, jpg','maxFiles' => 4],
            [['u_id'],'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file' => 'File',
            'u_id' => 'U ID',
        ];
    }
}
