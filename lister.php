





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
      echo "tesssssssst";
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
			  $select=$select . "  where employe.nom like '%$nom%' ";
				  $query=$query . " where employe.nom like '%$nom%' ";
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
                   // $resultquery=mysql_query($mysqli,$query);

      // $result = mysql_query($select) or die ('Erreur : '.mysql_error() );
//$total = mysql_num_rows($result);
$stmt = $conn->query($select);
while ($row = $stmt->fetch()) {
    echo 'le nom est'.$row['nom']."<br />\n";
}
/*$total=1;
       echo "nombre des lignes".$total;  
       echo "nombre des lignes".$total;  
       echo "nombre des lignes".$total;  
       echo "<b>nombre des lignes</b>".$total;  
*/
<?php
if (!empty($employes)) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>nom</th><th>prenom</th><th>cin</th><th>email</th></tr>";
    foreach ($employes as $employe) {
        echo "<tr>";
        echo "<td>" . $employe['id'] . "</td>";
        echo "<td>" . $employe['nom'] . "</td>";
        echo "<td>" . $employe['prenom'] . "</td>";
        echo "<td>" . $employe['cin'] . "</td>";
        echo "<td>" . $employe['email'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Aucun résultat trouvé.";
}

        ?>  

</body>
</html>