<?php
/**
 * Created by PhpStorm.
 * Date: 2015/1/24
 * Time: 0:04
 * @overview 
 * @author Meatill <lujia.zhai@dianjoy.com>
 * @since 
 */

class UserModel extends BaseModel {
  public function find($openid) {
    $param = array(':openid' => $openid);
    $pdo = $this->get_pdo();
    $sql = "SELECT `id`, `status`
            FROM `t_user`
            WHERE `openid`=:openid";
    $state = $pdo->prepare($sql);
    $state->execute($param);
    $info = $state->fetch(PDO::FETCH_ASSOC);
    if ($info) {
      return $info;
    }

    $sql = "INSERT INTO `t_user`
            (`openid`)
            VALUES (:openid)";
    $state = $pdo->prepare($sql);
    $state->execute($param);
    $id = $pdo->lastInsertId();
    return array(
      'status' => 0,
      'id' => $id,
    );
  }
}