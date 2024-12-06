<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $area = filter_var(trim($_POST['area']), FILTER_SANITIZE_NUMBER_INT);
    $budget = filter_var(trim($_POST['budget']), FILTER_SANITIZE_NUMBER_INT);
    $description = htmlspecialchars(trim($_POST['description']));
    $installation = htmlspecialchars(trim($_POST['installation']));
    $newsletter = isset($_POST['newsletter']) ? "Igen" : "Nem";
    $service_type = htmlspecialchars(trim($_POST['service_type']));
    $color = htmlspecialchars(trim($_POST['color']));
    $date = htmlspecialchars(trim($_POST['date']));

    $errors = [];
    if (empty($name)) $errors[] = "Név mező nem lehet üres.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Kérjük, adjon meg egy érvényes email címet.";
    if (empty($area)) $errors[] = "Telepítés területe mező nem lehet üres.";
    if (empty($budget)) $errors[] = "Becsült költségvetés mező nem lehet üres.";
    if (empty($service_type)) $errors[] = "Szolgáltatás típusa mező nem lehet üres.";
    if (empty($color)) $errors[] = "Színválasztás mező nem lehet üres.";

    if (!empty($errors)) {
        echo "<h2>Hiba történt:</h2>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } else {

        echo "<h2>Árajánlatkérés sikeres!</h2>";
        echo "<p>Köszönjük, hogy érdeklődik szolgáltatásaink iránt. Az alábbi adatokat kaptuk:</p>";
        echo "<ul>";
        echo "<li><strong>Név:</strong> $name</li>";
        echo "<li><strong>Email:</strong> $email</li>";
        echo "<li><strong>Telepítés területe:</strong> $area m²</li>";
        echo "<li><strong>Becsült költségvetés:</strong> $budget Ft</li>";
        echo "<li><strong>Projekt leírása:</strong> $description</li>";
        echo "<li><strong>Telepítés típusa:</strong> $installation</li>";
        echo "<li><strong>Iratkozzon fel a hírlevelünkre:</strong> $newsletter</li>";
        echo "<li><strong>Szolgáltatás típusa:</strong> $service_type</li>";
        echo "<li><strong>Színválasztás:</strong> $color</li>";
        echo "<li><strong>Kivitelezés dátuma:</strong> $date</li>";
        echo "</ul>";
    }
} else {

    echo "<h2>Hiba: Az űrlapot nem küldték el.</h2>";
}
?>
