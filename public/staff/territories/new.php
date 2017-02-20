<?php
require_once('../../../private/initialize.php');
// Set default values for all variables the page needs.
$errors = array();
$territory = array(
  'name' => '',
  'position' => ''
);



if(isset($_GET['id'])) {
  $state_id = $_GET['id'];
}


if(is_post_request()) {

  // Confirm that values are present before accessing them.
  if(isset($_POST['name'])) { $territory['name'] = $_POST['name']; }
  if(isset($_POST['position'])) { $territory['position'] = $_POST['position']; }
   

  $result = insert_territory($territory, $state_id);
  if($result === true) {
    $new_id = db_insert_id($db);
    redirect_to('show.php?id=' . $new_id);
  } else {
    $errors = $result;
  }
}
?>


<?php $page_title = 'Staff: New Territory'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <!--<a href="#add_a_url">Back to State Details</a><br />-->

  <?php  
  echo "<a href=\"../states/show.php?id=" . urlencode($state_id) . "\" >Back to State Details</a>
  <br />"
  ?>

  <h1>New Territory</h1>

  <!-- TODO add form -->
  <?php echo display_errors($errors); ?>
  <form action= "<?php echo 'new.php?id=' .$state_id;?>" method="post">
    Territory name:<br />
    <input type="text" name="name" value="<?php echo $territory['name']; ?>" /><br />
    Position:<br />
    <input type="text" name="position" value="<?php echo $territory['position']; ?>" /><br />
    <br />
    <input type="submit" name="submit" value="Create"  />
  </form>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
