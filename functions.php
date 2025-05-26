<?php
    session_start();
?>

<?php

    /** 
    *Will take credentials and at least confirm that the server connects.
    *@param string $query The SQL query to execute (can be left blank).
    *@param string $user The username for the database connection.
    *@param string $pass The password for the database connection.
    *@param string $servername The server name for the database connection.
    *@return true if it connects. error if it fails.
    */
    function ConfirmDB($query, $user, $pass, $servername) {
            $dsn = "mysql:host=$servername;charset=utf8mb4";

            $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  // enable exceptions
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,  // fetch as associative arrays
        ]);

        try {
             if ($query == "") {
                echo "MYSQL has connected. <br>";
                return true;
            }
            $stmt = $pdo->prepare($query);
            $stmt->execute();
           
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
           
            echo "ERROR NOT CONNECTED. <br>";
            return false;
        }
            

        }

    

    /**
     *  Will take credentials and a database name to request a query from that database.
     * 
     * @param $query The SQL query to execute.
     * @param string $user The username for the database connection.
     * @param string $pass The password for the database connection.
     * @param string $servername The server name for the database connection.
     * @return An array containing the result set if it works. Null if it fails.
     */
        function RequestDB($query, $user, $pass, $servername ) {
            $sessid = $_SESSION['UID'];
            $dbname = file_get_contents("ADB/ADB_$sessid.txt"); // Load database name from file
            $dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8mb4";

            $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  // enable exceptions
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,  // fetch as associative arrays
        ]);

        try {
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            echo "Error: \"" . $query . "\" is not a valid query. <br>";
            return null;
        }
            

        }

        

        /**
         * Encrypts data using a secret key and saves it to a file.
         *
         * @param  $encryptionKeyLocation Path to save the encryption key.
         * @param string $encrypedDataLocation Path to save the encrypted data.
         * @param string $data The data to encrypt.
         * @return bool True on success, false on failure.
         */
        function encrypt($encryptionKeyLocation, $encrypedDataLocation ,$data) {

           try {
            $key = sodium_crypto_secretbox_keygen(); // Generates a secure key
            file_put_contents($encryptionKeyLocation, $key); // Save key securely
            


            $key = file_get_contents($encryptionKeyLocation); // Load encryption key
            $nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES); // Generate a random nonce


            // Encrypt data
            $encrypted_data = sodium_crypto_secretbox($data, $nonce, $key);

            // Save encrypted data and nonce
            file_put_contents($encrypedDataLocation, $nonce . $encrypted_data);

            return true;
           } catch (\Throwable $th) {
            echo "Error:" . $th->getMessage();
            return false;
           }

        }

        /**
         * Decrypts data using a secret key and returns the decrypted data.
         *
         * @param string $encryptionKeyLocation Path to the encryption key.
         * @param string $encrypedDataLocation Path to the encrypted data.
         * @return string|bool The decrypted data on success, false on failure.
         */
        function decrypt($encryptionKeyLocation, $encrypedDataLocation) {

            try{
            $key = file_get_contents($encryptionKeyLocation); // Load encryption key
            $encrypted_data = file_get_contents($encrypedDataLocation); // Load encrypted data

            $nonce = substr($encrypted_data, 0, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES); // Extract nonce
            $ciphertext = substr($encrypted_data, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES); // Extract encrypted data


            // Decrypt credentials
            $decrypted_data = sodium_crypto_secretbox_open($ciphertext, $nonce, $key);

            if ($decrypted_data === false) {
                die("Decryption failed!");
            }

            return $decrypted_data;
        }
        catch (\Throwable $th) {
            echo "Error:" . $th->getMessage();
            return false;
           }
        }

        /**
         * Gets a PDO instance for database connection.
         * 
         * @param string $user The username for the database connection.
         * @param string $pass The password for the database connection.
         * @param string $servername The server name for the database connection.
         * @return PDO|null A PDO instance if successful, null if it fails.
         */
        function GetPDO($user, $pass, $servername ) {
            try {
                 $sessid = $_SESSION['UID'];
            $dbname = file_get_contents("ADB/ADB_$sessid.txt"); // Load database name from file
            $dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8mb4";

            $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  // enable exceptions
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,  // fetch as associative arrays
            ]);

            return $pdo;

        } 
        catch (Throwable $th) {
            echo "Plase check your credentials.";
            return null;
        }
            

        }


       

?>