<?php
/**
 * Created by PhpStorm.
 * Date: 2015/1/27
 * Time: 23:54
 * @overview 
 * @author Meatill <lujia.zhai@dianjoy.com>
 * @since 
 */

class BookModel extends BaseModel {

  public function get_books( $start, $page_size, $keyword = '' ) {
    $pdo = $this->get_pdo();
    $me = $_SESSION['id'];
    $keyword = $keyword ? " AND `title` LIKE '%$keyword%'" : '';
    $sql = "SELECT `id`, `title`, `description`, `type`, `create_time`,
              `modified_time`, `publish_time`, `visit_time`
            FROM `t_book`
            WHERE `author`=:author $keyword
            LIMIT $start,$page_size";
    $state = $pdo->prepare($sql);
    $state->execute(array(':author' => $me));
    return $state->fetchAll(PDO::FETCH_ASSOC);
  }
}