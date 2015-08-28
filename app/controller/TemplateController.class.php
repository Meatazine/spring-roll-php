<?php

/**
 * Created by PhpStorm.
 * User: meathill
 * Date: 15/8/29
 * Time: 上午12:18
 */
class TemplateController extends BaseController {
  public function get_list() {
    $this->output([
      'code' => 0,
      'msg' => 'fetched',
      'list' => [
        [
          'id' => 1,
          'thumbnail' => 'img/delta.png',
          'title' => 'Delta',
          'paged' => false
        ]
      ],
    ]);
  }
}