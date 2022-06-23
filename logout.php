<?php
@session_start();
unset($_SESSION['username']);
unset($_SESSION['level']);
echo '<meta http-equiv="refresh" content="0; url=./" />';
?>