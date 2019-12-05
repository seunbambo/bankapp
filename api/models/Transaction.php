<?php

class Transaction
{
    // DB stuff
    private $conn;
    private $table = 'transactions_history';

    // Post Properties
    public $transaction_id;
    public $amount;
    public $opening_balance;
    public $closing_balance;
    public $originator_account_id;
    public $beneficiary_account_id;
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
        $query = 'SELECT transaction_id, opening_balance, amount, closing_balance, originator_account_id, originator_account_id, beneficiary_account_id, beneficiary_account_id, date_created 
            FROM ' . $this->table . '
            ORDER BY date_created DESC';

        // Prepared statement
        $stmt = $this->conn->prepare($query);

        //Execute query
        $stmt->execute();

        return $stmt;
    }

    // Get Single Post
    public function read_single()
    {
        // Create query
        $query = 'SELECT c.name as category_name, p.id, p.category_id, p.title, p.body, p.author, p.created_at 
            FROM ' . $this->table . ' p  
            LEFT JOIN categories c 
            ON p.category_id = c.id
            WHERE
            p.id = ?
            LIMIT 0,1';

        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->transaction_id);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties
        $this->firstname = $row['firstname'];
        $this->lastname = $row['lastname'];
        $this->phone = $row['phone'];
        $this->address = $row['address'];
        $this->gender = $row['gender'];
        $this->balance = $row['balance'];
        $this->date_created = $row['date_created'];
    }

    // Create Post
    public function create()
    {
        // Create query
        $query = 'INSERT INTO ' . $this->table . '
            SET
                amount = :amount,
                opening_balance = :opening_balance,
                closing_balance = :closing_balance,
                originator_account_id = :originator_account_id,
                beneficiary_account_id = :beneficiary_account_id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->amount = htmlspecialchars(strip_tags($this->amount));
        $this->opening_balance = htmlspecialchars(strip_tags($this->opening_balance));
        $this->closing_balance = htmlspecialchars(strip_tags($this->closing_balance));
        $this->originator_account_id = htmlspecialchars(strip_tags($this->originator_account_id));
        $this->beneficiary_account_id = htmlspecialchars(strip_tags($this->beneficiary_account_id));

        // Bind data
        $stmt->bindParam(':amount', $this->amount);
        $stmt->bindParam(':opening_balance', $this->opening_balance);
        $stmt->bindParam(':closing_balance', $this->closing_balance);
        $stmt->bindParam(':originator_account_id', $this->originator_account_id);
        $stmt->bindParam(':beneficiary_account_id', $this->beneficiary_account_id);

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
                title = :title,
                body = :body,
                author = :author,
                category_id = :category_id
            WHERE
                id = :id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->body = htmlspecialchars(strip_tags($this->body));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind data
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':body', $this->body);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':id', $this->id);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        print_f("Error: %s.\n", $stmt->error);

        return false;
    }

    // Delete Post
    public function delete()
    {
        // Create query
        $query = 'DELETE FROM ' . $this->table . ' WHERE transaction_id = :transaction_id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->transaction_id = htmlspecialchars(strip_tags($this->transaction_id));

        //Bind data
        $stmt->bindParam(':transaction_id', $this->transaction_id);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        print_f("Error: %s.\n", $stmt->error);

        return false;
    }
}
