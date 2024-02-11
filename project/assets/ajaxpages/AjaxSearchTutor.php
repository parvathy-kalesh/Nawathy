<?php
include("../connection/connection.php");
?>



<div class="container mt-3" id="mySearch">
    <div class="row">
        <?php
        $n = 0;
        $i = 0;
        $selQry = "select * from tbl_tutor t inner join tbl_place p on p.place_id=t.place_id  inner join tbl_district d on d.district_id=p.district_id where true";
		if(($_GET["did"])!="")
		{
				$selQry.=" and d.district_id='".$_GET["did"]."'";
		}
		if(($_GET["pid"])!="")
		{
				$selQry.=" and t.place_id='".$_GET["pid"]."'";
		}
		//echo $selQry;
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