<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-30 18:29:31
         compiled from "F:\PHP\yongda\yongda\Application\View\Home\User\userInfo.html" */ ?>
<?php /*%%SmartyHeaderCode:2954551807c0c2e9a5-11530475%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c3484ae2aeef79a6fee5fbe6db2befb0329b4d35' => 
    array (
      0 => 'F:\\PHP\\yongda\\yongda\\Application\\View\\Home\\User\\userInfo.html',
      1 => 1427711169,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2954551807c0c2e9a5-11530475',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_551807c0d20ce3_49656365',
  'variables' => 
  array (
    'years' => 0,
    'year' => 0,
    'months' => 0,
    'month' => 0,
    'days' => 0,
    'day' => 0,
    'sexes' => 0,
    'sex' => 0,
    'row' => 0,
    'grades' => 0,
    'grade' => 0,
    'hobby' => 0,
    'values' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551807c0d20ce3_49656365')) {function content_551807c0d20ce3_49656365($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'F:\\PHP\\yongda\\yongda\\Application\\libs\\plugins\\function.html_options.php';
if (!is_callable('smarty_function_html_radios')) include 'F:\\PHP\\yongda\\yongda\\Application\\libs\\plugins\\function.html_radios.php';
if (!is_callable('smarty_function_html_checkboxes')) include 'F:\\PHP\\yongda\\yongda\\Application\\libs\\plugins\\function.html_checkboxes.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="Generator" content="YONGDA v1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="Keywords" content="" />
        <meta name="Description" content="" />

        <title>用户中心_YONGDA商城 - Powered by YongDa</title>

        <link href="Public/Home/css/style.css" rel="stylesheet" type="text/css" />

    </head>
    <body>
        <div class="block clearfix" style="position: relative; height: 98px;">
            <a href="#" name="top"><img class="logo" alt="" src="Public/Home/images/logo.gif" /></a>
            <div id="topNav" class="clearfix">
                <div style="float: left;"> 
                    <font id="ECS_MEMBERZONE"><div id="append_parent"></div>

                        <font class="f4_b">finisher</font>, 欢迎您回来！
                        <a href="#">用户中心</a>
                        <a href="index.php?p=Home&c=User&a=exit">退出</a>

                    </font>
                </div>
                <div style="float: right;">
                    <a href="#">查看购物车</a>
                    |
                    <a href="#">选购中心</a>
                    |
                    <a href="#">标签云</a>
                    |
                    <a href="#">报价单</a>


                </div>
            </div>
            <div id="mainNav" class="clearfix">
                <a href="#" class="cur">首页<span></span></a>
                <a href="#">GSM手机<span></span></a>
                <a href="#">双模手机<span></span></a>
                <a href="#">手机配件<span></span></a>
                <a href="#">优惠活动<span></span></a>
                <a href="#">留言板<span></span></a>
            </div>
        </div>

        <div class="header_bg">

            <div style="float: left; font-size: 14px; color:white; padding-left: 15px;">
            </div>  
            <form id="searchForm" method="get" action="#" >

                <input name="keywords" id="keyword" type="text" />
                <input name="imageField" value=" " class="go" style="cursor: pointer; background: url('Public/Home/images/sousuo.gif') no-repeat scroll 0% 0% transparent; width: 39px; height: 20px; border: medium none; float: left; margin-right: 15px; vertical-align: middle;" type="submit" />

            </form>
        </div>

        <div class="blank5"></div>

        <div class="header_bg_b">
            <div class="f_l" style="padding-left: 10px;">
                <img src="Public/Home/images/biao6.gif" />
                北京市区，现在下单(截至次日00:30已出库)，<b>明天上午(9-14点)</b>送达 <b>免运费火热进行中！</b>
            </div>
            <div class="f_r" style="padding-right: 10px;">
                <img style="vertical-align: middle;" src="Public/Home/images/biao3.gif" />

                <span class="cart" id="ECS_CARTINFO">
                    <a href="#" title="查看购物车">您的购物车中有 1 件商品，总计金额 ￥2000.00元。</a></span>
                <a href="#"><img style="vertical-align: middle;" src="Public/Home/images/biao7.gif" /></a>
            </div>
        </div>

        <div class="block box">
            <div class="blank"></div>
            <div id="ur_here">
                当前位置: <a href="#">首页</a> <code>&gt;</code> 用户中心 
            </div>
        </div>

        <div class="blank"></div>
        <div class="blank"></div>

        <div class="block clearfix">
            <div class="AreaL">
                <div class="box">
                    <div class="box_1">
                        <div class="userCenterBox">
                            <div class="userMenu">
                                <a href="index.php?p=Home&c=User&a=index"><img src="Public/Home/images/u1.gif" /> 欢迎页</a>
                                <a href="index.php?p=Home&c=User&a=userInfo"><img src="Public/Home/images/u2.gif" /> 用户信息</a>
                                <a href="#"><img src="Public/Home/images/u3.gif" /> 我的订单</a>
                                <a href="index.php?p=Home&c=User&a=list" class="curs"><img src="Public/Home/images/u4.gif" /> 收货地址</a>
                                <a href="#"><img src="Public/Home/images/u5.gif" /> 我的收藏</a>
                                <a href="#"><img src="Public/Home/images/u6.gif" /> 我的留言</a>
                                <a href="#"><img src="Public/Home/images/u7.gif" /> 我的标签</a>
                                <a href="#"><img src="Public/Home/images/u8.gif" /> 缺货登记</a>
                                <a href="#"><img src="Public/Home/images/u9.gif" /> 我的红包</a>
                                <a href="#"><img src="Public/Home/images/u10.gif" /> 我的推荐</a>
                                <a href="#"><img src="Public/Home/images/u11.gif"> 我的评论</a>
                                <!--<a href="user.php?act=group_buy">我的团购</a>-->
                                <a href="#"><img src="Public/Home/images/u12.gif" /> 跟踪包裹</a>
                                <a href="#"><img src="Public/Home/images/u13.gif" /> 资金管理</a>
                                <a href="index.php?p=Home&c=User&a=exit" style="background: none repeat scroll 0% 0% transparent; text-align: right; margin-right: 10px;"><img src="Public/Home/images/bnt_sign.gif" /></a>
                            </div>      </div>
                    </div>
                </div>
            </div>

            <div class="AreaR">
                <div class="box">
                    <div class="box_1">
                        <div class="userCenterBox boxCenterList clearfix" style="">
                             <h5><span>个人资料</span></h5>
                            <div class="blank"></div>
                            <form name="formEdit" action="index.php?p=Home&c=User&a=updateUserInfo" method="post" onSubmit="return userEdit()">
                                <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                                    <tr>
                                        <td width="28%" align="right" bgcolor="#FFFFFF">出生日期： </td>
                                       <td width="28%" align="" bgcolor="#FFFFFF">
                                        <?php echo smarty_function_html_options(array('name'=>'year','options'=>$_smarty_tpl->tpl_vars['years']->value,'selected'=>$_smarty_tpl->tpl_vars['year']->value),$_smarty_tpl);?>

                                        <?php echo smarty_function_html_options(array('name'=>'month','options'=>$_smarty_tpl->tpl_vars['months']->value,'selected'=>$_smarty_tpl->tpl_vars['month']->value),$_smarty_tpl);?>

                                        <?php echo smarty_function_html_options(array('name'=>'day','options'=>$_smarty_tpl->tpl_vars['days']->value,'selected'=>$_smarty_tpl->tpl_vars['day']->value),$_smarty_tpl);?>

                                            
                                        </td>
                                    </tr>
                                    <tr>

                                    </tr>
                                    <tr>
                                        <td width="28%" align="right" bgcolor="#FFFFFF">性　别： </td>
                                        <td width="72%" align="left" bgcolor="#FFFFFF">
                                        <?php echo smarty_function_html_radios(array('name'=>'sex','options'=>$_smarty_tpl->tpl_vars['sexes']->value,'selected'=>$_smarty_tpl->tpl_vars['sex']->value),$_smarty_tpl);?>

    
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="28%" align="right" bgcolor="#FFFFFF">电子邮件地址： </td>
                                        <td width="72%" align="left" bgcolor="#FFFFFF">
                                            <input name="email" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
" size="25" class="inputBg" />
                                            <span style="color:#FF0000"> *</span></td>
                                    </tr>
                                    <tr>
                                        <td width="28%" align="right" bgcolor="#FFFFFF" id="extend_field2i">QQ：</td>
                                        <td width="72%" align="left" bgcolor="#FFFFFF">
                                            <input name="extend_field2" type="text" class="inputBg" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['qq'];?>
"/>
                                            <span style="color:#FF0000"> *</span>			</td>
                                    </tr>
                                    <tr>
                                        <td width="28%" align="right" bgcolor="#FFFFFF" id="extend_field3i">手机：</td>
                                        <td width="72%" align="left" bgcolor="#FFFFFF">
                                            <input name="extend_field3" type="text" class="inputBg" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['phone'];?>
"/><span style="color:#FF0000"> *</span>			</td>
                                    </tr>
                                     <tr>
                                        <td width="28%" align="right" bgcolor="#FFFFFF" id="extend_field4i">学历：</td>
                                        <td width="72%" align="left" bgcolor="#FFFFFF">
                                        <?php echo smarty_function_html_options(array('name'=>'grade','options'=>$_smarty_tpl->tpl_vars['grades']->value,'selected'=>$_smarty_tpl->tpl_vars['grade']->value),$_smarty_tpl);?>


                                            <span style="color:#FF0000"> *</span>			</td>
                                    </tr>
                                     <tr>
                                        <td width="28%" align="right" bgcolor="#FFFFFF" id="extend_field4i">爱好：</td>
                                        <td width="72%" align="left" bgcolor="#FFFFFF">
                                             <?php echo smarty_function_html_checkboxes(array('name'=>'hobby_id','options'=>$_smarty_tpl->tpl_vars['hobby']->value,'selected'=>$_smarty_tpl->tpl_vars['values']->value),$_smarty_tpl);?>

                                    </tr>
                                     <tr>
                                        <td width="28%" align="right" bgcolor="#FFFFFF" id="extend_field4i">简介：</td>
                                        <td width="72%" align="left" bgcolor="#FFFFFF">
                                            <textarea cols="50" rows="5" name="intro" id="User_user_introduce" ><?php echo $_smarty_tpl->tpl_vars['row']->value['intro'];?>
</textarea> *</span>			</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center" bgcolor="#FFFFFF"><input name="act" type="hidden" value="act_edit_profile" />
                                            <input name="submit" type="submit" value="确认修改" class="bnt_blue_1" style="border:none;" />
                                        </td>
                                    </tr>
                                    <tr>
                                    </tr>
                                </table>
                            </form>
                            <!---修改密码--->
                            <form name="formPassword" action="index.php?p=Home&c=User&a=updatePassword" method="post" onSubmit="return editPassword()" >
                                <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                                    <tr>
                                        <td width="28%" align="right" bgcolor="#FFFFFF">原密码：</td>
                                        <td width="76%" align="left" bgcolor="#FFFFFF">
                                            <input name="old_password" type="password" size="25"  class="inputBg" /></td>
                                    </tr>
                                    <tr>
                                        <td width="28%" align="right" bgcolor="#FFFFFF">新密码：</td>
                                        <td align="left" bgcolor="#FFFFFF">
                                            <input name="new_password" type="password" size="25"  class="inputBg" /></td>
                                    </tr>
                                    <tr>
                                        <td width="28%" align="right" bgcolor="#FFFFFF">确认密码：</td>
                                        <td align="left" bgcolor="#FFFFFF">
                                            <input name="confirm_password" type="password" size="25"  class="inputBg" /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center" bgcolor="#FFFFFF"><input name="act" type="hidden" value="act_edit_password" />
                                            <input name="submit" type="submit" class="bnt_blue_1" style="border:none;" value="确认修改" />
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="blank"></div>
        <div class="blank"></div>
        <div class="block">

            <a href="#" target="_blank" title="YONGDA商城"><img alt="YONGDA商城" src="Public/Home/images/di.jpg" /></a>

            <div class="blank"></div>
        </div>

        <div class="block">
            <div class="box">
                <div class="helpTitBg" style="clear: both;">
                    <dl>
                        <dt><a href="#" title="新手上路 ">新手上路 </a></dt>
                        <dd><a href="#" title="售后流程">售后流程</a></dd>
                        <dd><a href="#" title="购物流程">购物流程</a></dd>
                        <dd><a href="#" title="订购方式">订购方式</a></dd>
                    </dl>
                    <dl>
                        <dt><a href="#" title="手机常识 ">手机常识 </a></dt>
                        <dd><a href="#" title="如何分辨原装电池">如何分辨原装电池</a></dd>
                        <dd><a href="#" title="如何分辨水货手机 ">如何分辨水货手机</a></dd>
                        <dd><a href="#" title="如何享受全国联保">如何享受全国联保</a></dd>
                    </dl>
                    <dl>
                        <dt><a href="#" title="配送与支付 ">配送与支付 </a></dt>
                        <dd><a href="#" title="货到付款区域">货到付款区域</a></dd>
                        <dd><a href="#" title="配送支付智能查询 ">配送支付智能查询</a></dd>
                        <dd><a href="#" title="支付方式说明">支付方式说明</a></dd>
                    </dl>
                    <dl>
                        <dt><a href="#" title="会员中心">会员中心</a></dt>
                        <dd><a href="#" title="资金管理">资金管理</a></dd>
                        <dd><a href="#" title="我的收藏">我的收藏</a></dd>
                        <dd><a href="#" title="我的订单">我的订单</a></dd>
                    </dl>
                    <dl>
                        <dt><a href="#" title="服务保证 ">服务保证 </a></dt>
                        <dd><a href="#" title="退换货原则">退换货原则</a></dd>
                        <dd><a href="#" title="售后服务保证 ">售后服务保证</a></dd>
                        <dd><a href="#" title="产品质量保证 ">产品质量保证</a></dd>
                    </dl>
                    <dl>
                        <dt><a href="#" title="联系我们 ">联系我们 </a></dt>
                        <dd><a href="#" title="网站故障报告">网站故障报告</a></dd>
                        <dd><a href="#" title="选机咨询 ">选机咨询</a></dd>
                        <dd><a href="#" title="投诉与建议 ">投诉与建议</a></dd>
                    </dl>
                </div>
            </div>
        </div>

        <div class="blank"></div>

        <div id="bottomNav" class="box block">
            <div class="box_1">
                <div class="links clearfix"> 
                    <a href="#" target="_blank" title="YONGDA商城"><img src="Public/Home/images/logo.gif" alt="YONGDA商城" border="0" /></a>
                    [<a href="#" target="_blank" title="">yongda商城</a>]
                </div>
            </div>
        </div>

        <div class="blank"></div>

        <div id="bottomNav" class="box block">
            <div class="bNavList clearfix">
                <a href="#">免责条款</a>
                |
                <a href="#">隐私保护</a>
                |
                <a href="#">咨询热点</a>
                |
                <a href="#">联系我们</a>
                |
                <a href="#">公司简介</a>
                |
                <a href="#">批发方案</a>
                |
                <a href="#">配送方式</a>

            </div>
        </div>

        <div id="footer">
            <div class="text">
                © 2005-2012 YONGDA 版权所有，并保留所有权利。<br />
            </div>
        </div>
    </body>
</html><?php }} ?>
