<?php
include("../Connection/Connection.php");
session_start();
$selqry="select * from tbl_booking where booking_status=0 and parent_id='".$_SESSION["pid"]."'";
$result=mysql_query($selqry);

	
	if($row=mysql_fetch_array($result))
	{
		$bid = $row["booking_id"];
		
		
		
		$selqry="select * from tbl_cart where  booking_id='".$bid."'and tutorsubject_id='".$_GET["id"]."'";
		$result=mysql_query($selqry);
		if($k=mysql_fetch_array($result))
		{
			 echo "Already Added to Cart";
			
		}
		else
		{
		
		 $insQry1="insert into tbl_cart(tutorsubject_id,booking_id)values('".$_GET["id"]."','".$bid."')";
         if(mysql_query($insQry1))
          { 
             echo "Added to Cart";
                        }
                        else
                        {
							
	                       echo"Failed";
                        }
		}
		
	}
	

else
{
	

$insQry=" insert into tbl_booking(parent_id,booking_date)values('".$_SESSION["pid"]."',curdate())";
			if(mysql_query($insQry))
			{
				$selqry1="select MAX(booking_id) as id from tbl_booking";
                $result=mysql_query($selqry1);
				if($row=mysql_fetch_array($result))
				{
					$bid=$row["id"];
					
					
					$selqry="select * from tbl_cart where  booking_id='".$bid."'and product_id='".$_GET["id"]."'";
		$result=mysql_query($selqry);
		if($ks=mysql_fetch_array($result))
		{
			 echo "Already Added to Cart";
			
		}
		else
		{
					
					
	                   $insQry1="insert into tbl_cart(tutorsubject_id,booking_id)values('".$_GET["id"]."','".$bid."')";
                        if(mysql_query($insQry1))
                        { 
                          echo "Added to Cart";
                        }
                        else
                        {
	                       echo"Failed";
                        }
					  
		}

                }
			}
}
?>