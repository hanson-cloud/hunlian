<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "play".
 *
 * @property integer $id
 * @property string $name
 * @property integer $price
 * @property integer $sort
 */
class Active extends \yii\db\ActiveRecord
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
     */
    public function rules()
    {
        return [
//            [['price', 'sort'], 'integer'],
//            [['name'], 'string', 'max' => 255],
//            [['name','price','sort'],'required'],
//            [['img'], 'file','skipOnEmpty' => false, 'extensions' => 'png, jpg'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
//            'id' => 'ID',
//            'name' => '景点名称',
//            'img' => '图片',
//            'price' => '价格',
//            'sort' => '推荐排位',
        ];
    }
}
