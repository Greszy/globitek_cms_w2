<?php require_once('../../../private/initialize.php'); ?>

<?php
if(!isset($_GET['id']) || !check_id($_GET['id'])) {
  redirect_to('index.php');
}

$id = (int) $_GET['id'];
$territory_result = find_territory_by_id($id);
// No loop, only one result
$territory = db_fetch_assoc($territory_result);

$state_name_result = find_state_by_id($territory['state_id']);

$state_name = db_fetch_assoc($state_name_result);
 
//Sanitizing for html
$territory = hsanit($territory);
$state_name = hsanit($state_name);  
$state_id = $territory['state_id'];


?>

<?php $page_title = 'Staff: Territory of ' . $territory['name']; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">


  <!--<a href="#add_a_url">Back to State Details</a>
  <br />-->

  <?php  
  echo "<a href=\"../states/show.php?id=" . urlencode($state_id) . "\" >Back to State Details</a>
  <br />"
  ?>

  <h1>Territory: <?php echo $territory['name']; ?></h1>

  <?php
    echo "<table id=\"territory\">";
    echo "<tr>";
    echo "<td>Name: </td>";
    echo "<td>" . $territory['name'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>State ID: </td>";
    echo "<td>" . $state_name['name'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Position: </td>";
    echo "<td>" . $territory['position'] . "</td>";
    echo "</tr>";
    echo "</table>";

    db_free_result($territory_result);
  ?>
  <!--<br />
  <a href="#add_a_url">Edit</a><br />-->

  <br />
    <a href="edit.php?id=<?php echo urlencode($territory['id']); ?>">Edit</a><br />
    

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
