<?php 
include 'db.php';
require 'session.php';
Session::start();

if($_SERVER['REQUEST_METHOD'] == "POST"){ 

    /** Traitement Table Work */
        try{
            if(isset($_POST['name']) && isset($_POST['image']) && isset($_POST['desc_bre']) && isset($_POST['description']) && isset($_POST['prix'])){
                $name = $db->quote($_POST['name']);
                $image = $db->quote($_POST['image']);
                $description = $db->quote($_POST['description']);
                $desc_bre = $db->quote($_POST['desc_bre']);
                $prix = (int)$_POST['prix'];
                $query = "INSERT INTO items(name_item, bref_des, description, image_item, prix) VALUES ($name,$desc_bre,$description,$image,$prix)";
                $select = $db->query($query);
                if(!empty($select)){
                    header('Location:view.php');                
                } else {
                    $msg="Error Work";
                }
            }
        }catch(Exception $e){
            $msg ='Exception Work';
        }
        /***************** */

        
       
}else{
    $msg ='Erreur POST';
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Commerce</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/carousel/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="../css/styles.css" rel="stylesheet">
<style>
    .main {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-top: 7rem;
        }
</style>
</head>

<body class="p-0">

    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#">E-commerce Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(E-commerce)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ajouter Item</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li>
                </ul>
                <form class="form-inline mt-2 mt-md-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary my-2 my-sm-0 mr-3">Serche</button>
                    <a href="logout.php"> logout</a>
                </form>
            </div>

        </nav>


    </header>

    <main class="main">


        <div class="container">
            <div class="row">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="name">Nom du item</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="nameItem"
                            placeholder="Entrer nom du item">
                        <small id="nameItem" class="form-text text-muted">We'll never share name of item with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="bref_des">Description court</label>
                        <input type="text" class="form-control" id="bref_des" name="desc_bre" aria-describedby="bref_desc"
                            placeholder="description court">
                        <small id="bref_desc" class="form-text text-muted">We'll never share description anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="description_">Description</label>
                        <textarea type="text" class="form-control" id="description_" name="description" aria-describedby="description_c"
                            placeholder="description court"></textarea>
                        <small id="description_c" class="form-text text-muted">We'll never share description anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="prix_">Prix</label>
                        <input type="number" class="form-control" id="prix_"  name="prix" aria-describedby="prix_c"
                            placeholder="prix court">
                        <small id="prix_c" class="form-text text-muted">We'll never share description anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Example file input</label>
                        <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>

        <!-- FOOTER -->
        <footer class="container">
            <p class="float-right"><a href="#">Back to top</a></p>
        </footer>
    </main>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>