<?php

class Photo
{
  public $photo_id;
  public $photo_title;
  public $photo_description;
  public $photo_file_name;
  public $photo_type;
  public $photo_size;

  public $photo_temp_path;
  public $upload_directory = "images";
  public $custom_errors = [];
  public $upload_errors = [
    UPLOAD_ERR_OK => "There is no error, the file uploaded with success",
    UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize directive",
    UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
    UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded",
    UPLOAD_ERR_NO_FILE => "No file was uploaded",
    UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder",
    UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk",
    UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk",
    UPLOAD_ERR_EXTENSION => " A PHP extension stopped the file upload",
  ];



  public function create_photo()
  {
    global $database;
    $sql = "INSERT INTO photos (photo_title, photo_description, photo_file_name, photo_type, photo_size) VALUES ('$this->photo_title', '$this->photo_description', '$this->photo_file_name', '$this->photo_type', '$this->photo_size')";
    $query = $database->query($sql);

    if ($query) {
      $this->photo_id = $database->insert_id();
      return true;
    } else {
      return false;
    }
  }

  public static function get_photos()
  {
    global $database;
    $sql = "SELECT * FROM photos";
    $query = $database->query($sql);
    $photos =  mysqli_fetch_all($query, MYSQLI_ASSOC);

    $array_of_photo_objects = [];

    foreach ($photos as $photo) {
      $array_of_photo_objects[] = self::instantiation($photo);
    }

    return $array_of_photo_objects;
  }

  public static function get_photo_by_id($photo_id)
  {
    global $database;
    $sql = "SELECT * FROM photos WHERE photo_id = $photo_id";
    $query = $database->query($sql);
    $user = mysqli_fetch_assoc($query);

    return self::instantiation($user);
  }

  public function update_photo()
  {
    global $database;
    $sql = "UPDATE photos SET photo_title = '$this->photo_title', photo_description = '$this->photo_description', photo_file_name = '$this->photo_file_name', photo_type = '$this->photo_type', photo_size = '$this->photo_size' WHERE photo_id = $this->photo_id ";
    $database->query($sql);

    if (mysqli_affected_rows($database->connection) == 1) {
      return true;
    } else {
      return false;
    }
  }

  public function delete_photo()
  {
    global $database;
    $sql = "DELETE FROM photos WHERE photo_id = $this->photo_id";
    $database->query($sql);

    if (mysqli_affected_rows($database->connection) == 1) {
      return true;
    } else {
      return false;
    }
  }

  public static function instantiation($db_photo)
  {
    $photo_object = new self;

    $photo_object->photo_id = $db_photo['photo_id'];
    $photo_object->photo_title = $db_photo['photo_title'];
    $photo_object->photo_description = $db_photo['photo_description'];
    $photo_object->photo_file_name = $db_photo['photo_file_name'];
    $photo_object->photo_type = $db_photo['photo_type'];
    $photo_object->photo_size = $db_photo['photo_size'];

    return $photo_object;
  }

  public function set_photo($file)
  {
    if (empty($file) || !$file || !is_array($file)) {
      $this->custom_errors[] = "There was no file uploaded here";
      return false;
    } elseif ($file["error"] != 0) {
      $this->custom_errors[] = $this->upload_errors[$file["error"]];
      return false;
    } else {
      $this->photo_file_name = $file["name"];
      $this->photo_type = $file["type"];
      $this->photo_size = $file["size"];
      $this->photo_temp_path = $file["tmp_name"];
    }
  }

  public function save_photo()
  {
    if ($this->photo_id) {
      $this->update_photo();
    } else {

      if (!empty($this->custom_errors)) {
        return false;
      }

      if (
        empty($this->photo_file_name) ||
        empty($this->photo_temp_path)
      ) {
        $this->custom_errors[] = "The file was not available";
        return false;
      }

      $target_path = "C:/xampp/htdocs/PGS-PHP-OOP/admin/$this->upload_directory/$this->photo_file_name";

      if (file_exists($target_path)) {
        $this->custom_errors[] = "The file $this->photo_file_name already exists";
        return false;
      }

      if (move_uploaded_file($this->photo_temp_path, $target_path)) {
        if ($this->create_photo()) {
          unset($this->photo_temp_path);
          return true;
        }
      } else {
        $this->custom_errors[] = "The file directory probably does not have permissions";
        return false;
      }
    }
  }
}
