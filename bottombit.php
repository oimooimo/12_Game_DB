 <div class="box slide">

                <h2>Add an App|
                    <a class="side" href="showall.php"> Show All</a></h2>

                <form class="searchform" method="post" action="name_dev.php" enctype="multipart/form-data">
                
                    <input class="search" type="text" name="dev_name" size="40" value="" required placeholder="App Nam / Developer Name..." />

                    <input class="submit" type="submit" name="find_game_name" value="&#xf002;"/>
 
                </form>

                 <form class="searchform" method="post" action="freeapp.php" enctype="multipart/form-data">
                    <input class="submit free" type="submit" name="FreeApp" value="Free with no In app purchases &nbsp; &#xf002;"/>
                </form>

                <br />
                <hr />
                <br />

                <div class="advanced-frame">

                <h2> Advanced Search</h2>

                <form class="searchform" method="post" action="advanced.php" encytype="multipart/form-data">

                <input class="adv" type="text" name="app_name" value="" placeholder="app Nam/Title..."/>

                <input class="adv" type="text" name="dev_name" value="" placeholder="developer"/>    

                <input class="adv" type="text" name="app_name" value="" placeholder="app Nam/Title..."/> 


                <!--Genre Dropdown -->
                <select class="search_adv" name="genre">
                
                <option value="" disabled selected> Genre..</option>

                
                <!-- get options from Database-->
                    <?php
                    $genre_sql="SELECT * FROM `genre` ORDER BY `genre`.`Genre` ASC";
                    $genre_query=mysqli_query($dbconnect, $genre_sql);
                    $genre_rs=mysqli_fetch_assoc($genre_query);

                    do {
                        ?>
                        <option value="<?php echo $genre_rs['Genre']; ?>"> <?php echo $genre_rs['Genre']; ?></option>

                    <?php
                    } // end genre do loop

                    while($genre_rs=mysqli_fetch_assoc($genre_query))

            
                     ?>

                </select>
                <input class="submit advanced-button" type="submit" name="advanced" value="search &nbsp; &#xf002;" />

                </form>

                </div> <!--/advancedframe-->

            </div> <!-- /sidebar-->

            <div class="box footer">
                CC GTT 20XX
                </div> <!--/boxfooter-->
        </div> <!--wrapper-->

</body>

</html>
