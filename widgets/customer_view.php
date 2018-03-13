<?php
//customer_view.php - shows details of a single customer
?>
<?php include 'includes/config.php';?>
<?php

//process querystring here
if(isset($_GET['id']))
{//process data
    //cast the data to an integer, for security purposes
    $id = (int)$_GET['id'];
}else{//redirect to safe page
    header('Location:customers.php');
}

$sql = "select * from test_Customers where CustomerID = $id";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
        $FirstName = stripslashes($row['FirstName']);
        $LastName = stripslashes($row['LastName']);
        $Email = stripslashes($row['Email']);
        $title = "Title Page for " . $FirstName;
        $pageID = $FirstName;
        $Feedback = '';//no feedback necessary
    }    

}else{//inform there are no records
    $Feedback = '<p>This customer does not exist!</p>';
}

?>
<?php include 'includes/header.php';?>
<?php
echo '<section class="page-section cta">
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <div class="cta-inner text-center rounded">
              <h2 class="section-heading mb-5">
                <span class="section-heading-upper">Who is always right?</span>
                <span class="section-heading-lower">The Customer</span>
              </h2>';    
    
if($Feedback == '')
{//data exists, show it

    echo '<p>';
    echo 'First Name: <strong>' . $FirstName . '</strong> ';
    echo 'Last Name: <strong>' . $LastName . '</strong><br />';
    echo 'Email: <strong>' . $Email . '</strong> ';
    
    echo '<br /><img src="uploads/customer' . $id . '.jpg" />';
    
    echo '</p>'; 
}else{//warn user no data
    echo $Feedback;
}    

echo '<p><a href="customers.php">Go Back</a></p>';

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);
    echo '
            </div>
          </div>
        </div>
      </div>
    </section>';
?>
<?php include 'includes/footer.php';?>