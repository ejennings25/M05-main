<?php
require_once ("bookmark_fns.php");
session_start ();
do_html_header ("changing password");
$old_passwd=$_post ["old_passwd"];
$new_passwd=$_post ["new_passwd"];
$new_passwd2=$_post ["new_passwd2"];
try {
check_valid_user ();
if (! filled_out ($_post)) {
throw new exception ("you have not filled the form out correctly-please go back and try again.", 1);
}
if ($new_passwd!=$new_passwd2) {
throw new exception ("the passwords you entered do not match-please go back and try again.", 1);
}
if ((strlen ($new_passwd)<6) || (strlen ($new_passwd)>16)) {
throw new exception ("your password must be between 6 and 16 characters-please go back and try again.", 1);
}
change_password ($_session ["valid_user"], $old_passwd, $new_passwd2);
echo "password changed.";
} catch (exception $e) {
echo $e->getmessage ();
}
display_user_menu ();
do_html_footer ();
?>