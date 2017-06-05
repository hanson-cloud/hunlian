    <?php  
    /** 
      * wechat php test 
      */  
      
    //define your token  
    define("TOKEN", "weixin");  
    $wechatObj = new wechatCallbackapiTest();//��11�е�class��ʵ����  
    $wechatObj->valid();//ʹ��-����������valid������������֤����ģʽ  
    //11--23�д���Ϊǩ�����ӿ���֤��  
    class wechatCallbackapiTest  
    {  
        public function valid()//��֤�ӿڵķ���  
        {  
            $echoStr = $_GET["echostr"];//��΢���û��˻�ȡһ������ַ��������echostr  
      
            //valid signature , option���ʵ�61�е�checkSignatureǩ����֤���������ǩ��һ�£��������echostr��������֤���ýӿڵĲ���  
            if($this->checkSignature()){  
                echo $echoStr;  
                exit;  
            }  
        }  
        //���е�responseMsg�ķ����������ǻظ�΢�ŵĹؼ����Ժ���½��޸Ĵ�������޸������  
        public function responseMsg()  
        {  
            //get post data, May be due to the different environments  
            $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];//���û��˷��ɵ����ݱ��浽����postStr�У�����΢�Ŷ˷��͵Ķ���xml��ʹ��postStr�޷���������ʹ��$GLOBALS["HTTP_RAW_POST_DATA"]��ȡ  
      
            //extract post data����û������ݲ�Ϊ�գ�ִ��30-55����56-58  
            if (!empty($postStr)){  
                      
                    $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);//��postStr�������н������������postObj��simplexml_load_string����������php��һ������XML�ĺ�����SimpleXMLElementΪ�¶�����࣬LIBXML_NOCDATA��ʾ��CDATA����Ϊ�ı��ڵ㣬CDATA��ǩ�е��ı�XML�����н���  
                    $fromUsername = $postObj->FromUserName;//��΢���û��˵��û����������FromUserName  
                    $toUsername = $postObj->ToUserName;//�����΢�Ź����˺�ID�������ToUserName  
                    $keyword = trim($postObj->Content);//���û�΢�ŷ������ı�����ȥ���ո�������keyword  
                    $time = time();//��ϵͳʱ�丳�����time  
                    //����XML��ʽ���ı��������textTpl��ע��XML��ʽΪ΢�����ݹ̶���ʽ������ĵ�  
                    $textTpl = "<xml>  
                                <ToUserName><![CDATA[%s]]></ToUserName>  
                                <FromUserName><![CDATA[%s]]></FromUserName>  
                                <CreateTime>%s</CreateTime>  
                                <MsgType><![CDATA[%s]]></MsgType>  
                                <Content><![CDATA[%s]]></Content>  
                                <FuncFlag>0</FuncFlag>  
                                </xml>";  
                                //39�У�%s��ʾҪת�����ַ����������ͣ�CDATA��ʾ��ת��  
                                //40��Ϊ΢����Դ��  
                                //41��Ϊϵͳʱ��  
                                //42��Ϊ�ظ�΢�ŵ���Ϣ����  
                                //43��Ϊ�ظ�΢�ŵ�����  
                                //44��Ϊ�Ƿ��Ǳ�΢��  
                                //XML��ʽ�ı���������            
                    if(!empty( $keyword ))//����û���΢�ŷ������ı����ݲ�Ϊ�գ�ִ��46--51����52--53  
                    {  
                        $msgType = "text";//�ظ��ı���Ϣ����Ϊtext�ͣ���������ΪmsgType  
                        $contentStr = "Welcome to wechat world!";//���ǽ����ı���������ݣ�������ΪcontentStr�������Ҫ���Ļظ���Ϣ���������  
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);//��XML��ʽ�еı����ֱ�ֵ��ע��sprintf����  
                        echo $resultStr;//����ظ���Ϣ��������΢��  
                    }else{  
                        echo "Input something...";//�����͵�΢�Ŷˣ�ֻ�ǲ���ʹ��  
                    }  
      
            }else {  
                echo "";//�ظ�Ϊ�գ������壬������  
                exit;  
            }  
        }  
        //ǩ����֤����    ��checkSignature��18�е��á��ٷ����ܡ�У�����̣���token��timestamp��nonce���������������ֵ�������Ȼ�������������ַ���ƴ�ӳ�һ���ַ�����ϲshal���ܣ������߻�ü��ܺ���ַ���������signature�Աȣ���ʾ��������Դ��΢�š�  
        private function checkSignature()  
        {  
            $signature = $_GET["signature"];//���û��˻�ȡǩ���������signature  
            $timestamp = $_GET["timestamp"];//���û��˻�ȡʱ����������timestamp  
            $nonce = $_GET["nonce"];    //���û��˻�ȡ������������nonce  
                      
            $token = TOKEN;//������token�������token  
            $tmpArr = array($token, $timestamp, $nonce);//�����������tmpArr  
            sort($tmpArr, SORT_STRING);//�½�����  
            $tmpStr = implode( $tmpArr );//�ֵ�����  
            $tmpStr = sha1( $tmpStr );//shal����  
            //tmpStr��signatureֵ��ͬ�������棬���򷵻ؼ�  
            if( $tmpStr == $signature ){  
                return true;  
            }else{  
                return false;  
            }  
        }  
    }  
      
    ?>  