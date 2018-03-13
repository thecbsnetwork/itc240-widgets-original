<?php include 'includes/config.php'?>
<?php include 'includes/header.php'?>
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
$sql = "select * from test_Customers";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
        echo '<p>';
        echo '<strong><a href="customer_view.php?id=' . $row['CustomerID'] . '">' . $row['FirstName'] . '';
        echo ' ' . $row['LastName'] . '<br />';
        echo '' . $row['Email'] . '</a></strong> ';
        echo '</p>';
    }    

}else{//inform there are no records
    echo '<p>There are currently no customers.</p>';
}

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

        echo '
            </div>
          </div>
        </div>
      </div>
    </section>';?>
<?php include 'includes/footer.php'?>