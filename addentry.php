<?php include 'topbit.php' 

// Initialise form variables

$app_name = "";
$subtitle = "";
$url = "";
$dev_name = "";
$age = "";
$rating = "";
$rate = "";
$rate_count = "";
$cost = "";
$description = "";

$has_errors = "no";

?>
            <div class= "box main">
        
                <div class="add-entry">
                    <h2> aDD ENTRY </h2>
                <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchar($_SERVER['PHP_SELF']); ?>">
                </div><!--/add-enitry-->
            </div><!--/main-->

            </div><!--/main-->

<?php include 'bottombit.php' ?>        
