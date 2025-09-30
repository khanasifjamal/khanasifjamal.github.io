<?php
// Open the SQLite3 database
$db = new SQLite3('stat/visits.db');

// Get the visitor's IP address
$ip = $_SERVER['REMOTE_ADDR'];

// Get the visitor's user agent
$user_agent = $_SERVER['HTTP_USER_AGENT'];

// Get the current date and time
$date_time = date('Y-m-d H:i:s');

// Fetch location details from ip-api.com
$location_info = file_get_contents("http://ip-api.com/csv/$ip?fields=country,regionName,city,lat,lon");
if ($location_info !== FALSE) {
    // Split the CSV data into individual elements
    list($country, $regionName, $city, $lat, $lon) = explode(",", $location_info);
} else {
    // In case the API request fails, set default values
    $country = $regionName = $city = "Unknown";
    $lat = $lon = 0.0;
}

// Prepare the SQL insert query
$stmt = $db->prepare('INSERT INTO visitors (ip, date_time, country, regionName, city, lat, lon, user_agent) 
                      VALUES (:ip, :date_time, :country, :regionName, :city, :lat, :lon, :user_agent)');
$stmt->bindValue(':ip', $ip, SQLITE3_TEXT);
$stmt->bindValue(':date_time', $date_time, SQLITE3_TEXT);
$stmt->bindValue(':country', $country, SQLITE3_TEXT);
$stmt->bindValue(':regionName', $regionName, SQLITE3_TEXT);
$stmt->bindValue(':city', $city, SQLITE3_TEXT);
$stmt->bindValue(':lat', $lat, SQLITE3_FLOAT);
$stmt->bindValue(':lon', $lon, SQLITE3_FLOAT);
$stmt->bindValue(':user_agent', $user_agent, SQLITE3_TEXT);

// Execute the query
$stmt->execute();

// Close the database connection
$db->close();

// Optionally, display a thank you message or redirect
// echo "Visitor logged!";
?>
