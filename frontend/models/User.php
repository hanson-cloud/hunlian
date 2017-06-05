<?php

namespace frontend\models;

use Yii;


/**
 * This is the model class for table "{{%news}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 */
class User extends \yii\db\ActiveRecord
{
    //爱静
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['height', 'date_year', 'detail', 'register_time', 'email', 'marital_state', 'salary', 'degree', 'province', 'City'], 'required'],
            [['height', 'date_month', 'date_year', 'date_day', 'marital_state', 'salary', 'age'], 'integer'],
            [['register_time'], 'safe'],
            [['user_name', 'user_pwd', 'Image', 'hobby'], 'string', 'max' => 45],
            [['sex'], 'string', 'max' => 3],
            [['imgCode', 'degree', 'province'], 'string', 'max' => 10],
            [['detail'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 20],
            [['City'], 'string', 'max' => 5],
            [['tel'], 'string', 'max' => 11],
        ];
    }

    //首页列表展示查询
    public function selmuch()
    {
        $db = new \yii\db\Query();
        $table = $this->tableName();
        $post=$db
        ->from($table)
        ->select('user_id,user_name,user_pwd,tel,sex,height,detail,province,Image,age,hobby,salary')
        ->limit(10)
        ->all();
        if($post)
        {
            return $post;
        }
        return null;
    }

    //首页详情页展示   单条查询
    //查询多条数据
    public function seleteone($user_id)
    {
        $db = new \yii\db\Query();
        $table = $this->tableName();
        $post=$db
        ->from($table)
        ->select('user_id,user_name,user_pwd,tel,sex,height,birthday,detail,province,Image,age,hobby,salary')
        ->where('user_id=:user_id',[':user_id'=>$user_id])
        ->one();
        if($post)
        {
            return $post;
        }
        return null;
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_name' => 'User Name',
            'user_pwd' => 'User Pwd',
            'sex' => 'Sex',
            'height' => 'Height',
            'imgCode' => 'Img Code',
            'date_month' => 'Date Month',
            'date_year' => 'Date Year',
            'date_day' => 'Date Day',
            'detail' => 'Detail',
            'register_time' => 'Register Time',
            'email' => 'Email',
            'marital_state' => 'Marital State',
            'salary' => 'Salary',
            'degree' => 'Degree',
            'province' => 'Province',
            'City' => 'City',
            'Image' => 'Image',
            'age' => 'Age',
            'hobby' => 'Hobby',
            'tel' => 'Tel',
        ];
    }

    public function actionIns($tableName,$data)
    {
        $connection = \Yii::$app->db;
        $id = $connection->createCommand()->insert($tableName,$data)->execute();
        if($id)
        {
            $ids = \Yii::$app->db->getLastInsertID();
            return $ids;
        }
    }

    public function actionList($sql)
    {
        $connection = \Yii::$app->db;
        $command = $connection->createCommand($sql);
        $posts = $command->queryAll();
        return $posts;
    }

    //根据用户名查询密码
    public function selone($user)
    {
        $db = new \yii\db\Query();
        $table = $this->tableName();
        $post=$db
        ->where('user_name=:user_name',[':user_name'=>$user])
        ->orwhere('tel=:tel',[':tel'=>$user])
        ->from($table)
        ->select('user_id,user_name,user_pwd,tel')
        ->one();
        if($post)
        {
            return $post;
        }
        return null;
    }

    // //多条件搜索
    // public function get($where)
    // {
    //     $sql="select * from user where $where";
       
    //     return \yii::$app->db->createCommand($sql)->queryAll();
    // }

    // //获取用户的详细信息以及基础信息 （user表与detail_user表联查）
    // public function getdetail($where)
    // {
    //     $sql="select * from user join detail_user on user.user_id=detail_user.user_id where $where";
    //     return \yii::$app->db->createCommand($sql)->queryOne();
    // }
    // //获取用户生活状况的信息
    // public function getlife($id)
    // {
    //     $sql = "select * from life_user where user_id='$id'";
    //     return \yii::$app->db->createCommand($sql)->queryOne();
    // }

    // //获取兴趣爱好表的信息
    // public function gethobby($id)
    // {
    //     $sql="select * from hobby_user where user_id='$id'";
    //    return \yii::$app->db->createCommand($sql)->queryOne(); 
    // }

    // //获取择偶条件信息
    // public function getmate($where)
    // {
    //     $sql="select * from user join mate_user on user.user_id=mate_user.user_id where $where";
    //     return \yii::$app->db->createCommand($sql)->queryOne(); 
    // }

    // //根据登录的用户id 判断性别 获取异性数据
    // public function getall($id)
    // {
    //     $sql = "select * from user where user_id=$id";
        
    //     $data = \yii::$app->db->createCommand($sql)->queryOne();
        
    //     if($data['sex']=='女士')
    //     {
    //         $where = "sex='男士'";
    //     }
    //     else
    //     {
    //         $where = "sex='女士'";
    //     }

    //     $sql1 = "select * from user where $where";
        
    //    return \yii::$app->db->createCommand($sql1)->queryAll();
    // }


    //雪//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
    //多条件搜索
	public function get($where)
    {
        $sql="select * from user where $where";
       
        return \yii::$app->db->createCommand($sql)->queryAll();
    }

    //获取用户的详细信息以及基础信息 （user表与detail_user表联查）
    public function getdetail($where)
    {
        $sql="select * from user join detail_user on user.user_id=detail_user.user_id where $where";
        return \yii::$app->db->createCommand($sql)->queryOne();
    }
    //获取用户生活状况的信息
    public function getlife($id)
    {
        $sql = "select * from life_user where user_id='$id'";
        return \yii::$app->db->createCommand($sql)->queryOne();
    }

    //获取兴趣爱好表的信息
    public function gethobby($id)
    {
        $sql="select * from hobby_user where user_id='$id'";
       return \yii::$app->db->createCommand($sql)->queryOne(); 
    }

    //获取择偶条件信息
    public function getmate($where)
    {
        $sql="select * from user join mate_user on user.user_id=mate_user.user_id where $where";
        return \yii::$app->db->createCommand($sql)->queryOne(); 
    }

    //根据登录的用户id 判断性别 获取异性数据
    public function getall($id)
    {
        $sql = "select * from user where user_id=$id";
        
        $data = \yii::$app->db->createCommand($sql)->queryOne();
        
        if($data['sex']=='女士')
        {
            $where = "sex='男士'";
        }
        else
        {
            $where = "sex='女士'";
        }

        return $where;

       //  $sql1 = "select * from user where $where";
        
        
       // return \yii::$app->db->createCommand($sql1)->queryAll();
    }

    //获取猜你喜欢
    public function getlike($where)
    {
        $sql = "select * from user where $where limit 0,3";
        return \yii::$app->db->createCommand($sql)->queryAll();
    }
    //获取猜你喜欢一共的数据
    public function getcount($where)
    {
        $sql = "select * from user where $where";
        return \yii::$app->db->createCommand($sql)->queryAll();
    }

    //猜你喜欢 限制条数搜索
    public function page($where,$offset,$pageSize)
    {
        $sql = "select * from user where $where limit $offset,$pageSize";
        return \yii::$app->db->createCommand($sql)->queryAll();
    }


}
