<?php include ('topbit.php');

    $find_sql="SELECT * FROM `game_details`
    JOIN genre ON (game_details.GenreID = genre.GenreID)
    JOIN developer ON (game_details.DeveloperID = developer.DeveloperID)

    
    ";
    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);
    $count = mysqli_num_rows($find_query);

?>


            <div class= "box main">
                <h2> All Results </h2>
                
                <?php 
                
                if($count < 1) {

                ?>

                <div class="error">
                    
                    Sorry! There are no results that match your search. Please use the search box in the side bar to try again.

                </div><!-- end error-->

                <?php
                } // end no results if

                else{
                    do
                    {

                        ?>

            <!-- results go here-->
            <div class="results">

            <!--heading and subtitle-->

            <div class="flex-container">
                <div>
                    <span class="sub_heading">
                        <a href="<?php echo $find_rs['URL']; ?>">
                            <?php echo $find_rs ['Name']; ?>
                        </a>
                    </span> 
                </div> <!-- /title-->

                <?php
                    if($find_rs['Subtitle'] !="")

                    {
                    ?>

                <div>

                    &nbsp; &nbsp; | &nbsp; &nbsp;

                    <?php echo $find_rs['Subtitle'] ?>

                </div> <!--/subtitle-->

                <?php
                    } 
                ?>   
    

            </div> <!-- flex container-->
            <!--/heading and subtile-->

            <!--ratings area-->

            <div class="flex-container">

                <!--Partial Stars original source: https://codepen.io/Bluetidepro/pen/GkpEa-->
                <div class="star-ratings-sprite">
                    <span style="width:52%" class="star-ratings-sprite-rating"></span>
                </div> <!--/star ratings div-->

                <div class="actual-rating">
                    <?php echo $find_rs['Rating'] ?>
                    (based on <?php echo $find_rs['RatingCount'] ?> votes )
                </div> <!--/ text ratings div-->

            </div>  <!--/text ratings div-->

            <!--price-->
                 <?php
                    if($find_rs['Price'] == 0)
                    
                    {
                ?>
                    <p> Free!
                    <?php   if($find_rs['InApp'] == 1)
                    {
                            ?>
                                (In App Purchase)
                    </p>
                            <?php
                    }  // end In app if
                 ?>

                 <?php
                }// end price if

                    else{
                    ?>   
                    <b>Price</b>:$<?php echo $find_rs['Price'] ?>
    
                 <?php
                    } 
                ?>

                
            </div><!--/results-->

            <br />

            <?php

                }// end results 'do'

                while
                    ($find_rs=mysqli_fetch_assoc($find_query));
            }// end here

            ?>

            </div><!--/main-->

<?php include 'bottombit.php' ?>        
