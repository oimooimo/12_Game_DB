                
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
                    <span style="width: <?php echo $find_rs['Rating'] /5 * 100 ?>%" class="star-ratings-sprite-rating"></span>
                </div> <!--/star ratings div-->

                <div class="actual-rating">
                    <?php echo $find_rs['Rating'] ?>
                    (based on <?php echo number_format($find_rs['RatingCount']) ?> ratings )
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
            <!-- price -->

            <p>
                <!--Developer, Genre and Age -->
                <b> Developer</b>;<?php echo $find_rs['DevName'] ?><br />
                <b> Genre</b>;<?php echo $find_rs['Genre'] ?><br />
                Suitbale for ages <b><?php echo $find_rs['Age'] ?></b> and up <br />
            </p>

            <p>
                <hr />
                 <?php echo $find_rs['Description'] ?>

            </p>

                
            </div><!--/results-->

            <br />

            <?php

                }// end results 'do'

                while
                    ($find_rs=mysqli_fetch_assoc($find_query));
                    
            }// end else

            ?>
