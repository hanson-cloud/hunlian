<?php
namespace frontend\models;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
define("TOKEN", "weixin");
class Wechat
{
    // var $mToken='weixin';//如果修改验证token.那么修改这里
    // var $mWcObj;//微信解析后的对象
    // var $mAccessToken;//微信Token
    // //以下为基本的微信对象成员
    // var $mFromUserName;//发送消息者
    // var $mToUserName;//本号
    // var $mMsgType;//本消息类型
   
   
         /**
     * 微信demo自带的验证函数 ,进行了个性
     */
    public function valid()
    {
        $echoStr = isset($_GET["echostr"]) ? $_GET["echostr"] :false;
        if($echoStr and $this->checkSignature()){
            echo $echoStr;
            exit;
        }
    }
    /**
     * 获取token
     * 获取微信token . 请注意开启php的openssl
     * @access public
     * @param string $appid
     * @param string $appsecret
     * @return string token
     */
    public function getToken($appid,$appsecret){
        return json_decode(file_get_contents($url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx3b90f3e3a3f0c0e2&secret=7cb94f52dd18134d1d829215bc94ea12"))->access_token;   
    }
    // 获取用户信息
    public function getUserinfo($token,$openid){
        return json_decode(file_get_contents($url="https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$token."&openid=".$openid."&lang=zh_CN"));   
    }

    public function getTicket($token,$id){//https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=TOKEN
        $tempJson = '{
            "action_name": "QR_LIMIT_STR_SCENE", 
            "action_info": {
                "scene": {"scene_str": "'.$id.'"},
            }
        }';
        $url = "https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=" . $token;
        $tempArr = json_decode ( $this->JsonPost ( $url, $tempJson ), true );
        // var_dump($tempArr);exit;
        if (@array_key_exists ( 'ticket', $tempArr )) {
        return 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=' . $tempArr ['ticket'];
        } else {
            return 111;
        // $this->ErrorLogger ( 'qrcode create falied.' );
        // $this->AccessTokenGet ();
        // $this->QrcodeCreate ();
        }
        // return json_decode(file_get_contents($url="https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=".$token)); 
    }

    private function ErrorLogger($errMsg){
        $logger = fopen('./ErrorLog.txt', 'a+');
        fwrite($logger, date('Y-m-d H:i:s')." Error Info : ".$errMsg."\r\n");
    }

    private function JsonPost($url, $jsonData){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        if (curl_errno($curl)) {
            $this->ErrorLogger('curl falied. Error Info: '.curl_error($curl));
        }
        curl_close($curl);
        return $result;
    }

    public function responseMsg()
    {
        //get post data, May be due to the different environments
        // $postStr = file_get_contents("php://input");// $GLOBALS["HTTP_RAW_POST_DATA"];
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        //extract post data
        if (!empty($postStr)){
                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
                   the best way is to check the validity of xml by yourself */
                libxml_disable_entity_loader(true);
                $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
                $textTpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <Content><![CDATA[%s]]></Content>
                            <FuncFlag>0</FuncFlag>
                            </xml>";             
                if( $keyword == '登录网站')
                {
                    $msgType = "text";
                    $contentStr = "你好，亚珍思密达欢迎关注1！".$postObj->FromUserName;
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                    $cache = Yii::$app->cache;
                    $cache->set('openid', "$postObj->FromUserName",60);
                    echo $resultStr;
                    // Yii::$app->cache->set('openid', $postObj->FromUserName);
                }
                // else if(!empty( $keyword ) && $keyword == '登录网站')
                // {
                //     $msgType = "text";
                //     $contentStr = "你好，亚珍思密达欢迎关注111！".$postObj->FromUserName;
                //     $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                //     $cache = Yii::$app->cache;
                //     $cache->set('openid', "$postObj->FromUserName",60);
                //     echo $resultStr;
                // }
                else
                {
                    $msgType = "text";
                    $contentStr = "请回复'登录网站'进行登录或绑定！";
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                    // $cache = Yii::$app->cache;
                    // $cache->set('openid', "$postObj->FromUserName",60);
                    echo $resultStr;
                }

        }else {
            echo "";
            exit;
        }
    }

    private function checkSignature()
    {
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
                
        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );
        
        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }

    // /**
    //  *  解析微信的数据结构
    //  * @return SimpleXMLElement|boolean
    //  */
    // public function parsePostObj(){
    //     $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
    //     if (!empty($postStr))
    //     {
    //         libxml_disable_entity_loader(true);
    //         $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
    //         if($postObj){
    //             $this->mFromUserName=$postObj->FromUserName;
    //             $this->mToUserName=$postObj->ToUserName;
    //             return $this->mWcObj=$postObj;
    //         }
    //         else return false ;
    //     }
    // }
    // /**
    //  * 获取要回复的xml数据结构
    //  * @param unknown $Msg
    //  * @return string
    //  */
    // public function getResponseTxtMsg($msg)
    // {
        
    //         $textTpl = "<xml>
    //                                                     <ToUserName>$this->mFromUserName</ToUserName>
    //                                                     <FromUserName>$this->mToUserName</FromUserName>
    //                                                     <CreateTime>".time()."</CreateTime>
    //                                                     <MsgType>text</MsgType>
    //                                                     <Content>$msg</Content>
    //                                                     <FuncFlag>0</FuncFlag>
    //                                                     </xml>";
            
    //        return $textTpl;
    // }
        // /**
        //  * 自带校验计算功能
        //  * @return boolean
        //  */       
        // private function checkSignature()
        // {
        
        // $signature = $_GET["signature"];
        // $timestamp = $_GET["timestamp"];
        // $nonce = $_GET["nonce"];
                       
        //         $token = $this->mToken;
        //         $tmpArr = array($token, $timestamp, $nonce);
        // // use SORT_STRING rule
        //         sort($tmpArr, SORT_STRING);
        //         $tmpStr = implode( $tmpArr );
        //         $tmpStr = sha1( $tmpStr );
               
        //         if( $tmpStr == $signature ){
        //                 return true;
        //         }else{
        //                 return false;
        //         }
        // }
}

?>