<?php
//fetch.php;
if(isset($_POST["view"]))
{
$connect = mysqli_connect("localhost", "root", "", "biblio");
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE reserver SET not_status=1 WHERE not_status=0";
  mysqli_query($connect, $update_query);
 }
 $query = "SELECT * FROM reserver ORDER BY drs DESC LIMIT 5";
 $result = mysqli_query($connect, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
   <li>
    <a href="#">
     <strong> user email : </strong><small><br />'.$row["email"].'</small><br />
<strong><em> reservation date : </strong><br /> <small>'.$row["drs"].'</em></small>
    </a>
   </li>
   <li class="divider"></li>
   ';
  }
 }
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 }
 
 $query_1 = "SELECT * FROM reserver WHERE not_status=0";
 $result_1 = mysqli_query($connect, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>



