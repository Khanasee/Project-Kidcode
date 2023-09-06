<?php
//เรียก connect db
require("inc/connect.php");
/* ชื่อตาราง */
 $sTable = "user";
// คอลัมแสดงข้อมูล
 $aColumns = array( 'name','sname','age','status','option');  
     
/* กำหนด primary key ให้กับคอลัมน์ */
$sIndexColumn = "id";
     
   

$draw = 1;
$sLimit = "";
//Join
	$Jion = "";
//Search
	if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
	{
		$sLimit = "LIMIT ".mysqli_real_escape_string($con1, $_GET['iDisplayStart'] ).", ".
			mysqli_real_escape_string($con1, $_GET['iDisplayLength'] );
	}
//Order by 
    $sOrder = "";
	if ( isset( $_GET['iSortCol_0'] ) )
	{
		$sOrder = "ORDER BY  ";
		for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
		{
			if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
			{
				$sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
				 	".mysqli_real_escape_string($con1, $_GET['sSortDir_'.$i] ) .", ";
			}
		}
		
		$sOrder = substr_replace( $sOrder, "", -2 );
		if ( $sOrder == "ORDER BY" )
		{
			$sOrder = "";
		}
	}
//เงื่อนไข	
 $sWhere = "";
	/* เวลาค้นหาในคอลัมน์  */
	for ( $i=0 ; $i<count($aColumns) ; $i++ )
	{
		if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
		{
			if ( $sWhere == "" )
			{
				$sWhere = "WHERE ";
			}
			else
			{
				$sWhere .= " AND ";
			}
			$sWhere .= $aColumns[$i]." LIKE '%".mysqli_real_escape_string($con1,$_GET['sSearch_'.$i])."%' ";
		}
	}
		
//รวมคำสั่ง คิวรี่
	  $sQuery = "
		SELECT * "."
		FROM  $sTable
		$Jion
		$sWhere
		$sOrder
		$sLimit";

	//echo $sQuery;

	$rResult = mysqli_query($con1 , $sQuery);
	
	/* จำนวนข้อมูลหลังจากค้นหา */
	$sQuery = "
		SELECT FOUND_ROWS()
	";
	$rResultFilterTotal = mysqli_query($con1 , $sQuery);
	$aResultFilterTotal = mysqli_fetch_array($rResultFilterTotal);
	$iFilteredTotal = $aResultFilterTotal[0];
	
	/*  จำนวนทั้งหมด */
	$sQuery = "
		SELECT COUNT(".$sIndexColumn.")
		FROM   $sTable
	";
	$rResultTotal = mysqli_query($con1 , $sQuery);
	$aResultTotal = mysqli_fetch_array($rResultTotal);
	$iTotal = $aResultTotal[0];
	
	
	/*
	 * ส่วนการแสดงผล
	 */
	$output = array(
		"draw" => $draw,
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"data" => array()
	);
	
	
	
	while ( $aRow = mysqli_fetch_array($rResult) )  //loop ออกมาแสดงข้อมูล 
	{
		$bt1="";
		$bt2="";
		$ck = "";
		$row = array();
		$other = mysqli_fetch_array(mysqli_query($con1,"SELECT * from `other` where `other_id` = '$aRow[id]' "));
		for ( $i=0 ; $i<=count($aColumns) ; $i++ )
        {
			if($aColumns[$i] == "status")
            {
            	if($aRow["sts_mr"]==1){
            		$other = mysqli_fetch_array(mysqli_query($con1,"SELECT * from `other` where `other_id` = '$aRow[id]' "));
            		if($other > 0){
            			$row[] = "<span class='badge badge-success'>Complete</span>";
            		}else{
            			//$row[] = "<span class='badge badge-warning'>In progress</span>";
            		}
            	}else{
            		$row[] = "";
            	}
            }else if($aColumns[$i] == "option"){
			  if($aRow["create_by"]==$Mem["user"]){ 
			  	$bt1 = "<a class='btn btn-app' style='margin:0px 2px;' href='edit.php?mr_id=$aRow[id]'><i class='fas fa-edit'></i>Edit</a>";
			  }
			  $row[] = "$bt1 $bt2";
			}else{
				$row[] = $aRow[$aColumns[$i]];
			}
        }
		$output['data'][] = $row;
	}
	
	echo json_encode( $output );
?>