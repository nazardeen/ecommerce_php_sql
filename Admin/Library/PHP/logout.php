<?php

session_start();//session Start
session_unset();//session unset
session_destroy();//session destroy

header('location: ../../pages/index.php');
exit();