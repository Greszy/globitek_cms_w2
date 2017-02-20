<?php

  // is_blank('abcd')
  function is_blank($value='') {
    return !isset($value) || trim($value) == '';
  }

  // has_length('abcd', ['min' => 3, 'max' => 5])
  function has_length($value, $options=array()) {
    $length = strlen($value);
    if(isset($options['max']) && ($length > $options['max'])) {
      return false;
    } elseif(isset($options['min']) && ($length < $options['min'])) {
      return false;
    } elseif(isset($options['exact']) && ($length != $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }

  // has_valid_email_format('test@test.com')
  function has_valid_email_format($value) {
    // Function can be improved later to check for
    // more than just '@'.
    return strpos($value, '@') !== false;
  }

 // username validation

 function check_username($field_name){
      
      return preg_match('/\A[A-Za-z0-9\_]+\Z/', $field_name);
       
  }
  
  // ID validation - My custom validation 
  
  function check_id($id) {

      return preg_match( "/^([1-9]{1})+[0-9]?$/", $id );
  }

  // phone validation - My custom validation

  function check_phone($field_name){
      
      return preg_match( "/^(\([0-9]{3}\) |[0-9]{3}-)[0-9]{3}-[0-9]{4}$/", $field_name );
  }


  // email validation

  function check_email($field_name){
      
      return preg_match('/\A[A-Za-z0-9\_\@\.]+\Z/', $field_name);
    
  }
  
  // code validation - My custom validation 

  function check_code($field_name){

    $us_state_codes = array(
  '',   
  'AL',
  'AK',
  'AS',
  'AZ',
  'AR',
  'CA',
  'CO',
  'CT',
  'DE',
  'DC',
  'FM',
  'FL',
  'GA',
  'GU',
  'HI',
  'ID',
  'IL',
  'IN',
  'IA',
  'KS',
  'KY',
  'LA',
  'ME',
  'MH',
  'MD',
  'MA',
  'MI',
  'MN',
  'MS',
  'MO',
  'MT',
  'NE',
  'NV',
  'NH',
  'NJ',
  'NM',
  'NY',
  'NC',
  'ND',
  'MP',
  'OH',
  'OK',
  'OR',
  'PW',
  'PA',
  'PR',
  'RI',
  'SC',
  'SD',
  'TN',
  'TX',
  'UT',
  'VT',
  'VI',
  'VA',
  'WA',
  'WV',
  'WI',
  'WY'


);
  return in_array($field_name, $us_state_codes);

  }
  
  //state validation - My custom validation

  function check_state($field_name){

      $us_state_names = array(
  '',      
  'ALABAMA',
  'ALASKA',
  'AMERICAN SAMOA',
  'ARIZONA',
  'ARKANSAS',
  'CALIFORNIA',
  'COLORADO',
  'CONNECTICUT',
  'DELAWARE',
  'DISTRICT OF COLUMBIA',
  'FEDERATED STATES OF MICRONESIA',
  'FLORIDA',
  'GEORGIA',
  'GUAM GU',
  'HAWAII',
  'IDAHO',
  'ILLINOIS',
  'INDIANA',
  'IOWA',
  'KANSAS',
  'KENTUCKY',
  'LOUISIANA',
  'MAINE',
  'MARSHALL ISLANDS',
  'MARYLAND',
  'MASSACHUSETTS',
  'MICHIGAN',
  'MINNESOTA',
  'MISSISSIPPI',
  'MISSOURI',
  'MONTANA',
  'NEBRASKA',
  'NEVADA',
  'NEW HAMPSHIRE',
  'NEW JERSEY',
  'NEW MEXICO',
  'NEW YORK',
  'NORTH CAROLINA',
  'NORTH DAKOTA',
  'NORTHERN MARIANA ISLANDS',
  'OHIO',
  'OKLAHOMA',
  'OREGON',
  'PALAU',
  'PENNSYLVANIA',
  'PUERTO RICO',
  'RHODE ISLAND',
  'SOUTH CAROLINA',
  'SOUTH DAKOTA',
  'TENNESSEE',
  'TEXAS',
  'UTAH',
  'VERMONT',
  'VIRGIN ISLANDS',
  'VIRGINIA',
  'WASHINGTON',
  'WEST VIRGINIA',
  'WISCONSIN',
  'WYOMING'


); 
   foreach ( $us_state_names as $state ) {
          if( strcmp($state, $field_name) == 0) { return false;}
     }
     
      return true;


  //return in_array($field_name, $us_state_names);

  }

  function hsanit($value) {

    return array_map('htmlspecialchars', $value);

  }

  function sqlsanit($value, $db){

    return mysqli_real_escape_string($db, $value);
  } 

?>
