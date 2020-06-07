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
$rate_count = "";
$cost = "";
$inapp = 1;
$description = "";

$has_errors == "no";

// Code below executes when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    //Get Values from form....
    $app_name = mysqli_real_escape_string($dbconnect, $_POST['app_name']);
    $subtitle = mysqli_real_escape_string($dbconnect, $_POST['subtitle']);
    $url = mysqli_real_escape_string($dbconnect, $_POST['url']);

    $genreID = mysqli_real_escape_string($dbconnect, $_POST['genreID']);

    // if GenreID, is not blank, get genre so that genre box does not lose its values if there are errors
    if ($genreID != ""){
        $genreitem_sql="SELECT * FROM `genre` WHERE `GenreID` = $genreID";
        $genreitem_query=mysqli_query($dbconnect,$genreitem_sql);
        $genreitem_rs=mysqli_fetch_assoc($genreitem_query);

        $genre = $genreitem_rs['Genre'];

    } // End genreID if

    $dev_name = mysqli_real_escape_string($dbconnect, $_POST['dev_name']);
    $age = mysqli_real_escape_string($dbconnect, $_POST['age']);
    $rating = mysqli_real_escape_string($dbconnect, $_POST['rating']);
    $rate = mysqli_real_escape_string($dbconnect, $_POST['rate']);
    $rate_cost = mysqli_real_escape_string($dbconnect, $_POST['rate_cost']);
    $cost = mysqli_real_escape_string($dbconnect, $_POST['cost']);
    $in_app = mysqli_real_escape_string($dbconnect, $_POST['in_app']);
    $description = mysqli_real_escape_string($dbconnect, $_POST['description']);


    //error checking will go here...
    if ($has_errors == "no") {

    // get developer ID if it exists
    $dev_sql ="SELECT * FROM `developer` WHERE `DevName` LIKE '$dev_name'";
    $dev_query=mysqli_query($dbconnect, $dev_sql);
    $dev_rs=mysqli_fetch_assoc($dev_query);
    $dev_cont=mysqli_num_rows($dev_query);

    // if developer is not already in developer table, add them and get the new developerID
    if ($dev_count > 0) {
        $developerID = $dev_rs['DeveloperID'];
    }

    else {
    $add_dev_sql = "INSERT INTO `developer` (`DeveloperID`, `DevName`) VALUES (NULL, '$dev_name');";
    $add_dev_query = mysqli_query($dbconnect,$add_dev_sql);

    //Get Developer Id
    $newdev_sql ="SELECT * FROM `developer` WHERE `DevName` LIKE '$dev_name'";
    $newdev_query =mysqli_query($dbconnect, $newdev_sql);
    $newdev_rs =mysqli_fetch_assoc($newdev_query);

    $developerID = $newdev_rs['DeveloperID'];

    }    // end adding developer to developer table

    // add entry to database

    } // end of 'no errors if

        echo "you pushed the button";

} // end of button submitted code

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
                <!-- first/ selected option-->

                <?php
                if($genreID=="") {
                    ?>
                    <option value="" selected>Genre (Choose Something).....
                    </option>
                <?php
                }

                else {
                    ?>
                    <option value="<?php echo $genreID; ?>"  selected> <?php echo $genre; ?>
                    </option>
                
                <?php
                }
                ?>
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

                    <?php
                    if($in_app==1){
                    // Default value yes if checked
                        ?>
                    <input type="radio" name="in_app" value="1" checked="checked"/> yes
                    <input type="radio" name="in_app" value="0" /> no 
                    <?php   
                    } // end 'yes in_app if

                    else{
                        ?>
                    <input type="radio" name="in_app" value="1" checked="checked"/> yes
                    <input type="radio" name="in_app" value="0" /> no
                    <?php
                    }  // end in_app else
                    ?>

                    
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
