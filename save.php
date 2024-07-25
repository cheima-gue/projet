<?php
  include("connect.php");
  
    try {
        
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        
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
    } catch(PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
?>
