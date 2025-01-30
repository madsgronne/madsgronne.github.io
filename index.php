<?php
$host = "localhost"; // Din database server
$dbname = "valuta";  // Din database navn
$username = "root";  // Dit MySQL brugernavn
$password = "";      // Dit MySQL password

// Opret forbindelse til MySQL-databasen
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Fejl ved oprettelse af forbindelse: " . $e->getMessage();
    exit;
}

// Hent beløbet fra formularen
if (isset($_POST['beløb'])) {
    $beløb = $_POST['beløb'];

    // Forbered SQL-forespørgslen for at indsætte data i databasen
    $sql = "INSERT INTO transaktioner (beløb) VALUES (:beløb)";
    $stmt = $pdo->prepare($sql);

    // Bind parameter og udfør forespørgslen
    $stmt->execute(['beløb' => $beløb]);

    echo "Værdi indsat: " . $beløb;
} else {
    echo "Ingen værdi blev indtastet.";
}
?>
