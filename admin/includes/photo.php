<?php

class Photo extends DB_Object
{
  protected static $db_table = "photos";
  protected static $db_table_fields = ['photo_id', 'photo_title', 'photo_description', 'photo_file_name', 'photo_type', 'photo_size'];
  public $photo_id;
  public $photo_title;
  public $photo_description;
  public $photo_file_name;
  public $photo_type;
  public $photo_size;
}
