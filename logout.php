<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 02/08/2017
 * Time: 16:54
 */
session_start();
unset($_SESSION['errmsg']);
unset($_SESSION['name']);
unset($_SESSION['userNum']);
session_destroy();