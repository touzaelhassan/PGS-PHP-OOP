<?php

class Comment
{
  public $comment_id;
  public $photo_id;
  public $comment_author;
  public $comment_body;

  public static function instantiation_comment($photo_id, $comment_author, $comment_body)
  {
    if (!empty($photo_id) && !empty($comment_author) && !empty($comment_body)) {
      $comment = new Comment();
      $comment->photo_id = $photo_id;
      $comment->comment_author = $comment_author;
      $comment->comment_body = $comment_body;
      return $comment;
    } else {
      return false;
    }
  }

  public static function get_comments($photo_id)
  {
    global $database;
    $sql = "SELECT * FROM comments WHERE photo_id = '$photo_id' ORDER BY photo_id ASC";
    $sql = "SELECT * FROM users";
    $query = $database->query($sql);
    $comments =  mysqli_fetch_all($query, MYSQLI_ASSOC);
  }
}
