<?php
include "db.php";


// if(isset($_REQUEST['get_social_detail']))
// {
$Json['aaData'] = array();
$sLimit = "";
    $columns=array(

    0=>'p_id',
    1=>'productName',
    2=>'color',
    3=>'Price');
   
    $sql = "Select * from product WHERE 1=1 ";
    if( !empty($_REQUEST['sSearch'])){// if there is a search parameter, $requestData['search']['value'] contains search parameter
    $sql.=" AND ( productName LIKE '".$_REQUEST['sSearch']."%' ";    
    $sql.=" OR color LIKE '".$_REQUEST['sSearch']."%' ";

     $sql.=" OR Price LIKE '".$_REQUEST['sSearch']."%' )";
    }
    if(isset( $_REQUEST['iSortCol_0'] )  && isset($_REQUEST['sSortDir_0']))    
    {
            $sql .= " Order by ".$columns[$_REQUEST['iSortCol_0']] ." ". $_REQUEST['sSortDir_0'];
    }
    if ( isset( $_REQUEST['iDisplayStart'] ) && $_REQUEST['iDisplayLength'] != '-1' )
    {
            $sql.= " LIMIT ".$_REQUEST['iDisplayStart'].", ".$_REQUEST['iDisplayLength'];
    }
    //echo $sql;
 	$query=mysqli_query($conn,$sql);
			$k =0;
            $seq=1;
            while($Row = mysqli_fetch_array($query))
            {
                $Json['aaData'][$k][]= $seq;
                $Json['aaData'][$k][]= $Row['p_id'];
				$Json['aaData'][$k][]= $Row['productName'];
				$Json['aaData'][$k][]= $Row['color'];
                $Json['aaData'][$k][]= $Row['Price'];
                
				$k++;
                $seq++;
            }
        $Json['iTotalDisplayRecords'] = 30;
 		//$Json['sEcho'] = $_REQUEST['sEcho'];
        echo json_encode($Json);
        exit;	
//}


?>
