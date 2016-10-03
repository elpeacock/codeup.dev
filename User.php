<?php


// __DIR__ is a *magic constant* with the directory path containing this file.
// This allows us to correctly require_once Model.php, no matter where this file is being required from.
require_once __DIR__ . '/Model.php';

class User extends Model
{
    /** Insert a new entry into the database */
    protected function insert()
    {
        // @TODO: Use prepared statements to ensure data security
        $insertQuery = 'INSERT INTO users (username, password, email) VALUES (:username, :password, :email);';

        $stmt = self::$dbc->prepare($insertQuery);

        // @TODO: You will need to iterate through all the attributes to build the prepared query
        foreach ($this->attributes as $index => $attribute) {
            
            $stmt->bindValue(":$index", $attribute, PDO::PARAM_STR);
            
            // $stmt->bindValue(':password, $password, PDO::PARAM_STR');

            // $stmt->bindValue(':email, $email, PDO::PARAM_STR');
            
        }

        $stmt->execute();

        // @TODO: After the insert, add the id back to the attributes array
        //        so the object properly represents a DB record

        $this->attributes['id'] = self::$dbc->lastInsertId();

    }

    /** Update existing entry in the database */
    protected function update()
    {
        // @TODO: Use prepared statements to ensure data security

        $updateQuery = 'UPDATE users SET username = :username, password = :password, email = :email;';

        $stmt = self::$dbc->prepare($updateQuery);

        // @TODO: You will need to iterate through all the attributes to build the prepared query
        foreach ($this->attributes as $index => $attribute) {

            $stmt->bindValue(":$index", $attribute, PDO::PARAM_STR);

        }

        $stmt->execute();
    }

    /**
     * Find a single record in the DB based on its id
     *
     * @param int $id id of the user entry in the database
     *
     * @return User An instance of the User class with attributes array set to values from the database
     */
    public static function find($id)
    {
        // Get connection to the database
        self::dbConnect();

        // @TODO: Create select statement using prepared statements
        $findQuery = "SELECT * FROM users WHERE id = :id;";

        $stmt = self::$dbc->prepare($findQuery);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        $stmt->fetchAll(PDO::FETCH_ASSOC);

        // @TODO: Store the result in a variable named $result

        $result = $stmt->fetch();

        // The following code will set the attributes on the calling object based on the result variable's contents
        $instance = null;
        if ($result) {
            $instance = new static($result);
        }
        return $instance;
    }

    /**
     * Find all records in a table
     *
     * @return User[] Array of instances of the User class with attributes set to values from database
     */
    public static function all()
    {
        self::dbConnect();

        // @TODO: Learning from the find method, return all the matching records
        $allQuery = 'SELECT * FROM users;';

        $stmt = self::$dbc->prepare($allQuery);

        $stmt->fetchAll(PDO::FETCH_ASSOC);

        $result = $stmt->fetch();

        // The following code will set the attributes on the calling object based on the result variable's contents
        $instance = null;
        if ($result) {
            $instance = new static($result);
        }
        return $instance;
    }
}
