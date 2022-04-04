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
  public $temp_path;
  public $upload_directory = "images";
  public $custom_errors = [];
  public $upload_errors_array = [
    UPLOAD_ERR_OK => "There is no error",
    UPLOAD_ERR_INI_SIZE => "The upload file exceeds the upload_max_filesize",
    UPLOAD_ERR_FORM_SIZE => "The upload file exceeds the MAX_FILE_SIZE",
    UPLOAD_ERR_PARTIAL => "The upload file was only partialy uploaded",
    UPLOAD_ERR_NO_FILE => "No file was uploaded",
    UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder",
    UPLOAD_ERR_CANT_WRITE => "Failed to write file to desk",
    UPLOAD_ERR_EXTENSION => "A PHP extention stopped the file upload",
  ];
}
