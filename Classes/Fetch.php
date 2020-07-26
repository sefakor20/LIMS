<?php
class Fetch
{
    protected $connection;

    protected $result;

    protected $error;

    protected $count = 0;


    function __construct(PDO $connection) {
        $this->connection =  $connection;
    }



    //fetch single item
    public function getSingleItem($action, $table, $field, $field_value) {
        $query = $this->connection->prepare("{$action} FROM {$table} WHERE {$field} = ? LIMIT 1 ");
        $query->bindParam(1, $field_value, PDO::PARAM_INT);

        if ($query->execute()) {
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result;
        } else {
            $this->error = implode(', ', $this->connection->errorInfo());
            return $this;
        }
    }


    //function to fetch single line data for query with where clause
    public function singleDataAction($action, $table, $where = array()) {
        if(count($where) === 3) {
            $operators = array('=', '>', '<', '>=', '<=', '==', '===', '!=', '!==', 'LIKE');
            $field = $where[0];
            $operator = $where[1];
            $value = $where[2];
            if(in_array($operator, $operators)) {
                $sql_statement = "{$action} FROM {$table} WHERE {$field} {$operator} ? LIMIT 1";
                if($result = $this->query($sql_statement, array($value))) {
                    return $result;
                } else {
                    $this->error = implode(', ', $this->connection->errorInfo());
                    return $this;
                }
            }
        }

    }


    //function to fetch a single data with or without a where clause
    public function query($sql_statement, $parameters = array()) {
        if($query = $this->connection->prepare($sql_statement)) {
            $parameter_counter = 1;
            if(count($parameters)){
                foreach ($parameters as $parameter) {
                    $query->bindValue($parameter_counter, $parameter);
                    $parameter_counter++;
                }
                if ($query->execute()) {
                    $id = $this->connection->lastInsertId();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $this->count = $query->rowCount();
                    return $result;
                } else {
                    $this->error = implode(', ', $this->connection->errorInfo());
                    return $this;
                }
            }
        }
        return $this;
    }

    
    //display single data result
    public function  getSingleData($query, $table, $where) {
        return $this->singleDataAction($query, $table, $where);
    }


    //fetch single item with joins
    public function getSigleJoinItem($action, $table, $join, $field, $field_value) {
        $query = $this->connection->prepare("{$action} FROM {$table} {$join} WHERE {$field} = ? LIMIT 1");
        $query->bindParam(1, $field_value, PDO::PARAM_INT);

        if($query->execute()) {
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result;
        } else {
            $this->error = implode(', ', $this->connection->errorInfo());
            return $this;
        }
    }


    //fetch items with limit and offset
    public function getItemsWithLimitOffset($action, $table, $join, $limit, $offset) {
        $query = $this->connection->prepare("{$action} FROM {$table} {$join} ORDER BY {$table}.id DESC LIMIT $limit OFFSET $offset");

        if($query->execute()) {
            $all_results = array();
            while($result = $query->fetch(PDO::FETCH_OBJ)) {
                $all_results[] = $result;
            }
            return $all_results;
        } else {
            $this->error = implode(', ', $this->connection->errorInfo());
            return false;
        }
    }


    //fetch all items with no comparison
    public function getItemsWithNoComparison($action, $table) {
        $query = $this->connection->prepare("{$action} FROM {$table}");

        if($query->execute()) {
            $all_results = array();
            while($result = $query->fetch(PDO::FETCH_OBJ)) {
                $all_results[] = $result;
            }
            return $all_results;
        } else {
            $this->error = implode(', ', $this->connection->errorInfo());
            return false;
        }
    }


    //fetch all client docs
    public function getClientDocs($client_id) {
        $query = $this->connection->prepare("SELECT documents.id, documents.application_id, documents.file AS doc, documents.created_at FROM documents WHERE documents.client_id = $client_id ORDER BY documents.id DESC");

        If($query->execute()) {
            $all_results = array();
            while($result = $query->fetch(PDO::FETCH_OBJ)) {
                $all_results[] = $result;
            }
            return $all_results;
        } else {
            $this->error = implode(', ', $this->connection->errorInfo());
            return false;
        }
    }


    //fetch client applications
    public function getClientApplication($client_id) {
        $query = $this->connection->prepare("SELECT land_applications.id, land_applications.client_id, land_applications.application_status, land_applications.created_at, clients.first_name, clients.surname, clients.other_name, application_status.name AS status FROM land_applications JOIN clients ON clients.id = land_applications.client_id JOIN application_status ON application_status.id = land_applications.application_status  WHERE land_applications.client_id  = $client_id");

        If($query->execute()) {
            $all_results = array();
            while($result = $query->fetch(PDO::FETCH_OBJ)) {
                $all_results[] = $result;
            }
            return $all_results;
        } else {
            $this->error = implode(', ', $this->connection->errorInfo());
            return false;
        }
    }


