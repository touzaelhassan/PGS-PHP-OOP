<?php

class User
{
  public $user_id;
  public $user_name;
  public $user_password;
  public $user_image;
  public $first_name;
  public $last_name;

  public $upload_directory = "images";
  public $user_image_temp_path;
  public $image_placeholder = "https://i.pravatar.cc/100";

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

  public function create_user()
  {
    global $database;
    $sql = "INSERT INTO users (user_name, user_password, user_image, first_name, last_name) VALUES ('$this->user_name', '$this->user_password', '$this->user_image', '$this->first_name', '$this->last_name') ";
    $query = $database->query($sql);

    if ($query) {
      $this->user_id = $database->insert_id();
      return true;
    } else {
      return false;
    }
  }

  public static function get_users()
  {
    global $database;
    $sql = "SELECT * FROM users";
    $query = $database->query($sql);
    $users =  mysqli_fetch_all($query, MYSQLI_ASSOC);

    $array_of_user_objects = [];

    foreach ($users as $user) {
      $array_of_user_objects[] = self::instantiation($user);
    }

    return $array_of_user_objects;
  }

  public static function get_user_by_id($user_id)
  {
    global $database;
    $sql = "SELECT * FROM users WHERE user_id = $user_id";
    $query = $database->query($sql);
    $user = mysqli_fetch_assoc($query);

    return self::instantiation($user);
  }

  public function update_user()
  {
    global $database;
    $sql = "UPDATE users SET user_name = '$this->user_name', user_password = '$this->user_password', first_name = '$this->first_name', last_name = '$this->last_name' WHERE user_id = $this->user_id ";
    $database->query($sql);

    if (mysqli_affected_rows($database->connection) == 1) {
      return true;
    } else {
      return false;
    }
  }

  public function delete_user()
  {
    global $database;
    $sql = "DELETE FROM users WHERE user_id = $this->user_id";
    $database->query($sql);

    if (mysqli_affected_rows($database->connection) == 1) {
      return true;
    } else {
      return false;
    }
  }

  public static function instantiation($db_user)
  {
    $user_object = new self;

    $user_object->user_id = $db_user['user_id'];
    $user_object->user_name = $db_user['user_name'];
    $user_object->user_image = $db_user['user_image'];
    $user_object->first_name = $db_user['first_name'];
    $user_object->last_name = $db_user['last_name'];

    return $user_object;
  }


  public function user_image_path()
  {
    if ($this->user_image) {
      return $this->upload_directory . "/" . $this->user_image;
    } else {
      return $this->image_placeholder;
    }
  }

  public function set_user_image($file)
  {
    if (empty($file) || !$file || !is_array($file)) {
      $this->custom_errors[] = "There was no file uploaded here";
      return false;
    } elseif ($file["error"] != 0) {
      $this->custom_errors[] = $this->upload_errors[$file["error"]];
      return false;
    } else {
      $this->user_image = $file["name"];
      $this->user_image_temp_path = $file["tmp_name"];
    }
  }

  public function save_user()
  {
    if ($this->user_id) {
      $this->update_user();
    } else {

      if (!empty($this->custom_errors)) {
        echo $this->custom_errors[0];
        return false;
      }

      if (
        empty($this->user_image) ||
        empty($this->user_image_temp_path)
      ) {
        $this->custom_errors[] = "The file was not available";
        echo $this->custom_errors[0];
        return false;
      }

      $target_path = "C:/xampp/htdocs/PGS-PHP-OOP/admin/" . $this->upload_directory . "/" . $this->user_image;

      if (file_exists($target_path)) {
        $this->custom_errors[] = "The file $this->user_image already exists";
        echo $this->custom_errors[0];
        return false;
      }

      if (move_uploaded_file($this->user_image_temp_path, $target_path)) {
        if ($this->create_user()) {
          unset($this->user_image_temp_path);
          return true;
        }
      } else {
        $this->custom_errors[] = "The file directory probably does not have permissions";
        echo $this->custom_errors[0];
        return false;
      }
    }
  }

  public static function verify_user($user_name, $user_password)
  {
    global $database;
    $sql = "SELECT * FROM users WHERE user_name = '$user_name' AND user_password = '$user_password'";
    $query = $database->query($sql);
    $user = mysqli_fetch_assoc($query);

    if ($user) {
      return self::instantiation($user);
    } else {
      return false;
    }
  }
}
