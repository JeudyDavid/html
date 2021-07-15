<?php
$serverName = "DESKTOP-V297EPH"; 


$connectionInfo = array( "Database"=>"Auberge");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

// // Insert Query
// echo('Inserting a new row into table' . PHP_EOL);
// $tsql = 'INSERT INTO TestSchema.Employees (Name, Location) VALUES (?,?);';
// $params = ['Jake', 'United States'];
// $getResults = sqlsrv_query($conn, $tsql, $params);
// $rowsAffected = sqlsrv_rows_affected($getResults);
// if ($getResults === false || $rowsAffected === false) {
//     format_errors(sqlsrv_errors());
//     die();
// }
// echo($rowsAffected . ' row(s) inserted: ' . PHP_EOL);

// sqlsrv_free_stmt($getResults);

// // Update Query

// $userToUpdate = 'Nikita';
// $tsql = 'UPDATE TestSchema.Employees SET Location = ? WHERE Name = ?';
// $params = ['Sweden', $userToUpdate];
// echo('Updating Location for user ' . $userToUpdate . PHP_EOL);

// $getResults = sqlsrv_query($conn, $tsql, $params);
// $rowsAffected = sqlsrv_rows_affected($getResults);
// if ($getResults === false || $rowsAffected === false) {
//     format_errors(sqlsrv_errors());
//     die();
// }
// echo($rowsAffected . ' row(s) updated: ' . PHP_EOL);
// sqlsrv_free_stmt($getResults);

// // Delete Query
// $userToDelete = 'Jared';
// $tsql = 'DELETE FROM TestSchema.Employees WHERE Name = ?';
// $params = [$userToDelete];
// $getResults = sqlsrv_query($conn, $tsql, $params);
// echo('Deleting user ' . $userToDelete . PHP_EOL);
// $rowsAffected = sqlsrv_rows_affected($getResults);
// if ($getResults === false || $rowsAffected === false) {
//     format_errors(sqlsrv_errors());
//     die();
// }
// echo($rowsAffected . ' row(s) deleted: ' . PHP_EOL);
// sqlsrv_free_stmt($getResults);

// Read Query
$tsql = 'SELECT TOP (1000) [idClient]
,[NomClient]
,[PrenomClient]
,[SexeClient]
FROM [Auberge].[dbo].[Client]';

$getResults = sqlsrv_query($conn, $tsql);
if ($getResults === false) {
    format_errors(sqlsrv_errors());
    die();
}
while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
    echo($row['idClient'] . ' ' . $row['NomClient'] . ' ' . $row['PrenomClient'] . ' ' . $row['SexeClient']  );
}
sqlsrv_free_stmt($getResults);

function format_errors($errors)
{
    /* Display errors. */
    echo 'Error information: ';

    foreach ($errors as $error) {
        echo 'SQLSTATE: ' . $error['SQLSTATE'] . '';
        echo 'Code: ' . $error['code'] . '';
        echo 'Message: ' . $error['message'] . '';
    }
}