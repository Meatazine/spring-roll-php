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

Macaw::options(BASE . '/auth/(:any)', 'BaseController@on_options');

Macaw::get(BASE . '/auth/', 'UserController@get_info');

Macaw::put(BASE . '/auth/(:any)', 'UserController@login');

Macaw::delete(BASE . '/auth/(:any)', 'UserController@logout');