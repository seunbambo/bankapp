<?php

class User
{
    // DB stuff
    private $conn;
    private $table = 'users';

    // Post Properties
    public $account_id;
    public $lastname;
    public $firstname;
    public $phone;
    public $address;
    public $gender;
    public $balance;
    public $date_created;

    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //Get Posts
    public function read()
    {
        // Create query
        $query = 'SELECT account_id, firstname, lastname, phone, address, gender, balance, date_created 
            FROM ' . $this->table . '
            ORDER BY date_created DESC';

        // Prepared statement
        $stmt = $this->conn->prepare($query);

        //Execute query
        $stmt->execute();

        return $stmt;
    }

    // Create Post
    public function create()
    {
        // Create query
        $query = 'INSERT INTO ' . $this->table . '
            SET
                firstname = :firstname,
                lastname = :lastname,
                phone = :phone,
                address = :address,
                gender = :gender,
                balance = :balance';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->firstname = htmlspecialchars(strip_tags($this->firstname));
        $this->lastname = htmlspecialchars(strip_tags($this->lastname));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->address = htmlspecialchars(strip_tags($this->address));
        $this->gender = htmlspecialchars(strip_tags($this->gender));
        $this->balance = htmlspecialchars(strip_tags($this->balance));

        // Bind data
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':gender', $this->gender);
        $stmt->bindParam(':balance', $this->balance);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        print_r("Error: %s.\n", $stmt->error);


        return false;
    }

    // Update Post
    public function update()
    {
        // Create query
        $query = 'UPDATE ' . $this->table . '
            SET
                
                balance = :balance
            WHERE
                account_id = :account_id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data

        $this->balance = htmlspecialchars(strip_tags($this->balance));
        $this->account_id = htmlspecialchars(strip_tags($this->account_id));

        // Bind data

        $stmt->bindParam(':balance', $this->balance);
        $stmt->bindParam(':account_id', $this->account_id);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        print_r("Error: %s.\n", $stmt->error);

        return false;
    }

    // Delete Post
    public function delete()
    {
        // Create query
        $query = 'DELETE FROM ' . $this->table . ' WHERE account_id = :account_id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->account_id = htmlspecialchars(strip_tags($this->account_id));

        //Bind data
        $stmt->bindParam(':account_id', $this->account_id);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        print_f("Error: %s.\n", $stmt->error);

        return false;
    }
}
