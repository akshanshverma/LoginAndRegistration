<?php
/**
 * class @Api is to present the concept of rest api in which we perform some action like
 * post,put,delete,get between application and database
 */
class Api extends CI_Controller
{
    /**
     * funtion index is default run funtion in which api decide which type of function use 
     * 
     */
    public function index()
    {
        //action according to GET,POST,PUT,DELETE
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->getData();
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->postData();
        } elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            $this->putData();
        } elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
            $this->delete();
        }
    }

    /**
     * funtion getdata is to get data from database and give to user 
     * 
     * @param int by default null and if user pass any value then value will replace null
     */
    public function getData($id = null)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            //query to get data 
            $q = "SELECT * FROM user";
            if ($this->uri->segment(2) != null) {
                $q .= " WHERE id = $id";
            }
            
            //$ss = $this->db->query($q);
            //run query with the help of query funtion 
            $this->queryFun($q);
        }
    }

    /**
     * funtion postData is to send data to data base
     */
    public function postData()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //take all the value from post
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $password = $_POST['password'];
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];
            //make post query
            $query = "INSERT INTO user(fname,lname,password,mobile,email)
               VALUES('$fname ','$lname ',$age,$mobile,'$email')";

            //run query
            $this->queryFun($query);
            return;
        }
        echo "use POST";
    }

    /**
     * funtion putData is to chenge in tha data of the data base
     */
    public function putData()
    {
        //is to take string value in put
        parse_str(file_get_contents("php://input"), $_PUT);
        //if id is null
        if ($_PUT['id'] == null) {
            echo "message: give id";
            return;
        }
        $q = "UPDATE user SET";
        //make query according to user input
        foreach ($_PUT as $key => $value) {
            if ($key != "id") {
                $q .= " " . $key . " = '" . $value . "',";
            }
        }
        $q = substr($q, 0,- 1);
        $q .= " WHERE id = " . $_PUT['id'];
        ///$this->db->query($q);

        //run query
        $this->queryFun($q);
    }

    /**
     * funtion delete data from the database 
     */
    public function delete()
    {
        //is to take string value for delete values
        parse_str(file_get_contents("php://input"), $_DELETE);
        $id = $_DELETE['id'];
        //$this->db->query("DELETE FROM user WHERE id = $id");

        //if no id is given by user then 
        if ($id == null) {
            echo "message: give id";
            return;
        }
        //make query
        $query = "DELETE FROM user WHERE id = $id";
        //run query
        $this->queryFun($query);

    }

    /**
     * funtion queryFun is to run query and show error message according to error
     * 
     * @param String take query 
     */
    public function queryFun($query)
    {
        //if and error in query then show error message 
        if (!($result = $this->db->query($query))) {
            $error = $this->db->error();
            echo $error['message'];
        } else {
            //if rusult give boolean value then show successful msg
            if (is_bool($result)) {
                if ($result == true) {
                    echo "message: successful";
                }
                return;
            }
            //if result give empty array then 
            elseif (($ss = $result->result()) == null) {
                echo "message: not valid id"; 
                return;
            }
            //if result give value print in json form 
            echo json_encode($ss);
        }
    }
}

?>