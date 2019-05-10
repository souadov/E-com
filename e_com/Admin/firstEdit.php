<?php 
include 'db.php';
require 'session.php';
Session::start();
Session::set('id_item_edit',$_GET['id_item']);
if($_SERVER['REQUEST_METHOD'] == "POST"){ 

    /** Traitement Table Work */
        try{
            if(isset($_POST['name']) && isset($_POST['image']) && isset($_POST['desc_bre']) && isset($_POST['description']) && isset($_POST['prix'])){
                $id_item = Session::get('id_item_edit');
                $name = $db->quote($_POST['name']);
                $image = $_POST['image'];
                $description = $db->quote($_POST['description']);
                $desc_bre = $db->quote($_POST['desc_bre']);
                $prix = (int)$_POST['prix'];
                if(!empty($image)){
                    $query = "update items set name_item=$name,bref_des=$desc_bre,description=$description,image_item='$image',prix=$prix where id_item=$id_item";

                }else{
                    $query = "update items set name_item=$name,bref_des=$desc_bre,description=$description,prix=$prix where id_item=$id_item";

                }
                $msg=$query;
                $select = $db->query($query);
                if(!empty($select)){
                    header('Location:edit.php');                
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
$select = $db->query('SELECT id_item, name_item, bref_des, description, image_item, prix, eta FROM items where id_item = '.Session::get('id_item_edit'));
$items = $select->fetchAll();
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
    <link href="css/styles.css" rel="stylesheet">
    <style>
        #imageWorks {
            width: 60% !important;
        }
        .input {
            background-color: transparent;
            border: 0px solid;
            height: 20px;
            width: 160px;
            color: #CCC;
        }
        .tdImg{
            display :grid;
            grid-template-columns: auto auto ;
            align-items: center;
                }
 
    </style>
</head>

<body>

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

    <main class="main" style="margin-top:4rem;">
    <?php foreach($items as $item):?>

    <div class="container">
            <div class="row">
                <form method="POST" action="">
                <p><?php echo($msg);?></p>
                    <div class="form-group">
                        <label for="name">Nom du item</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="nameItem"
                            placeholder="Entrer nom du item" value="<?=$item['name_item']; ?>">
                        <small id="nameItem" class="form-text text-muted">We'll never share name of item with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="bref_des">Description court</label>
                        <input type="text" class="form-control" id="bref_des" name="desc_bre" value="<?=$item['bref_des']; ?>" aria-describedby="bref_desc"
                            placeholder="description court">
                        <small id="bref_desc" class="form-text text-muted">We'll never share description anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="description_">Description</label>
                        <textarea type="text" class="form-control" id="description_" name="description" aria-describedby="description_c"
                            placeholder="description court"><?=$item['description']; ?></textarea>
                        <small id="description_c" class="form-text text-muted">We'll never share description anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="prix_">Prix</label>
                        <input type="number" class="form-control" id="prix_"  name="prix"  value="<?=$item['prix']; ?>" aria-describedby="prix_c"
                            placeholder="prix court">
                        <small id="prix_c" class="form-text text-muted">We'll never share description anyone
                            else.</small>
                    </div>
                    <div class="form-group tdImg">
                        <img id="imageWorks" src="../images/<?=$item['image_item']; ?>" alt="">
                        <input class="input" type="file" name="image" value="C:\xampp\htdocs\e_com\images\<?=$item['image_item']; ?>">   
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>
            <?php endforeach;?>


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