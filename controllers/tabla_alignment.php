<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "superhero";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$result = $conn->query("CALL spu_resumen_alignment()");


if ($result->num_rows > 0) {
    echo "<table border='1' class='table table-hover'>
            <tr>
                <th>Alignmnet ID</th>
                <th>Total</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["Bando"] . "</td>
                <td>" . $row["Heroes"] . "</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}

$conn->close();
?>