<?php include ('topbit.php');

    $find_sql="SELECT * FROM `game_details`";
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
                You have results!
            </div><!--/results-->

            <?php

                }// end results 'do'

                while
                    ($find_rs=mysqli_fetch_assoc($find_query));
            }// end here

            ?>

            </div><!--/main-->

<?php include 'bottombit.php' ?>        
