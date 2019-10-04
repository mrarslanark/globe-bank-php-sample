<?php
  require_once('../../../private/initialize.php');
  require_login();
  $id = $_GET['id'] ?? 1;
  $page = find_page_by_id($id);
  $subject = find_subject_by_id($page['subject_id']);
?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
<div id="content">

  <a class="back-link"
    href="<?php echo url_for('/staff/subjects/show.php?id=' . h(u($subject['id']))); ?>">&laquo; Back to Subject List</a>

  <div class="pages show">
    <h1>
      Page: <?php echo h($page['menu_name']); ?>
    </h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/index.php?id=' . h(u($page['id'])) . "&preview=true"); ?>" target="_blank">Preview</a>
    </div>

    <div class="attributes">
      <dl>
        <dt>Subject</dt>
        <dd><?php echo h($subject['menu_name']); ?></dd>
      </dl>
      <dl>
        <dt>Menu Name</dt>
        <dd><?php echo h($page['menu_name']);?></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd><dd><?php echo h($page['position']);?></dd></dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd><?php echo $page['visible'] ? 'Yes' : 'No';?></dd>
      </dl>
      <dl>
        <dt>Content</dt>
        <dd><?php echo $page['content'] ?? 'To Be Added!';?></dd>
      </dl>
    </div>
  </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
