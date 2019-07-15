<?php
    function curl_img($url,$cookies)  //读取验证码，返回二进制字节集图片
    {
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, 0);
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_COOKIE,$cookies);
        $return = curl_exec ( $ch );
        curl_close ( $ch );
        return $return;	
    }
    function  ocr($img)  //提交到服务器识别
    {
        $uri = "识别URL";  
        $data = $img;
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $uri );
        curl_setopt ( $ch, CURLOPT_POST, 1 );//post方式,提交二进制字节集图片
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
        $return = curl_exec ( $ch );
        curl_close ( $ch );
        return $return;
    }

    if(isset($_POST['url']))
    {
        $url=$_POST['url'];	
        }else{
        echo 'No  url !';	exit;
        }

        if(isset($_POST['cookies']))
        {
        $cookies=$_POST['cookies'];	
        }else{
        $cookies='';
    }

//$url="http://www.beian.miit.gov.cn/getVerifyCode?27";	

echo ocr(curl_img($url,$cookies)); //调用方式，以上是例子。

//demo只做学习参考，不做实际用途

?>