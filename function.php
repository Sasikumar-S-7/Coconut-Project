<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'coconut');
class DB_con
{
function __construct()
{
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$this->dbh=$con;
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
}


 public function getQuantityById($id) {
        $query = "SELECT quantity FROM wholesellertable WHERE wholeseller_id = $id";
        $result = $this->dbh->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return null;
        }
    }

    public function getpriceById($id) {
        $query = "SELECT price FROM retailer WHERE retailer_id = $id";
        $result = $this->dbh->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return null;
        }
    }


     public function updateQuantity($id, $quantity) {
        $sql = "UPDATE wholesellertable SET quantity = $quantity WHERE wholeseller_id = $id";
        $result = $this->dbh->query($sql);
        return $result;
    }

     public function updateprice($id, $price) {
        $sql = "UPDATE retailer SET price = $price WHERE retailer_id = $id";
        $result = $this->dbh->query($sql);
        return $result;
    }

    public function retailergetting()
    {
    	$get = "SELECT * FROM retailer order by retailer_id desc";
    	$result =$this->dbh->query($get);
    	return $result;
    }



    // public function selectretailer();
    // {
    // 	$select =mysqli_query($this->dbh,"select * from retailer");
    // 	return $select;
    // }

   

// Function for registration
	public function registration($username,$email,$password,$cpassword,$mobile)
	{
	$ret=mysqli_query($this->dbh,"insert into registertable(user_name,email,password,confirmpassword,mobile) values('$username','$email','$password','$cpassword','$mobile')");
	return $ret;
	}


	public function customerregistration($username,$email,$password,$cpassword,$mobile)
	{
	$ret=mysqli_query($this->dbh,"insert into customerregtable(customer_name,email,password,confirmpassword,mobile) values('$username','$email','$password','$cpassword','$mobile')");
	return $ret;
	}


	// public function retailtableinsert($retailer,$username,$date,$quantity,$price,$total,$comments,$quality,$color,$type,$address)
	// {
	// 	$retrn = mysqli_query($this->dbh,"insert into retailer(retailer_name,wholeseller_name,date,quantity,price,total,comments,quality,color,type,address) values('$retailer','$username','$date','$quantity','$price','$total','$comments','$quality','$color','$type','$address')");
	// 	return $retrn;
	// }



	public function insertselect($quantity,$wholesellerid)
	{
		$insertselect = mysqli_query($this->dbh,"insert into retailer(wholeseller_name,date,quantity,price,total,comments,quality,color,type,address) select  wholesellername,date,".$quantity.",price,total,comments,quality,color,type,address from wholesellertable where wholeseller_id =".$wholesellerid.";");
		return $insertselect;
	}


	//public function updateQuantity($id, $newQuantity) {
        // Assuming $conn is your database connection
       // $conn = $this->getConnection();  // Implement this based on your connection setup

        // Update the quantity for the given wholeseller
       // $updateQuery = "UPDATE wholesellertable SET quantity = $newQuantity WHERE wholeseller_id = $id";

        //if ($conn->query($updateQuery) === TRUE) {
        //    echo "Quantity updated successfully.";
       // } else {
       //     echo "Error updating quantity: " . $conn->error;
       // }

        // Close the database connection
       // $conn->close();
    //}




//Function for Wholeseller Insertation
	public function wholeseller($username,$date,$quantity,$price,$total,$comments,$quality,$color,$type,$size,$address)
	{
		$whole=mysqli_query($this->dbh,"insert into wholesellertable(wholesellername,date,quantity,price,total,comments,quality,color,type,size,address) values('$username','$date','$quantity','$price','$total','$comments','$quality','$color','$type','$size','$address')");
		return $whole;
	}





// Function for signin
public function signin($username,$password)
	{
	$result=mysqli_query($this->dbh,"select register_id,user_name from registertable where user_name='$username' and password='$password'");
	return $result;
	}


	public function customersignin($username,$password)
	{
	$result=mysqli_query($this->dbh,"select customer_id,customer_name from customerregtable where customer_name='$username' and password='$password'");
	return $result;

	}

	//Whole Seller Get Function

	public function wholeget()
	{
		$Get = mysqli_query($this->dbh,"SELECT * FROM wholesellertable order by wholeseller_id desc");
		if ($Get->num_rows > 0)
		 {
			return $Get;
		}
		else
		{
			return false;
		}
	}



	public function retailerget()
	{
		$get = mysqli_query($this->dbh,"SELECT * FROM retailer");
		if ($get->num_rows > 0)
		 {
			$row = $get->fetch_assoc();
			return $get;
		}
	}

	public function insertcustomer($cus_id,$customername,$quantity,$price,$type,$color,$quality)
	{
		$result =mysqli_query($this->dbh,"insert into customertable (customerid,customer_name,quantity,price,type,color,quality) values('$cus_id','$customername','$quantity','$price','$type','$color','$quality') ");
		

		return $result;
	}

	public function selectcustomer()
	{
		$query = "SELECT * FROM customertable";
		$result = $this->dbh->query($query);
		if ($result) {
			
		}
	}

	public function fetchId()
{
    $sql = "SELECT customer_id FROM customertable ORDER BY customer_id DESC LIMIT 1";
    $result = $this->dbh->query($sql);

    if ($result) {
        $row = $result->fetch_assoc(); // Fetch the result row
        if ($row) {
            return $row['customer_id']; // Return the customer_id from the row
        } else {
            return false; // No records found
        }
    } else {
        return false; // Error in the SQL query
    }
}




public function fetchCustomerById($customerId)
    {
        $customerId = $this->dbh->real_escape_string($customerId); // Sanitize input to prevent SQL injection

        $sql = "SELECT * FROM customertable WHERE customer_id = '$customerId'";
        $result = $this->dbh->query($sql);
        return $result;

  
     }



	public function selectcustomertable($order_id)
{
    $query = "SELECT * FROM customertable WHERE customer_id = '$order_id'";
    $result = $this->dbh->query($query);

    if ($result) {
        return $result;
    } else {
        return null;
    }
}

	public function joinquery()
	{
		$join_query= "SELECT *
                FROM customerregtable
                INNER JOIN customertable
                ON customerregtable.customer_id = customertable.customerid";
                $result = $this->dbh->query($join_query);
                if ($result->num_rows>0) {
                	return $result;
                }
                
	}


	


	public function insertcontact($firstname,$lastname,$address,$email,$contactno,$product,$comment)
	{
		$result =mysqli_query($this->dbh,"insert into contact(firstname,lastname,address,email,contactno,product,comment) values('$firstname','$lastname','$address','$email','$contactno','$product','$comment') ");
		

		return $result;
	}


	public function insertorder($ordererid,$orderername,$type,$quantity,$price,$tot)
	{
$result = mysqli_query($this->dbh, "insert into orderedtable(orderer_id, orderer_name, type, quantity, price, total) values('$ordererid', '$orderername', '$type', '$quantity', '$price', '$tot')");

		return $result;
	}





	

	


}
?>


