<?php
/**
 * Created by PhpStorm.
 * User: meathill
 * Date: 14/11/17
 * Time: 下午1:35
 */

class UserController extends BaseController {
  protected $need_auth = false;

  public function get_info() {
    if ($_SESSION['id']) {
      $result = array(
        'code' => 0,
        'msg' => 'is login',
        'me' => $_SESSION['user'],
      );
      $this->output($result);
    }
    $this->exit_with_error(1, 'not login', 401);
  }

  public function login() {
    $post = $this->get_post_data();
    $url = 'https://graph.qq.com/user/get_user_info?access_token=' . $post['token'] . '&oauth_consumer_key=' . $post['client_id'] . '&openid=' . $post['openid'];
    try {
      $response = file_get_contents($url);
      $json = json_decode($response, true);

      // 记录用户
      $model = new UserModel();
      $info = $model->find($post['openid']);

      $_SESSION['id'] = $info['id'];
      $_SESSION['user'] = array_merge($json, $post);
      $this->output(array(
        'code' => 0,
        'msg' => 'login',
        'me' => $json,
      ));
    } catch (Exception $err) {
      $this->exit_with_error(10, '登录失败', 403);
    }
  }

  public function logout() {
    $_SESSION['id'] = $_SESSION['user'] = null;
    $this->output(array(
      'code' => 0,
      'msg' => 'logout',
    ));
  }
} 