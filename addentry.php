<?php include 'topbit.php' 
<?php include ('topbit.php');

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
                 <input class="add-field" type="next" name="app_name" value="<?php echo $app_name; ?>"  placeholder="App Name (required)"/>
                </div>
                <!--gENRE dROPDOWN (required) -->

                <!--dEVELOPER nAME (required) -->

                <!--Age (set 0 if left lank) -->

                <!--rating (number between 0 - 5, 1 dp) -->
                <div>
                 <input class="add-field" type="number" name="rating" value="<?php echo $rating; ?>" required step="0.1" min=0 max=5 placeholder="rating (0-5)"/>
                </div>

                <!--# of ratings (Integer more than 0) -->

                <!--cost (Decimal 2dp, must be more than 0) -->

                <!--In app pruchase radio (required) -->

                <!-- description text -->

                <!--submit button-->
                <p>
                <input class="submit advanced-button" type="submit" name="advanced" value="search &nbsp; &#xf002;" />
                </p>
                </form>

                </div><!--/add-enitry-->
            </div><!--/main-->

<?php include 'bottombit.php' ?>        
