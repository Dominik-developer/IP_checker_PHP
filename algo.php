<?php

// Function collecting IP address
function getIPaddress(){
    $ip_address = $_SERVER['REMOTE_ADDR'];

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $ip_address; // Return the IP address  
}

// Function checking IP address in DB
function IPchecker($ipToCheck = null) {
    if ($ipToCheck === null) {
        $respond = 'error'; // or 'block'
        return $respond;
    } else {

        try {
            // Using PDO to connect to DB
            $pdo = new PDO("mysql:host=localhost;dbname=user_ips", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // SQL query
            $sql = "SELECT is_blocked FROM ip_addresses WHERE ip_address = :ip";

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':ip', $ipToCheck, PDO::PARAM_STR);

            // Execute query
            $stmt->execute();

            // Results
            if ($stmt->rowCount() > 0) 
            {
                // Downloading results
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                
                // Checking if IP is blocked
                if ($result['is_blocked']) {
                    //echo "The IP address is blocked.";
                    $respond = 'block';
                    return $respond;
                } else {
                    //echo "The IP address is not blocked.";
                    $respond = 'pass';
                    return $respond;
                }
            } else {
                // IP doesnt exist, adding values to db
                $sqlInsert = "INSERT INTO ip_addresses (ip_address, is_blocked) VALUES (:ip, :is_blocked)";
                $stmtInsert = $pdo->prepare($sqlInsert);
                $isBlocked = 0; // By default, the new IP is not blocked
                $stmtInsert->bindParam(':ip', $ipToCheck, PDO::PARAM_STR);
                $stmtInsert->bindParam(':is_blocked', $isBlocked, PDO::PARAM_BOOL);

                if ($stmtInsert->execute()) {
                    //echo "The IP address was added to the database.";
                    $respond = 'pass';
                    return $respond;
                } else {
                    //echo "Failed to add the IP address.";
                    $respond = 'error';
                    return $respond;
                }
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        // Closing pdo connection
        $pdo = null;
    }
}
