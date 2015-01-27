<?php
/**
 * Created by PhpStorm.
 * Date: 2015/1/27
 * Time: 23:45
 * @overview 
 * @author Meatill <lujia.zhai@dianjoy.com>
 * @since 
 */

use NoahBuscher\Macaw\Macaw;

Macaw::get(BASE . '/book/', 'BookController@fetch_all');

Macaw::get(BASE . '/book/(:any)', 'BookController@fetch');

Macaw::options(BASE . '/book/(:any)', 'BaseController@on_options');
Macaw::options(BASE . '/book/', 'BaseController@on_options');

Macaw::put(BASE . '/book/', 'BookController@create');
Macaw::delete(BASE . '/book/(:any)', 'BookController@delete');
Macaw::patch(BASE . '/book/(:any)', 'BookController@update');