<?php
require("../settings/settings.php");
require("../settings/DAO.php");
$dar = new DAO();

$all_article = $dar->query("select * from article");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/font-awesome.css" />
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/ajaxForm.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light shadow-sm">
        <a class="navbar-brand" href="#">ADMIN</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Article <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="#">Action 1</a>
                        <a class="dropdown-item" href="#">Action 2</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-default my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <div class="container">
        <div class="row mt-4 shadow-sm p-4">
            <form id="addArticle" method="post" class="col" action="api/ajouterArticle.php">
                <div class="row mt-1">
                    <div class="col col-4">
                        <span>Type d'article</span>
                    </div>
                    <div class="col col-6">
                        <select name="type" id="" class="form-control">
                            <option value="PLACE TOURISTIQUE">PLACE TOURISTIQUE</option>
                            <option value="MONUMENTS HISTORIQUES">MONUMENTS HISTORIQUES</option>
                            <option value="HOTEL">HOTEL</option>
                            <option value="RESTAURANT">RESTAURANT</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col col-4">
                        <span>Titre</span>
                    </div>
                    <div class="col col-6">
                        <input type="text" name="titre" class="form-control">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col col-4">
                        <span>Contenu</span>
                    </div>
                    <div class="col col-6">
                        <textarea type="text" name="contenu" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col col-4">
                        <span>Historique</span>
                    </div>
                    <div class="col col-6">
                        <textarea type="text" name="historique" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col col-4">
                        <span>Cordonne X</span>
                    </div>
                    <div class="col col-6">
                        <input type="number" value="0" max="200" min="-200" name="cordx" class="form-control">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col col-4">
                        <span>Cordonne Y</span>
                    </div>
                    <div class="col col-6">
                        <input type="number" value="0" max="200" min="-200" name="cordy" class="form-control">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col col-4">
                        <span>Image</span>
                    </div>
                    <div class="col col-6">
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col col-4">
                    </div>
                    <div class="col col-6">
                        <button class="btn btn-success btn-block" type="submit"><i class="fa fa-save"></i>
                            Enregistrer</button>
                        <button class="btn btn-danger btn-block" type="reset">Annuler</button>
                    </div>
                </div>
            </form>
            <script>
                $(function(){
                    $("#addArticle").ajaxForm({
                        success:function(data)
                        {
                            alert(data)
                        }
                    })
                })
            </script>
        </div>
        <hr>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">#M</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Contenu</th>
                        <th scope="col">Date pub</th>
                        <th scope="col">Historique</th>
                        <th scope="col">Cordonnes X & Y</th>
                        <th scope="col">Image</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    if(true )
                    {
                        while($row = $all_article->fetch(PDO::FETCH_OBJ))
                        {
                            ?>
                            <tr>
                                <th scope="col"><?= $row->ID_ARTICLE ?></th>
                                <th scope="col"><?= $row->ID_MEMBRE ?></th>
                                <th scope="col"><?= $row->TITRE_ARTICLE ?></th>
                                <th scope="col"><?= substr($row->CONTENU_ARTICLE,0,255) ?> ...</th>
                                <th scope="col"><?= $row->DATE_PUB ?></th>
                                <th scope="col"><?= substr($row->HISTORIQUE,0,255) ?> ...</th>
                                <th scope="col"><?= $row->CORDGEOX ?> <?= $row->CORDGEOY ?></th>
                                <th scope="col"><img src="<?= $row->IMG_ARTICLE ?>" class="col" style="min-width:200px"></th>
                                <th scope="col">
                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                <br>
                                <button class="btn btn-warning mt-1"><i class="fa fa-pencil"></i></button>
                                
                                </th>
                            </tr>
                            <?php
                        }
                    }
                ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</body>

</html> 