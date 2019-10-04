<?php
    require_once('../../../private/initialize.php');
    require_login();
    if (!isset($_GET['id'])) {
        redirect_to(url_to('/staff/admins/index.php'));
    }

    $id = $_GET['id'] ?? 1;
    
    if (is_post_request()) {
        $result = delete_admin($id);
        $_SESSION['status_message'] = "Admin deleted successfully!";
        redirect_to(url_for('/staff/admins/index.php'));
    } else {
        $admin = find_admin_by_id($id);
    }
?>

<?php $page_title = "Delete Admin" ?>
<?php include(SHARED_PATH . "/staff_header.php"); ?>

<div id="content">
  <div class="operations">
    <a
      class="operation"
      href="<?php echo url_for('/staff/admins/index.php'); ?>"
      >&laquo; Back to List</a
    >
  </div>

  <div class="admin delete">
    <h1>Delete Admin</h1>

    <p>Are you sure you want to delete this admin??</p>
    <p class="item">
      <?php echo h($admin['first_name']) . " " . h($admin['last_name']) ?>
    </p>

    <form
      action="<?php echo url_for('/staff/admins/delete.php?id=' . h(u($admin['id']))); ?>"
      method="post"
    >
      <input type="submit" value="Delete Admin" />
    </form>
  </div>
</div>

<?php include(SHARED_PATH . "/staff_footer.php"); ?>
