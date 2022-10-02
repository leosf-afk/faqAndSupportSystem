<?php 

//connect db
include "config/config.php";

// get all faqs from latest to oldest
$sql = "SELECT * FROM faqs ORDER BY id DESC";
$statement = $conn->prepare($sql);
$statement->execute();
$faqs = $statement->fetchAll();

?>


<!-- include bootstrap, font awesome and rich text library CSS -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css" />

<!-- include JS -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>



<!----show all faqs -->

<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="row">
        <div class="col-md-12 accordion_one">
            <div class="panel-group">
                <?php foreach ($faqs as $faq): ?>
                    <div class="panel panel-default">
                        <!---button to show the question  --->

                        <div class="panel-heading">
			                <h4 class="panel-title">
			                	<a data-toggle="collapse" data-parent="#accordion_oneLeft" href="#faq-<?php echo $faq['id']; ?>" aria-expanded="false" class="collapsed">
			                		<?php echo $faq['question']; ?>
			                	</a>
			                </h4>
			            </div>

                        <!---answer --->
                        <div id="faq-<?php echo $faq['id']; ?>" class="panel-collapse collapse" aria-expanded="false" role="tablist" style="height: 0px;">
			                <div class="panel-body">
			                	<div class="text-accordion">
			                        <?php echo $faq['answer']; ?>
			                    </div>
			                </div>
			            </div>

                    </div>
                    <?php endforeach; ?>

            </div>

        </div>

    </div>
    
</div>

