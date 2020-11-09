<?php
include('asset.php');
// array
// Numeric, Associative, multidimentional
$arr_assoc = array(
			'id' => 1 ,
			'name' 	=> 'ahmad',
			'age'	=> '1989/5/24'
			 );

$arr_num   = array(1,'sd',3);

$std_arr = array(
  array(1,'ahmad',90),
  array(2,'Ali', 60),
  array(3,'Fatima', 90)
 );
for($col=0; $col < count($std_arr); $col++)
{
    for($row=0; $row < count($std_arr[$col]); $row++){
        echo $std_arr[$col][$row]."<br>";
    }
}
?>
<hr>
<table class="table">
  <tr>
  <th>ID</th>
  <th>Name</th>
  <th>Score</th>
</tr>
<tr>
  <td>1</td>
  <td>Ahmad</td>
  <td>90</td>
  </tr>
  <tr>
  <td>1</td>
  <td>Ahmad</td>
  <td>90</td>
  </tr>
  <tr>
  <td>1</td>
  <td>Ahmad</td>
  <td>90</td>
  </tr>
</table>