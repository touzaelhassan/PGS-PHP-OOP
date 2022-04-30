<?php include './includes/head.php'; ?>

<?php if (!isset($_SESSION["user_id"])) header("location: login.php"); ?>

<?php $users = User::get_users(); ?>

<?php include './includes/header.php'; ?>

<div class="dashboard">
  <?php include './includes/sidebar.php'; ?>
  <div class="dashboard__container">
    <h4 class="dashboard__title users"><span>USERS</span> <a href="add_user.php" class="btn btn-success btn-sm">ADD USER</a></h4>
    <div class="dashboard__content">
      <table class="table table-bordered table__photos">
        <thead>
          <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Photo</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Update</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($users as $user) : ?>
            <tr>
              <td><?php echo $user->user_id; ?></td>
              <td><?php echo $user->user_name; ?></td>
              <td><img src="<?php echo $user->user_image_path(); ?>" class="user__image"></td>
              <td><?php echo $user->first_name; ?></td>
              <td><?php echo $user->last_name; ?></td>
              <td><a href="edit_user.php?user_id=<?php echo $user->user_id; ?>" class="btn btn-success btn-sm">UPDATE</a></td>
              <td><a href="delete_user.php?user_id=<?php echo $user->user_id; ?>" class="btn btn-danger btn-sm">DELETE</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include './includes/footer.php'; ?>

<?php include './includes/foot.php'; ?>