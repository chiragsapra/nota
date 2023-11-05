<?php

/**
 * Class TableCreator
 *
 * This class is used to create and interact with a database table named 'tableCreator'.
 * It includes methods to create the table, fill it with random data, and retrieve data based on specific criteria.
 * Descendants of this class are not allowed.
 */
final class TableCreator {
    /**
     * Constructor
     *
     * The constructor initializes the database connection, creates the 'Test' table,
     * and fills it with random data.
     */
    public $conn;
    public function __construct() {
        // Define the database details and create the connection.
        $host = "database";
        $dbname = "lamp";
        $user = "lamp";
        $pass = "lamp";
        $conn = mysqli_connect($host, $user, $pass, $dbname);
        $this->conn = $conn;
        if (!$conn) {
            die('Could not connect: ' . mysqli_connect_error());
        }
        // Create the 'tableCreator' table.
        $this->create();

        // Fill the 'tableCreator' table with random data.
        $this->fill();
    }

    /**
     * Create the 'tableCreator' table with specified fields.
     *
     * This method is accessible only within the class and defines the table schema.
     */
    private function create() {
        // Database query to create the 'tableCreator' table with defined fields.
        $sql = "CREATE TABLE tableCreator (
            id INT AUTO_INCREMENT PRIMARY KEY,
            script_name VARCHAR(25),
            start_time DATETIME,
            end_time DATETIME,
            result ENUM('normal', 'illegal', 'failed', 'success')
        )";
        mysqli_query($this->conn, $sql);
    }

    /**
     * Fill the 'tableCreator' table with random data.
     *
     * This method is accessible only within the class and populates the table with random data.
     */
    private function fill() {
        // Database query to insert random data into the 'tableCreator' table.
        $insert = "INSERT INTO tableCreator (script_name, start_time, end_time, result)
        VALUES
            ('Script 1', '2023-11-05 10:00:00', '2023-11-05 13:00:00', 'normal'),
            ('Script 2', '2023-11-05 09:00:00', '2023-11-05 13:30:00', 'failed'),
            ('Script 3', '2023-11-05 11:00:00', '2023-11-05 13:30:00', 'success'),
            ('Script 4', '2023-11-05 07:00:00', '2023-11-05 13:30:00', 'illegal'),
            ('Script 5', '2023-11-05 05:00:00', '2023-11-05 13:30:00', 'normal'),
            ('Script 6', '2023-11-05 02:00:00', '2023-11-05 13:30:00', 'illegal'),
            ('Script 7', '2023-11-05 04:00:00', '2023-11-05 13:30:00', 'normal'),
            ('Script 8', '2023-11-05 06:00:00', '2023-11-05 13:30:00', 'failed'),
            ('Script 9', '2023-11-05 03:00:00', '2023-11-05 13:30:00', 'success'),
            ('Script 10', '2023-11-05 12:00:00', '2023-11-05 13:30:00', 'illegal'),
            ('Script 11', '2023-11-05 10:00:00', '2023-11-05 13:00:00', 'normal'),
            ('Script 12', '2023-11-05 09:00:00', '2023-11-05 13:30:00', 'failed'),
            ('Script 13', '2023-11-05 11:00:00', '2023-11-05 13:30:00', 'success'),
            ('Script 14', '2023-11-05 07:00:00', '2023-11-05 13:30:00', 'illegal'),
            ('Script 15', '2023-11-05 05:00:00', '2023-11-05 13:30:00', 'normal'),
            ('Script 16', '2023-11-05 02:00:00', '2023-11-05 13:30:00', 'illegal'),
            ('Script 17', '2023-11-05 04:00:00', '2023-11-05 13:30:00', 'normal'),
            ('Script 18', '2023-11-05 06:00:00', '2023-11-05 13:30:00', 'failed'),
            ('Script 19', '2023-11-05 03:00:00', '2023-11-05 13:30:00', 'success'),
            ('Script 20', '2023-11-05 12:00:00', '2023-11-05 13:30:00', 'illegal'),
            ('Script 21', '2023-11-05 10:00:00', '2023-11-05 13:00:00', 'normal'),
            ('Script 22', '2023-11-05 09:00:00', '2023-11-05 13:30:00', 'failed'),
            ('Script 23', '2023-11-05 11:00:00', '2023-11-05 13:30:00', 'success'),
            ('Script 24', '2023-11-05 07:00:00', '2023-11-05 13:30:00', 'illegal'),
            ('Script 25', '2023-11-05 05:00:00', '2023-11-05 13:30:00', 'normal'),
            ('Script 26', '2023-11-05 02:00:00', '2023-11-05 13:30:00', 'illegal'),
            ('Script 27', '2023-11-05 04:00:00', '2023-11-05 13:30:00', 'normal'),
            ('Script 28', '2023-11-05 06:00:00', '2023-11-05 13:30:00', 'failed'),
            ('Script 29', '2023-11-05 03:00:00', '2023-11-05 13:30:00', 'success'),
            ('Script 30', '2023-11-05 12:00:00', '2023-11-05 13:30:00', 'illegal'),
            ('Script 31', '2023-11-05 10:00:00', '2023-11-05 13:00:00', 'normal'),
            ('Script 32', '2023-11-05 09:00:00', '2023-11-05 13:30:00', 'failed'),
            ('Script 33', '2023-11-05 11:00:00', '2023-11-05 13:30:00', 'success'),
            ('Script 34', '2023-11-05 07:00:00', '2023-11-05 13:30:00', 'illegal'),
            ('Script 35', '2023-11-05 05:00:00', '2023-11-05 13:30:00', 'normal'),
            ('Script 36', '2023-11-05 02:00:00', '2023-11-05 13:30:00', 'illegal'),
            ('Script 37', '2023-11-05 04:00:00', '2023-11-05 13:30:00', 'normal'),
            ('Script 38', '2023-11-05 06:00:00', '2023-11-05 13:30:00', 'failed'),
            ('Script 39', '2023-11-05 03:00:00', '2023-11-05 13:30:00', 'success'),
            ('Script 40', '2023-11-05 12:00:00', '2023-11-05 13:30:00', 'illegal'),
            ('Script 41', '2023-11-05 10:00:00', '2023-11-05 13:00:00', 'normal'),
            ('Script 42', '2023-11-05 09:00:00', '2023-11-05 13:30:00', 'failed'),
            ('Script 43', '2023-11-05 11:00:00', '2023-11-05 13:30:00', 'success'),
            ('Script 44', '2023-11-05 07:00:00', '2023-11-05 13:30:00', 'illegal'),
            ('Script 45', '2023-11-05 05:00:00', '2023-11-05 13:30:00', 'normal'),
            ('Script 46', '2023-11-05 02:00:00', '2023-11-05 13:30:00', 'illegal'),
            ('Script 47', '2023-11-05 04:00:00', '2023-11-05 13:30:00', 'normal'),
            ('Script 48', '2023-11-05 06:00:00', '2023-11-05 13:30:00', 'failed'),
            ('Script 49', '2023-11-05 03:00:00', '2023-11-05 13:30:00', 'success'),
            ('Script 50', '2023-11-05 12:00:00', '2023-11-05 13:30:00', 'illegal')";

        mysqli_query($this->conn, $insert);
    }

    /**
     * Get data from the 'tableCreator' table based on the 'result' criteria.
     *
     * This method is accessible from outside the class to retrieve data based on the 'result' field.
     *
     * @return array An array of rows matching the 'result' criteria.
     */
    public function get() {
        // Database query to select data from the 'tableCreator' table where 'result' is 'normal' or 'success'.
        // Return the selected rows as an array.
        $data = "SELECT * FROM tableCreator WHERE result IN ('normal', 'success')";
        $result = mysqli_query($this->conn, $data);
        if ($result->num_rows > 0) {
            return $result->fetch_all();
        }
    }
}

// Creating the instance of the class TableCreator
$table = new TableCreator();
// Calling the get method to get the result data with required criteria.
print_r($table->get());
