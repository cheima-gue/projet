<?php
  include( "connect.php");
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $cin = $_POST['cin'];
    $email = $_POST['email'];

    
    $sql = "INSERT INTO employe (nom, prenom, cin, email) VALUES (:nom, :prenom, :cin, :email)";
    $stmt = $conn->prepare($sql);
  
    
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':cin', $cin);
    $stmt->bindParam(':email', $email);

    
    $stmt->execute();

    echo "Nouvel enregistrement créé avec succès";
}
 catch(PDOException $e) {
echo "Erreur: " . $e->getMessage();
}










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <body style="background-color: aliceblue;"> 
        <div id: ></div>
        
        <form>
          <div class="mb-3">
            <h3 style="color: black;" > <label for="exampleInputEmail1" class="form-label">Nom</label> </h3>
             <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
             
           </div>
           <div class="mb-3">
            <h3 style="color: black ;" > <label for="exampleInputEmail1" class="form-label">Prenom</label> </h3>
             <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
             
           </div>
           <div class="mb-3">
            <h3 style="color: black;" > <label for="exampleInputEmail1" class="form-label">CIN</label> </h3>
             <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
             
           </div>
            
            
          
            <div class="mb-3">
             <h3 style="color: black ;" > <label for="exampleInputEmail1" class="form-label">Email</label> </h3>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              
            </div>
             
            <br>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <br>
           <h3> <button type="submit" class="btn btn-primary"> <a href="formulaire.html">Annuler</button></a></h3>
            
            <h3> <button type="submit" class="btn btn-primary"> <a href="">Confirmer</button></a></h3>
           
          </form>
        
    </body>
    </html>
</body>
</html>