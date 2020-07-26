<?php
class Login
{
    protected $connection;

    protected $email;

    protected $password;

    protected $account;

    protected $error;

    function __construct(PDO $connection, $email, $password){
        $this->connection = $connection;
        $this->email = $email;
        $this->password = $password;
    }


    //authenticate users info
    public function authenticate($table) {
        $query = $this->connection->prepare("SELECT id, first_name, surname, email, password, user_role FROM $table WHERE email = ? AND account_status = ? LIMIT 1");
        $account_status = 1;
        $query->bindParam(1, $this->email, PDO::PARAM_STR);
        $query->bindParam(2, $account_status, PDO::PARAM_STR);

        if(false === $query->execute()){
            $this->error = implode(', ', $this->connection->errorInfo());
            return false;
        }

        $account = $query->fetch(PDO::FETCH_OBJ);

        if(false === $account) {
            $this->error = 'No account found with the given email';
            return false;
        }

        if(false === password_verify($this->password, $account->password)) {
            $this->error = 'Invalid password';
            return false;
        }

        $this->account = $account;
        return true;
    }


    public function getAccount() {
        if(null !== $this->account) {
            unset($this->account->password);
        }
        return $this->account;
    }

    public function getError() {
        return $this->error;
    }
}