    //fetch client applications for admin
    public function getClientApplicationForAdmin() {
        $query =  $this->connection->prepare("SELECT land_applications.id, land_applications.client_id, land_applications.land_location, land_applications.created_at, clients.first_name, clients.surname, clients.other_name, application_status.name AS status FROM land_applications JOIN clients ON clients.id = land_applications.client_id JOIN application_status ON application_status.id = land_applications.application_status WHERE land_applications.application_status = 2");

        If($query->execute()) {
            $all_results = array();
            while($result = $query->fetch(PDO::FETCH_OBJ)) {
                $all_results[] = $result;
            }
            return $all_results;
        } else {
            $this->error = implode(', ', $this->connection->errorInfo());
            return false;
        }
    }


    //fetch client applications for admin
    public function getRegisteredLandsForAdmin() {
        $query =  $this->connection->prepare("SELECT land_applications.id, land_applications.land_location, land_applications.created_at, clients.first_name, clients.surname, clients.other_name, application_status.name AS status FROM land_applications JOIN clients ON clients.id = land_applications.client_id JOIN application_status ON application_status.id = land_applications.application_status WHERE land_applications.application_status = 7");

        If($query->execute()) {
            $all_results = array();
            while($result = $query->fetch(PDO::FETCH_OBJ)) {
                $all_results[] = $result;
            }
            return $all_results;
        } else {
            $this->error = implode(', ', $this->connection->errorInfo());
            return false;
        }
    }


    //search for registered lands
    public function searchRegisteredLands($item) {
        $query = $this->connection->prepare("SELECT land_applications.id, land_applications.name_of_owner, land_applications.land_location, land_applications.land_location,  land_applications.created_at, clients.first_name, clients.surname, clients.other_name, application_status.name AS status FROM land_applications JOIN clients ON clients.id = land_applications.client_id JOIN application_status ON application_status.id = land_applications.application_status WHERE land_applications.name_of_owner LIKE '%$item%' AND  land_applications.application_status = 7");

        if($query->execute()) {
            $all_results = array();
            while($result = $query->fetch(PDO::FETCH_OBJ)) {
                $all_results[] = $result;
            }
            return $all_results;
        } else {
            $this->error = implode(', ', $this->connection->errorInfo());
            return false;
        }
    }

    //fetch client applications for Surveyor
    public function getClientApplicationForSurveyor($surveyor_id) {
        $query =  $this->connection->prepare("SELECT land_applications.id, land_applications.land_location, land_applications.created_at, clients.first_name, clients.surname, clients.other_name, application_status.name AS status FROM land_applications JOIN clients ON clients.id = land_applications.client_id JOIN application_status ON application_status.id = land_applications.application_status WHERE land_applications.application_status = 3 AND land_applications.officer_id = $surveyor_id");

        If($query->execute()) {
            $all_results = array();
            while($result = $query->fetch(PDO::FETCH_OBJ)) {
                $all_results[] = $result;
            }
            return $all_results;
        } else {
            $this->error = implode(', ', $this->connection->errorInfo());
            return false;
        }
    }


    //fetch payments for admin
    // public function getPaymentsForAdmin(){}


    //fetch total new land registration
    public function getTotalNewLandRegistration() {
        $query = $this->connection->prepare("SELECT COUNT(id) total FROM land_applications WHERE application_status = 2");

        if($query->execute()) {
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result->total;
        } else {
            $this->error = implode(', ', $this->connection->errorInfo());
            return false;
        }
    }
    //fetch total Payment Pending
    public function getTotalPaymentPending() {
        $query = $this->connection->prepare("SELECT COUNT(id) total FROM payments WHERE status_id = 1");

        if($query->execute()) {
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result->total;
        } else {
            $this->error = implode(', ', $this->connection->errorInfo());
            return false;
        }
    }


    //fetch total Assigned tasks
    public function getTotalAssignedTasks($surveyor_id) {
        $query = $this->connection->prepare("SELECT COUNT(id) total FROM land_applications WHERE application_status = 3 AND officer_id = $surveyor_id");

        if($query->execute()) {
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result->total;
        } else {
            $this->error = implode(', ', $this->connection->errorInfo());
            return false;
        }
    }


    //fetch total surveyors
    public function getTotalSurveyors() {
        $query = $this->connection->prepare("SELECT COUNT(id) total FROM users WHERE user_role = 2");

        if($query->execute()) {
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result->total;
        } else {
            $this->error = implode(', ', $this->connection->errorInfo());
            return false;
        }
    }


    //fetch total for all items
    public function getTotal($table) {
        $query = $this->connection->prepare("SELECT COUNT(id) AS total FROM $table");
        if($query->execute()) {
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result->total;
        } else {
            $this->error = implode(', ', $this->connection->errorInfo());
            return false;
        }
    }


    //fetch total for all items
    public function getTotalRegisterLands() {
        $query = $this->connection->prepare("SELECT COUNT(id) AS total FROM land_applications WHERE application_status = 7");
        if($query->execute()) {
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result->total;
        } else {
            $this->error = implode(', ', $this->connection->errorInfo());
            return false;
        }
    }



    

}