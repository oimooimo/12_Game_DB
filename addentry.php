<?php include ('topbit.php');

// Get Genre list for database
$genre_sql="SELECT * FROM `genre` ORDER BY `genre`.`Genre` ASC";
$genre_query=mysqli_query($dbconnect,$genre_sql);
$genre_rs=mysqli_fetch_assoc($genre_query);

// Initialise form variables

$app_name = "" ;
$subtitle = "";
$url = "";
$genreID = "";
$dev_name = "";
$age = "";
$rating = "";
$rate = "";
$rate_count = "";
$cost = "";
$inapp = 1;
$description = "";

$has_errors = "no";

?>
            <div class= "box main">
        
                <div class="add-entry">
                    <h2> aDD ENTRY </h2>
                <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

                <!--App Name (required) -->
                <div>
                 <input class="add-field" type="text" name="app_name" value="<?php echo $app_name; ?>"   placeholder="App Name (required)"/>
                </div>
                <!--SUBTITLE OPTIONAL -->
                <div>
                 <input class="add-field" type="text" name="subtitle" value="<?php echo $subtitle; ?>"  placeholder="subtitle (optional)"/>
                </div>
                <!--URL REQUIRED -->
                <div>
                 <input class="add-field <?php echo $url_field; ?>" type="text" name="URL" value="<?php echo $url; ?>"   placeholder="url  (required)"/>
                </div>
                <!--gENRE dROPDOWN (required) -->
                <select class="adv"  name="genre">
                    <option value="" disabled selected> Genre (Choose Something)...
                    </option>
                
                <!-- get options from database -->
                <?php

                    do{
                        ?>
                    <option value="<?php echo $genre_rs['GenreID']; ?>"><?php echo $genre_rs['Genre']; ?></option>
                    <?php
                    }   // end genre do loop
                    while ($genre_rs = mysqli_fetch_assoc($genre_query))
                ?>
                </select>
                <!--dEVELOPER nAME (required) -->
                 <input class="add-field <?php echo $dev_field; ?>" type="text" name="rating" value="<?php echo $dev_name; ?>" size="40"  placeholder="Developer Name (required)"/>
                <!--Age (set 0 if left lank) -->
                 <input class="add-field" type="number" name="rating" value="<?php echo $age; ?>" size="40"  placeholder=" age (0 for all)"/>
            
                <!--rating (number between 0 - 5, 1 dp) -->
                <div>
                 <input class="add-field" type="number" name="rating" value="<?php echo $rating; ?>" required step="0.1" min=0 max=5 placeholder="rating (0-5)"/>
                </div>

                <!--# of ratings (Integer more than 0) -->
                 <input class="add-field" type="text" name="count" value="<?php echo $rate_count; ?>"   placeholder="# of ratings)"/>

                <!--cost (Decimal 2dp, must be more than 0) -->
                 <input class="add-field" type="text" name="count" value="<?php echo $cost; ?>"   placeholder="cost  (number only)"/>
                 <br /><br />
                <!--In app pruchase radio (required) -->
                <div>
                    <b> In App Purchase: </b>
                    <!-- deaults to 'yes'-->
                    <!--NOTE: vlaue in database is boolean so no becomes 0 and yes becomes 1-->

                    <input type="radio" name="in_app" value="1" checked="checked:"/> yes
                    <input type="radio" name="in_app" value="0" /> no
                </div>
                
                <br />

                <!-- description text -->
                <textarea class="add-field <?php echo $description_field?>""
                 name="description" placeholder="description..." rows="6"> <?php echo $description; ?>
                 </textarea>
                <!--submit button-->
                <p>
                <input class="submit advanced-button" type="submit" name="advanced" value="search &nbsp; &#xf002;" />
                </p>
                </form>

                </div><!--/add-enitry-->
            </div><!--/main-->

<?php include 'bottombit.php' ?>        
