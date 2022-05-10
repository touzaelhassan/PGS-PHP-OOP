<?php

class Comment
{
  public $comment_id;
  public $photo_id;
  public $comment_author;
  public $comment_body;

  public function create_comment()
  {
    global $database;
    $sql = "INSERT INTO comments (photo_id, comment_author, comment_body) VALUES ($this->photo_id, '$this->comment_author', '$this->comment_body')";
    $query = $database->query($sql);

    if ($query) {
      $this->comment_id = $database->insert_id();
      return true;
    } else {
      return false;
    }
  }

  public static function get_comments()
  {
    global $database;
    $sql = "SELECT * FROM comments";
    $query = $database->query($sql);
    $comments =  mysqli_fetch_all($query, MYSQLI_ASSOC);

    $array_of_comment_objects = [];

    foreach ($comments as $comment) {
      $array_of_comment_objects[] = self::instantiation_comment($comment['comment_id'], $comment['photo_id'], $comment['comment_author'], $comment['comment_body']);
    }

    return $array_of_comment_objects;
  }

  public static function get_comments_photo_id($photo_id)
  {
    global $database;
    $sql = "SELECT * FROM comments WHERE photo_id = '$photo_id' ORDER BY photo_id ASC";
    $query = $database->query($sql);
    $comments =  mysqli_fetch_all($query, MYSQLI_ASSOC);

    $array_of_comment_objects = [];

    foreach ($comments as $comment) {
      $array_of_comment_objects[] = self::instantiation_comment($comment['comment_id'], $comment['photo_id'], $comment['comment_author'], $comment['comment_body']);
    }

    return $array_of_comment_objects;
  }

  public static function instantiation_comment($comment_id, $photo_id, $comment_author, $comment_body)
  {
    if (!empty($photo_id) && !empty($comment_author) && !empty($comment_body)) {
      $comment = new Comment();
      if (isset($comment_id)) {
        $comment->comment_id = $comment_id;
      }
      $comment->photo_id = $photo_id;
      $comment->comment_author = $comment_author;
      $comment->comment_body = $comment_body;
      return $comment;
    } else {
      return false;
    }
  }
}
