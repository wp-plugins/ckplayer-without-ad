<?php
/*
Plugin Name: ckplayer without ad
Plugin URI: http://www.imeoe.com/462.html
Description: 调用ck播放器实现优酷、爱奇艺、音悦台等视频源无广告播放。使用方法：编辑文章添加[ck1]视频地址[/ck1],如[ck1]http://v.youku.com/v_show/id_XNzIxODU2NTQw.html[/ck1]。如果解析失败请联系插件作者更新。
Version: 0.50
Author: BLACKCYY
Author URI: http://www.imeoe.com/
*/
/** 添加后台设置 **/
add_action( 'admin_menu', 'ckplayer_without_ad_menu' );
function ckplayer_without_ad_menu() {
	add_options_page( 'ckplayer without ad', 'ckplayer without ad', 'manage_options', 'my-unique-identifier', 'ckplayer_without_ad_options' );
}
function ckplayer_without_ad_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( '您没有操作权限！' ) );
	}
    $opt_name1 = 'ck_width';
    $opt_name2 = 'ck_height';
	$opt_name3 = 'ck_style';
    $hidden_field_name = 'mt_submit_hidden';
    $data_field_name1 = 'ck_width';
    $data_field_name2 = 'ck_height';
	$data_field_name3 = 'ck_style';

    $opt_val1 = get_option( $opt_name1 );
    $opt_val2 = get_option( $opt_name2 );
	$opt_val3 = get_option( $opt_name3 );
 
    if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
        $opt_val1 = $_POST[ $data_field_name1 ];
        $opt_val2 = $_POST[ $data_field_name2 ];
		$opt_val3 = $_POST[ $data_field_name3 ];

        update_option( $opt_name1, $opt_val1 );
        update_option( $opt_name2, $opt_val2 );
		update_option( $opt_name3, $opt_val3 );
?>
<div class="updated"><p><strong><?php _e('settings saved.', 'menu-test' ); ?></strong></p></div>
<?php
    }
    echo '<div class="wrap">';
    echo "<h2>ckplayer without ad插件播放器设置</h2>";
?>
<form action="https://shenghuo.alipay.com/send/payment/fill.htm" onsubmit=" document.charset='gbk'"method="post" target="_blank"> 
<input name="optEmail" type="hidden" value="1565935060@qq.com" /> 
<input name="payAmount" type="hidden" value="10" /> 
<input name="title" type="hidden" value="请你喝杯咖啡！" placeholder="付款说明" /> 
<input name="pay" type="image" value="给我付款" src="<?php echo plugins_url('payment.png',__FILE__);?>" /> </form>

<form name="form1" method="post" action="">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">

<p>播放器宽度：
<input type="text" name="ck_width" value="<?php echo get_option('ck_width');?>" size="20">
</p><hr />

<p>播放器高度：
<input type="text" name="ck_height" value="<?php echo get_option('ck_height');?>" size="20">
</p><hr />

<p>播放器风格：
<input type="text" name="ck_style" value="<?php echo get_option('ck_style');?>" size="20">
</p><hr />

<p>注意：使用该插件前请将该设置填写完毕并保存；
播放器风格只为用户更改播放器右上角logo，默认值为"3"，如需要自定义播放器logo请联系作者，每月2.1RMB。
</p><hr />

<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
</p>

</form>
</div>
<?php
}
//短代码
function ckplayer($atts, $content=null){
	extract(shortcode_atts(array("auto"=>'0'),$atts));	
	return '<embed src="http://1.blackcyy.sinaapp.com/ck'.get_option('ck_style').'/ckplayer.swf?a='.$content.'" allowFullScreen="true" quality="high" width="'.get_option('ck_width').'" height="'.get_option('ck_height').'" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash">';
}
add_shortcode('ck1','ckplayer');

//添加文本模式下快捷按钮
function ckwoa_add_quicktags() {
?>
<script type="text/javascript">
QTags.addButton( 'ck1', 'ck无广告视频', '[ck1][/ck1]','' ); 
</script>
<?php
}
add_action('admin_print_footer_scripts', 'ckwoa_add_quicktags' );
?>