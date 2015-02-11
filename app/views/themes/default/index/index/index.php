<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>帐号激活</title>
</head>
<body>
<div class="top">
    <div class="logo"><a href=""></a></div>
    <div class="p_title" style="">注册<?php echo ($type==1)?'评测人':'CP' ?>帐号</div>
    <div class="p_loin bluelink">我已注册，现在就<a id="oneyear">登录</a></div>
</div>
<div class="content">
    <div class="reg_01 yanzheng">
        <div class="yz_tt">
            <img  src="/images/front/success.png"/>
            <span>即可完成注册</span>
        </div>
        <div class="yz_tb">我们已经向您的邮箱<strong><?php echo $email; ?></strong>发送了一封激活邮件，请点击邮件中的链接完成注册！</div>
        <div class="yz_ts">
            <a href="" id="url_return" target="_blank">进入邮箱</a>
        </div>
        <div class="yz_ts"><span>请进入你的邮箱查收激活邮件</span></div>
        <div class="yz_td bluelink">
            <h3>没有收到确认邮件，怎么办？</h3>
            <ul>
                <li>看看是否在邮箱的回收站中、垃圾邮件中</li>
                <li>重新发送，<a href="javascript:void(0)" id="resetSend">点此重发一封</a></li>
                <li>请确认邮件地址是否正确，更换<a href="javascript:void(0)" id="edit_email">邮箱注册</a></li>
            </ul>
            <div class="reg_01" style="padding-left:50px;display: none">
                <p class="clearfix">
                    <label class="list_tt">输入新邮箱</label>
                    <input name="" type="text" class="ipt" id="editEmail" />
                    <span class="item">邮箱</span><span class="tip_01"><i></i><span id="errors"></span></span> </p>
                <p  class="clearfix">
                    <input name="" type="button"  class="sup" id="submit_edit" value="提交修改" />
                </p>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<div class="wulogin" id="wei" style="display: none">
    <form id="sigForm" action="/reg/checkLogin" method="post">
        <em class="close" id="close"></em>
        <p class="lo_title clearfix"><span>使用邮箱登录</span></p>
        <p class="tips clearfix" id="msg"><span></span></p>
        <p class="list clearfix">
            <input name="user[email]" type="text" class="ipt ipt_focus"/>
            <label class="email"></label>
        </p>
        <p class="list clearfix">
            <input name="user[password]" type="password" class="ipt ipt_focus"/>
            <label class="pass"></label>
      <span
          id="email_pass" class="item">密码</span> </p>
        <p class="list clearfix"> <span class="radio">
      <input type="radio" name="user[type]" checked value="1" id="RadioGroup1_0"/>
      <label for="RadioGroup1_0">评测人</label>
      </span> <span class="radio">
      <input type="radio" name="user[type]" value="2" id="RadioGroup1_1"/>
      <label for="RadioGroup1_1">CP</label>
      </span></p>
        <p class="clearfix">
            <input name="" type="button" class="sup cpz" id="btn_login" value="登录"/>
        </p>
        <p class="clearfix"> <span class="check">
      <input type="checkbox" name="user[jz]" value="1" id="remember"/>
      <label for="remember">记住密码</label>
      </span><span class="fgps bluelink"><a>忘记密码</a><a>立即注册</a></span></p>
    </form>
</div>
<div class="foot"> 粤ICP备14050523| ©2012-2014 Kapai.com </div>
</body>
</html>