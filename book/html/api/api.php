<?php
$action   =$_GET['action'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookonline";

$db=mysql_connect($servername, $username, $password) or die('Could not connect');
mysql_select_db($dbname, $db) or die('');
$result = null;
switch ($action)
{
	case 'category':       
		$result = mysql_query("SELECT * from chude") or die('Could not query');
        break;
    case 'author':		
        $result = mysql_query("SELECT * from tacgia") or die('Could not query');
        break;
    case 'listsach':
       $result = mysql_query("SELECT * from sach") or die('Could not query');
        break;
    default:
}

if(mysql_num_rows($result)){
    echo '{"data":[';

    $first = true;
    while($row=mysql_fetch_assoc($result)){
        //  cast results to specific data types

        if($first) {
            $first = false;
        } else {
            echo ',';
        }
        echo json_encode($row);
    }
    echo ']}';
} else {
    echo '[]';
}


mysql_close($db);
?>