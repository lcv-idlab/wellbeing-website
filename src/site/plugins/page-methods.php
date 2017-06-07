<?php 

class Anchors {
  private static $anchors = [];

  public static function get() {
    return self::$anchors;
  }

  public static function from($page) {
    return self::make($page->uid(), $page->title()->html()->value);
  }

  public static function make($uid, $text) {
    self::$anchors[$uid] = $text;
    return brick('a', null, ['name' => $uid, 'id' => $uid]);
  }
}

page::$methods['anchor'] = 'Anchors::from';