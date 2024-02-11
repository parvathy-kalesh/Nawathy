<?php
ob_start();
include("../assets/connection/connection.php");
include("Header.php");
?>



<br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</head>

<body>

<form method="post">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <table class="table table-bordered" cellpadding="10">
                    <tr>
                        <th class="text-center">District</th>
                        <td>
                            <select class="form-control" name="sel_district" id="sel_district" onchange="getPlace(this.value)">
                                <option value="">---select---</option>
                                <?php
                                $selQry = "select * from tbl_district";
                                $data = mysql_query($selQry);
                                while ($row = mysql_fetch_array($data)) {
                                    echo '<option value="' . $row["district_id"] . '">' . $row["district_name"] . '</option>';
                                }
                                ?>
                            </select>
                        </td>
                        <th class="text-center">Place</th>
                        <td>
                            <select class="form-control" name="sel_place" id="sel_place" onchange="getTutor(this.value)">
                                <option value="">---select---</option>
                                <?php
                                $selQry = "select * from tbl_place";
                                $data = mysql_query($selQry);
                                while ($row = mysql_fetch_array($data)) {
                                    echo '<option value="' . $row["place_id"] . '">' . $row["place_name"] . '</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</form>

<div class="container mt-3" id="mySearch">
    <div class="row">
        <?php
        $n = 0;
        $i = 0;
        $selQry = "select * from tbl_tutor";
        $data = mysql_query($selQry);
        while ($row = mysql_fetch_array($data)) {
            $i++;
            $n++;
            $average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

	$query = "
	SELECT * FROM tbl_review where tutor_id = '".$row["tutor_id"]."' ORDER BY review_id DESC
	";
        //echo $query;
	$results = mysql_query($query);

	while($row1 =mysql_fetch_array(($results)))
	{
		$review_content[] = array(
			'user_name'		=>	$row["parent_name"],
			'user_review'	=>	$row["user_review"],
			'rating'		=>	$row["user_rating"],
			'datetime'		=>	$row["review_datetime"]
		);

		if($row1["user_rating"] == '5')
		{
			$five_star_review++;
		}

		if($row1["user_rating"] == '4')
		{
			$four_star_review++;
		}

		if($row1["user_rating"] == '3')
		{
			$three_star_review++;
		}

		if($row1["user_rating"] == '2')
		{
			$two_star_review++;
		}

		if($row1["user_rating"] == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row1["user_rating"];

	}
    if($total_review>0)
    {
	$average_rating = $total_user_rating / $total_review;
    }
    else
    {
        $average_rating=0;
    }
            ?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="../assets/files/tutor/<?php echo $row["t_photo"]; ?>" class="card-img-top" alt="Tutor Photo">
                    <div class="card-body">
                    <p class="card-text">
                        <?php
                        for($i=1;$i<=5;$i++)
                        {
                            if($i<=$average_rating)
                            {
                                ?>
                                <i class="fas fa-star text-warning"></i>
                                <?php
                            }
                            else
                            {
                                ?>
                                
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <?php
                            }
                        } 
                        ?>
                    </p>
                        <h5 class="card-title">Tutor Name: <?php echo $row["tutor_name"]; ?></h5>
                        <p class="card-text">Contact: <?php echo $row["tutor_contact"]; ?></p>
                        <p class="card-text">Qualification: <?php echo $row["tutor_qualification"]; ?></p>
                        <a href="viewdetails.php?tid=<?php echo $row["tutor_id"]; ?>" class="btn btn-primary">View Details</a>
                        
                    </div>
                </div>
            </div>
            <?php
            if ($n == 3) {
                echo '</div><div class="row">';
                $n = 0;
            }
        }
        ?>
    </div>
</div>

  </div>
</body>
<script src="../assets/JQ/jQuery.js"></script>
<script>
function getPlace(did)
{
	$.ajax({
		url:"../assets/ajaxpages/ajaxplace.php?pid="+did,
		success: function(html){
			$("#sel_place").html(html);
            getTutor()
		}
	});
}
function getTutor()
{
    var did=document.getElementById("sel_district").value;
    var pid=document.getElementById("sel_place").value;
	$.ajax({
		url:"../assets/ajaxpages/AjaxSearchTutor.php?did="+did+"&pid="+pid,
		success: function(html){
			$("#mySearch").html(html);
		}
	});
}
</script>
</html>
<?php
ob_flush();
include("Footer.php");
?>