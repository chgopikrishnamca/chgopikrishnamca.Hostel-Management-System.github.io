
<?php include ("includes/connect.php") ?>
Select An Option
<?php
$selection=array('PHP','ASP');
echo '<select>
      <option value="0">Please Select Option</option>';

foreach($selection as $selection){
    $selected=($options == $selection)? "selected" : "";
    echo '<option '.$selected.' value="'.$selection.'">'.$selection.'</option>';
}

echo '</select>';