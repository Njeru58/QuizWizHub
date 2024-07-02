<?php
// Database connection parameters
$servername = "127.0.0.1";
$username = "root";
$password = "@rayo7079";
$database = "online_cat";

// Include the FPDF library
require('fpdf.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from MySQL database
$sql = "SELECT * FROM your_table";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    // Fetch data from each row
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "No records found";
}

// Close MySQL connection
$conn->close();

// Generate PDF
$pdf = new FPDF();
$pdf->AddPage();

// Add data to PDF
$pdf->SetFont('Arial','B',12);
foreach($data as $row) {
    foreach($row as $column) {
        $pdf->Cell(40,10,$column,1);
    }
    $pdf->Ln();
}

// Output PDF as a download
$pdf->Output('data_report.pdf','D');
?>
