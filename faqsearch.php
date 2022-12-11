<?php 

//connect db
include "config/config.php";

// $search = $_POST["search"];

// get all faqs from latest to oldest

$stmt = $conn->prepare("SELECT *  FROM faqs WHERE question LIKE :search");
$search = '%'.$_POST['search'].'%';
$stmt->bindValue(':search', $search, PDO::PARAM_STR);
$stmt->execute();
$faqs = $stmt->fetchAll(PDO::FETCH_ASSOC);





// $sql = "SELECT * FROM faqs ORDER BY id DESC";
// $statement = $conn->prepare($sql);
// $statement->execute();
// $faqs = $statement->fetchAll();

?>


<!-- include bootstrap, font awesome and rich text library CSS -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css" />
<link rel="stylesheet" href="styles.css">

<!-- include JS -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>





<!----show all faqs -->

<div class="container" style="margin-top: 200px; float:right; ">
    <div class="row">
        <div class="col-md-12 accordion_one">
            <div class="panel-group">
            <h5 style="color: black;" >no encontraste lo que buscas?<a href="ticketformvanilla.php"> generar ticket de soporte</a></h5> 
          
            
            <br>
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
			                        <?php echo $faq['answer'];?>
                                    <!--- radio buttom --->
                                    <hr>
                                    <h6>si necesita contactar con soporte o no le fue util la respuesta haga click en NO</h6>
                                    <form action="ticketform.php" method="POST">
                                        <input type="radio"  name="faq" value="si">Si
                                        <input type="radio"  name="faq" value="<?php echo $faq['question'];?>">No
                                        <input type="text" name="id" value="<?php echo $faq['id'];?>" hidden>
                                        <input class="form-btn" name="submit" type="submit" value="Enviar">

                                    </form>
			                    </div>
			                </div>
			            </div>

                    </div>
                    <?php endforeach; ?>

            </div>

        </div>

    </div>
    
</div>

