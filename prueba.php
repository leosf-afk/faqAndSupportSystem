<?php 

//connect db
include "config/config.php";

// get all faqs from latest to oldest

$stmt = $conn->prepare("SELECT *  FROM faqs WHERE categoria LIKE :search");
$search = '%General%';
$stmt->bindValue(':search', $search, PDO::PARAM_STR);
$stmt->execute();
$faqs = $stmt->fetchAll(PDO::FETCH_ASSOC);

// $rows = $conn->prepare("SELECT * * FROM faqs WHERE id LIKE ?")



?>


<!-- include bootstrap, font awesome and rich text library CSS -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css" />
<link rel="stylesheet" href="styles.css">

<!-- include JS -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>

<!-- gonche -->
<link rel="stylesheet" href="gonchestyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<!----show all faqs -->
<body>


    <div class="header">
        <img src="img\logoUtn.png" alt="">
        
        
        <nav class="navbar navbar-expand-lg">
            
            <div class="container-fluid">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.html">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Alumnos</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Tecnicaturas
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="carrera.html">Carreras</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Cursos
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </nav>
        
    </div>
    <div class="container">
        <!--********************************AGREGADO*****************************-->
        <div class="container" style=" float:right; ">
            <div class="row">
                <div class="col-md-12 accordion_one">
                        <div class="panel-group">
                        <h1 style="color: black;" >FAQS</h1>
                        <br>
                        <!-- search toolbar -->
                        <form action="faqsearch.php" method="POST" >
                        <input type="text" name="search" placeholder="Buscar una pregunta">
                        <input type="submit" value="buscar"></input>
                        </form>
                  
                    
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
        <!--********************************AGREGADO*****************************-->

    </div>
    <section class="footer">
        <footer>
        <img src="img\PieDePagina.png" alt="" style="width: 100%;">
        </div>
    </section>

</body>

