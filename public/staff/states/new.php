<?php
require_once('../../../private/initialize.php');
// Set default values for all variables the page needs.
$errors = array();
$state = array(
  'name' => '',
  'code' => ''
);

if(is_post_request()) {

  // Confirm that values are present before accessing them.
  if(isset($_POST['name'])) { $state['name'] = $_POST['name']; }
  if(isset($_POST['code'])) { $state['code'] = $_POST['code']; }
   

  $result = insert_state($state);
  if($result === true) {
    $new_id = db_insert_id($db);
    redirect_to('show.php?id=' . $new_id);
  } else {
    $errors = $result;
  }
}
?>
<?php $page_title = 'Staff: New State'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>



<div id="main-content">
  <a href="index.php">Back to States List</a><br />

  <h1>New State</h1>

  <!-- TODO add form -->
  <?php echo display_errors($errors); ?>

  <form action="new.php" method="post">
    State name:<br />
  <select name="name">
  <option value="<?php echo $state['name']; ?>"><?php echo $state['name']; ?></option>
  <option value="Alabama">Alabama</option>
  <option value="Alaska">Alaska</option>
  <option value="Arizona">Arizona</option>
  <option value="Arkansas">Arkansas</option>
  <option value="California">California</option>
  <option value="Colorado">Colorado</option>
  <option value="Connecticut">Connecticut</option>
  <option value="Delaware">Delaware</option>
  <option value="District Of Columbia">District Of Columbia</option>
  <option value="Florida">Florida</option>
  <option value="Georgia">Georgia</option>
  <option value="Hawaii">Hawaii</option>
  <option value="Idaho">Idaho</option>
  <option value="Illinois">Illinois</option>
  <option value="Indiana">Indiana</option>
  <option value="Iowa">Iowa</option>
  <option value="Kansas">Kansas</option>
  <option value="Kentucky">Kentucky</option>
  <option value="Louisiana">Louisiana</option>
  <option value="Maine">Maine</option>
  <option value="Maryland">Maryland</option>
  <option value="Massachusetts">Massachusetts</option>
  <option value="Michigan">Michigan</option>
  <option value="Minnesota">Minnesota</option>
  <option value="Mississippi">Mississippi</option>
  <option value="Missouri">Missouri</option>
  <option value="Montana">Montana</option>
  <option value="Nebraska">Nebraska</option>
  <option value="Nevada">Nevada</option>
  <option value="New Hampshire">New Hampshire</option>
  <option value="New Jersey">New Jersey</option>
  <option value="New Mexico">New Mexico</option>
  <option value="New York">New York</option>
  <option value="North Carolina">North Carolina</option>
  <option value="North Dakota">North Dakota</option>
  <option value="Ohio">Ohio</option>
  <option value="Oklahoma">Oklahoma</option>
  <option value="Oregon">Oregon</option>
  <option value="Pennsylvania">Pennsylvania</option>
  <option value="Rhode Island">Rhode Island</option>
  <option value="South Carolina">South Carolina</option>
  <option value="South Dakota">South Dakota</option>
  <option value="Tennessee">Tennessee</option>
  <option value="Texas">Texas</option>
  <option value="Utah">Utah</option>
  <option value="Vermont">Vermont</option>
  <option value="Virginia">Virginia</option>
  <option value="Washington">Washington</option>
  <option value="West Virginia">West Virginia</option>
  <option value="Wisconsin">Wisconsin</option>
  <option value="Wyoming">Wyoming</option>
</select>
  <br />
    <!--<input type="text" name="name" value="<?php echo $state['name']; ?>" /><br />-->
    Code:<br />
<select name="code">
  <option value="<?php echo $state['code']; ?>"><?php echo $state['code']; ?></option>
  <option value="TEST">TESTTEST</option>
  <option value="AL">AL-Alabama</option>
  <option value="AK">AK-Alaska</option>
  <option value="AZ">AZ-Arizona</option>
  <option value="AR">AR-Arkansas</option>
  <option value="CA">CA-California</option>
  <option value="CO">CO-Colorado</option>
  <option value="CT">CT-Connecticut</option>
  <option value="DE">DE-Delaware</option>
  <option value="DC">DC-District Of Columbia</option>
  <option value="FL">FL-Florida</option>
  <option value="GA">GA-Georgia</option>
  <option value="HI">HI-Hawaii</option>
  <option value="ID">ID-Idaho</option>
  <option value="IL">IL-Illinois</option>
  <option value="IN">IN-Indiana</option>
  <option value="IA">IA-Iowa</option>
  <option value="KS">KS-Kansas</option>
  <option value="KY">KY-Kentucky</option>
  <option value="LA">LA-Louisiana</option>
  <option value="ME">ME-Maine</option>
  <option value="MD">MD-Maryland</option>
  <option value="MA">MA-Massachusetts</option>
  <option value="MI">MI-Michigan</option>
  <option value="MN">MN-Minnesota</option>
  <option value="MS">MS-Mississippi</option>
  <option value="MO">MO-Missouri</option>
  <option value="MT">MT-Montana</option>
  <option value="NE">NE-Nebraska</option>
  <option value="NV">NV-Nevada</option>
  <option value="NH">NH-New Hampshire</option>
  <option value="NJ">NJ-New Jersey</option>
  <option value="NM">NM-New Mexico</option>
  <option value="NY">NY-New York</option>
  <option value="NC">NC-North Carolina</option>
  <option value="ND">ND-North Dakota</option>
  <option value="OH">OH-Ohio</option>
  <option value="OK">OK-Oklahoma</option>
  <option value="OR">OR-Oregon</option>
  <option value="PA">PA-Pennsylvania</option>
  <option value="RI">RI-Rhode Island</option>
  <option value="SC">SC-South Carolina</option>
  <option value="SD">SD-South Dakota</option>
  <option value="TN">TN-Tennessee</option>
  <option value="TX">TX-Texas</option>
  <option value="UT">UT-Utah</option>
  <option value="VT">VT-Vermont</option>
  <option value="VA">VA-Virginia</option>
  <option value="WA">WA-Washington</option>
  <option value="WV">WV-West Virginia</option>
  <option value="WI">WI-Wisconsin</option>
  <option value="WY">WY-Wyoming</option>
</select> <br />
    <!--<input type="text" name="code" value="<?php echo $state['code']; ?>" /><br />-->
    <br />
    <input type="submit" name="submit" value="Create"  />
  </form>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
