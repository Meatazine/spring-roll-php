<?php
/**
 * Created by PhpStorm.
 * Date: 2015/1/23
 * Time: 23:44
 * @overview 
 * @author Meatill <lujia.zhai@dianjoy.com>
 * @since 
 */
use NoahBuscher\Macaw\Macaw;

Macaw::options(BASE . '/user/(:any)', 'BaseController@on_options');

Macaw::get(BASE . '/user/', 'UserController@get_info');

Macaw::put(BASE . '/user/(:any)', 'UserController@login');

Macaw::delete(BASE . '/user/(:any)', 'UserController@logout');