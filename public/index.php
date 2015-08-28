<?php
/**
 * Created by PhpStorm.
 * Date: 2015/1/23
 * Time: 23:31
 * @overview 
 * @author Meatill <lujia.zhai@dianjoy.com>
 * @since 
 */

require '../vendor/autoload.php';
require '../config/config.php';

use NoahBuscher\Macaw\Macaw;

session_start();

// routes
require '../router/routes.php';
require '../router/user.php';
require '../router/book.php';
require '../router/template.php';
Macaw::dispatch();