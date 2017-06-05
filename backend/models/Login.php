<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%admin}}".
 *
 * @property integer $admin_id
 * @property string $admin_name
 * @property string $admin_pwd
 * @property string $admin_email
 * @property string $admin_addtime
 * @property string $admin_lasttime
 */
class Login extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{b_admin}}';
    }

    /**
     * 获取用户信息
     * @param char $user
     * @param char $pwd
     * @return Admin|array|null
     */
    public function get_user($user,$pwd){
        return $this->find()->where(['admin_name'=>$user,'admin_pwd'=>$pwd])->asArray()->one();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_name', 'admin_pwd'], 'string', 'max' => 255],
            [['admin_name', 'admin_pwd'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
//    public function attributeLabels()
//    {
//        return [
//            'admin_id' => Yii::t('app', 'Admin ID'),
//            'admin_name' => Yii::t('app', 'Admin Name'),
//            'admin_pwd' => Yii::t('app', 'Admin Pwd'),
//            'admin_email' => Yii::t('app', 'Admin Email'),
//            'admin_addtime' => Yii::t('app', 'Admin Addtime'),
//            'admin_lasttime' => Yii::t('app', 'Admin Lasttime'),
//        ];
//    }

    /**
     * @inheritdoc
     * @return AdminQuery the active query used by this AR class.
     */
//    public static function find()
//    {
//        return new LoginQuery(get_called_class());
//    }
}
