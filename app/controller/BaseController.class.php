<?php
/**
 * Created by PhpStorm.
 * Date: 2015/1/23
 * Time: 23:38
 * @overview 
 * @author Meatill <lujia.zhai@dianjoy.com>
 * @since 
 */

class BaseController {
  static $HTTP_CODE = array(
    400 => 'Bad Request',
    401 => 'Unauthorized',
    403 => 'Forbidden',
    422 => 'Unprocessable Entity',
  );

  public function __construct() {

  }

  public function on_options() {
    header('Access-Control-Allow-Headers: accept, content-type');
    header('Access-Control-Allow-Methods: GET,PUT,POST,PATCH,DELETE');
    $this->output(array(
      'code' => 0,
      'method' => 'options',
      'msg' => 'ready',
    ));
  }

  protected function get_post_data() {
    $request = file_get_contents('php://input');
    return json_decode($request, true);
  }
  protected function exit_with_error($code, $msg, $http_code, $debug = '') {
    header('Content-type: application/JSON; charset=UTF-8');
    header("HTTP/1.1 $http_code " . self::$HTTP_CODE[$http_code]);
    $result = array(
      'code' => $code,
      'msg' => $msg,
      'debug' => $debug,
    );
    if ($http_code === 401) { // 登录失效或未登录
      $result['me'] = array();
    }
    exit(json_encode($result));
  }
  protected function output($result) {
    header('Content-type: application/JSON; charset=UTF-8');
    exit(json_encode($result));
  }

}