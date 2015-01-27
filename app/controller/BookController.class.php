<?php
/**
 * Created by PhpStorm.
 * Date: 2015/1/27
 * Time: 23:38
 * @overview 
 * @author Meatill <lujia.zhai@dianjoy.com>
 * @since 
 */

class BookController extends BaseController {
  public function fetch($id) {

  }

  public function fetch_all() {
    $model = $this->get_model();
    $page = (int)$_REQUEST['page'];
    $page_size = 10;
    $keyword = trim($_REQUEST['keyword']);

    $books = $model->get_books($page * $page_size, $page_size, $keyword);
    $this->output(array(
      'code' => 0,
      'msg' => 'fetched',
      'books' => $books,
    ));
  }

  public function create() {

  }

  public function update($id) {

  }

  public function delete($id) {

  }

  protected function get_model() {
    return new BookModel();
  }
}