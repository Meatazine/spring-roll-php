<?php
/**
 * Created by PhpStorm.
 * Date: 2015/1/24
 * Time: 0:03
 * @overview 
 * @author Meatill <lujia.zhai@dianjoy.com>
 * @since 
 */

class BaseModel {

  public function __construct() {

  }

  /**
   * @return PDO
   */
  protected function get_pdo() {
    return require dirname(__FILE__) . '/../connector/pdo.php';
  }
}