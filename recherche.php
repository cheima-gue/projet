





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher</title>
    <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
    <nav >
        <div class="container-fluid">
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="CIN" aria-label="Search">
            <input class="form-control me-2" type="search" placeholder="Nom" aria-label="Search">
            
            <button class="btn btn-outline-success" type="submit">Rechercher</button>
          </form>
        </div>
      </nav>
      <?php
  include("connect.php");
  if(isset($_POST['nom'])) $nom=$_POST['nom'];
else  $nom='';
if(isset($_POST['cin'])) $cin=$_POST['cin'];
else  $cin='';
$val=0;

$select = "SELECT * FROM employe";
 $query = "SELECT COUNT(*) as nbre  FROM employe";
 if($nom!='')//Tous
					{		
					if($val==0) 
					{
			  $select=$select . "  where employe.Nom like '%$nom%' ";
				  $query=$query . " where employe.Nom like '%$nom%' ";
				  $val=1;
					}
					else
					{
						 $select=$select . "  and employe.Nom like '%$nom%' ";
				  $query=$query . " and employe.Nom like '%$nom%' ";
					}
									}
		 if($cin!='')//Tous
					{		
					if($val==0) 
					{
			  $select=$select . "  employe.numCIN like '%$cin%' ";
				  $query=$query . " employe.numCIN like '%$cin%' ";
				  $val=1;
					}
					else
					{
						 $select=$select . "  employe.numCIN like '%$cin%' ";
				  $query=$query . " employe.numCIN like '%$cin%' ";
					}
                    }
       $result = mysql_query($select) or die ('Erreur : '.mysql_error() );
$total = mysql_num_rows($result);
       echo "nombre des lignes".$total;  
        ?>  

</body>
</html>