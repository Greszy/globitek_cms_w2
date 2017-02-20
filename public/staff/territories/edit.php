<?php
require_once('../../../private/initialize.php');

if(!isset($_GET['id']) || !check_id($_GET['id'])) {
  redirect_to('index.php');
}

$id = (int) $_GET['id'];
$territories_result = find_territory_by_id($id);
// No loop, only one result
$territory = db_fetch_assoc($territories_result);
$territory = hsanit($territory);
$state_id = $territory['state_id'];

$errors = array();

if(is_post_request()) {

  // Confirm that values are present before accessing them.
  if(isset($_POST['name'])) { $territory['name'] = $_POST['name']; }
  if(isset($_POST['position'])) { $territory['position'] = $_POST['position']; }
   


  $result = update_territory($territory);
  if($result === true) {
    redirect_to('show.php?id=' . urlencode($territory['id']) );
  } else {
    $errors = $result;
  }
}
?>
<?php $page_title = 'Staff: Edit Territory ' . $territory['name']; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <!--<a href="#add_a_url">Back to State Details</a><br />-->
  <?php  
  echo "<a href=\"../states/show.php?id=" . urlencode($state_id) . "\" >Back to State Details</a>
  <br />"
  ?>
  <h1>Edit Territory: <?php echo $territory['name']; ?></h1>

  <!-- TODO add form -->

  <form action="edit.php?id=<?php echo $territory['id']; ?>" method="post">
    Territory name:<br />
    <input type="text" name="name" value="<?php echo $territory['name']; ?>" /><br />
    Position:<br />
    <input type="text" name="position" value="<?php echo $territory['position']; ?>" /><br />
    <br />
    <input type="submit" name="submit" value="Update"  />
  </form>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
