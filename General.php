<?php
class dags
{
	function dbconnectDags() 
	{
        $dbname = "dags";
        $servername = "localhost";
        $username = "root";
        $pass = "";
        $conn = mysqli_connect($servername, $username, $pass, $dbname);

        // mysql_select_db($dbname);
        if ($conn === false) 
        {
            die(mysql_error());
        } 
        
        else 
        {
            //echo "Succesful";
            return $conn;
        }
    }

	function getLatLong($digitalAddress)
	{
		$conn=$this->dbconnectDags();
        $qry = "SELECT  `latitude`,`longitude` FROM `locations` WHERE `digital_address` ='$digitalAddress'";

        $result = mysqli_query($conn, $qry) or die(mysql_error());
        while ($row = mysqli_fetch_object($result)) 
        {
            echo $row->latitude;
            echo $row->longitude;
        }


	}

	function getPostalAddress($lat,$long)
	{

		//get only postal address fields
		$conn=$this->dbconnectDags();
		$qry = "SELECT  `house_no`,`building`,`street`,`area`,`locality`,`city`,`pincode` FROM `locations` WHERE `latitude` ='$lat' and `longitude` = '$long'";

        $result = mysqli_query($conn, $qry) or die(mysql_error());
        
        if(($result)!=null)
        {
            while ($row = mysqli_fetch_object($result)) 
            {
                echo $row->house_no;
                echo $row->building;
                echo $row->street;
                echo $row->locality;
                echo $row->area;
                echo $row->city;
                echo $row->pincode;
            }
        }
        else
        {
            echo "data not found";
        }

	}

	function getDigitalAddress($lat,$long)
	{
        $conn=$this->dbconnectDags();
        $qry = "SELECT `digital_address` FROM `locations` WHERE `latitude` ='$lat' and `longitude` = '$long'";

        $result = mysqli_query($conn, $qry) or die(mysql_error());
        
        if(($result)!=null)
        {
            while ($row = mysqli_fetch_object($result)) 
            {
                echo $row->digital_address;
            }
        }
        else
        {
            echo "data not found";
        }
	}

    function getMyPlaces($userId)
    {
        $conn=$this->dbconnectDags();
        $qry = "SELECT `id` FROM `user_has_locations` WHERE `userid`= '$userId'";

        $result = mysqli_query($conn, $qry) or die(mysql_error());
        
        if(($result)!=null)
        {
            while ($row = mysqli_fetch_object($result)) 
            {
                echo $row->id;
            }
        }
        else
        {
            echo "data not found";
        }

    }


	/*Function to insert details*/
	//fristan
	    function insertUser($emailId,$name,$roleId,$empId)
	    {
	    	if($this->IsUserExist($emailId)==false)
	    	{
	    		$conn=$this->dbconnectDags();
		        $stmt = mysqli_stmt_init($conn);
		        $qry = "INSERT INTO `users`(`name`, `email`,`created_at`, `role_id`, `user_status`, `empid`) VALUES (?,?,?,?,?,?)";
		        if (mysqli_stmt_prepare($stmt, $qry))
		        {
		            $userStatus = "Pending"; // whatever the initial default status
		            if($roleId==1)
		            {
		              $empId = null;// if user is citizen	
		            }
		            else
		            {
		            	$empId=$empId;//if user is postman
		            }
		            $date = new DateTime();				 
		            echo $createdat=$date->getTimestamp();
		            mysqli_stmt_bind_param($stmt,"sssiss",$name,$emailId,$createdat,$roleId,$userStatus,$empId); // fill the placeholders as per requirement
		            mysqli_stmt_execute($stmt) or die( mysqli_stmt_error($stmt));

		            echo "Inserted successfully";

		        }
		        else
		        {
		        	echo "Failed to insert the data";
		        }
	    	}
	    	else
	    	{
	    		echo "'$emailId' already exist";
	    	}
	    }


    	/*Function to update UADAI Number*/
    	function UpdateUIDAI($uadai,$email)
    	{
    	  if($this->IsUserExist($email)==true)
    	  {
    	  	$con=$this->dbconnectDags();

    	  	$userStatus = "Verified";
    	  	$sql = "UPDATE `users` SET `uidai`='".$uadai."',`user_status`='".$userStatus."'  WHERE `email`='".$email."'";
			if (mysqli_query($con, $sql))
			{
				echo "UADAI updated Successfully";	
			}
			else
			{
				echo "Error updating record: " . mysqli_error($con);
			}
    	  	
    	  }
    	  else
    	  {
    	  	echo "'$email' does not exist";
    	  }
    	  

    	}

    	//Function to check if there is no duplication of UADAI
    	function CheckUADAI($uadai)
    	{

    	}


	    function IsUserExist($email)
	    {
	    	$con=$this->dbconnectDags();
	    	$qry = "SELECT `email` FROM `users` WHERE `email` ='$email'";
	        $res = mysqli_query($con, $qry);
	        //$data=  mysqli_fetch_row($result);
	        if (mysqli_num_rows($res) == 1) 
	        {
	            return true;
	        } 
	        else 
	        {
	            return false;
	        }
	    }


	    /*Sonali To finduser*/
	    function FindUser($emailId)
	    {
	        $con=$this->dbconnectDags();
	        $qry = "SELECT `userid`,`name` FROM `users` WHERE `email` = '" . $emailId . "'";
	        $res= mysqli_query($con,$qry);
	        if(mysqli_num_rows($res))
	        {
	        	while($row = mysqli_fetch_row($res)) 
				{
				  $userId=$row[0];	 
				}
		       return $userId;
		    }
		    else
		    {
		    	return false; 
		    }
	        

	    }


	    function UpdateLocation($lat,$long,$email,$digital_address)
	    {
	    	$con=$this->dbconnectDags();
	    	$Location_id=$this->UpdateLatLong($lat,$long,$digital_address);
	    	$userId=$this->Finduser($emailId);
	    	$stmt = mysqli_stmt_init($conn);

    	  	$sql = "UPDATE `user_has_locations` SET `userid`=?,`id`=? WHERE `id`=?";
    	  	if (mysqli_stmt_prepare($stmt, $sql))
    	  	{
    	  		
    	  		mysqli_stmt_bind_param($stmt, "ss", $userId,$Location_id);
            	mysqli_stmt_execute($stmt) or die(mysql_error());
            	return $Location_id;
    	  	}
    	  	else
    	  	{
    	  		echo "Error updating record: " . mysqli_error($con);
    	  	}

	    }

	    function updateLatLong($lat,$long,$digitalAddress)
	    {
	        $conn=$this->dbconnectDags();

	        $q = "UPDATE `locations` SET `latitude` = '$lat', `longitude` = '$long' WHERE `digital_address`='$digitalAddress'";
	        //return mysqli_query($con, $q);
	        if ($conn->query($q) === TRUE)

	        {
	            echo "Record updated successfully";
	        }
	        else 
	        {
	            echo "Error updating record: " . $conn->error;
	        }

	        $q1 = mysqli_query($conn,'SELECT `id` FROM `locations` WHERE `digital_address` = "' . $digitalAddress . '"');
	        $sqresult = mysqli_fetch_array($q1);
	        $locationId = $sqresult['id'];
	        return $locationId ; 


	    }

	    function loginuser($userid, $password)
	    {
	    	return "valid";
	    }





}
?>