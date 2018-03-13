<?php include 'includes/config.php'?>
<?php include 'includes/header.php'?>
<?php
//email3.php

if(isset($_POST['Submit']))
{//send email?
    
    $to = "catherineblakesmith@gmail.com";
    
    $subject = "My Website Feedback " . date("m/d/y, G:i:s");
    
    //collect and clean post data
    $FirstName = coffee_clean_post('FirstName');
    $LastName = coffee_clean_post('LastName');
    $Email = coffee_clean_post('Email');
    $Comments = coffee_clean_post('Comments');
    
    //build body of email
    $text = '';//initialize variable
    $text .= 'FirstName: ' . $FirstName . PHP_EOL . PHP_EOL;
    $text .= 'LastName: ' . $LastName . PHP_EOL . PHP_EOL;
    $text .= 'Email: ' . $Email . PHP_EOL . PHP_EOL;
    $text .= 'Comments: ' . $Comments . PHP_EOL . PHP_EOL;
    
    $headers = 'From: noreply@growlingwillow.com' . PHP_EOL .
    'Reply-To: ' . $Email . PHP_EOL .
    'X-Mailer: PHP/' . phpversion();
    
    mail($to,$subject,$text,$headers);
    
    echo '<section class="page-section cta">
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <div class="cta-inner text-center rounded">
              <h2 class="section-heading mb-5">
                <span class="section-heading-upper">Message Sent</span>
                <span class="section-heading-lower">We will contact you within 24 hours</span>
              </h2>
            </div>
          </div>
        </div>
      </div>
    </section>';
        
}else{//show form!
    echo '
    <section class="page-section cta">
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <div class="cta-inner text-center rounded">
              <h2 class="section-heading mb-5">
                <span class="section-heading-upper">Tell Us What You Think</span>
                <span class="section-heading-lower">Contact Us</span>
              </h2>
              <p>
              <form action="" method="post">
                <div class="row">
                <div class="form-group col-lg-4">
                    <label class="text-heading" for="FirstName">First Name</label>
                    <input class="form-control" type="text" name="FirstName" id="FirstName" placeholder="First Name" autofocus required/>
                </div>

                <div class="form-group col-lg-4">
                    <label class="text-heading" for="LastName">Last Name</label>
                    <input class="form-control" type="text" name="LastName" id="LastName" placeholder="Last Name" required/>
                </div>

                <div class="form-group col-lg-4">
                    <label class="text-heading" for="Email">Email</label>
                    <input class="form-control" type="email" name="Email" id="Email" placeholder="Email" required/>
                </div>    

                <div class="clearfix"></div>

                <div class="form-group col-lg-12">
                    <label class="text-heading" for="Comments">Comments</label>
                    <textarea class="form-control" name="Comments" id="Comments" placeholder="Comments"></textarea>
                </div>   

                <div class="form-group col-lg-12">
                <button type="submit" class="btn btn-secondary" name="Submit">Submit</button>
                </div>
                </div>
            </form>
            </p>
            </div>
          </div>
        </div>
      </div>
    </section>'; 
}
?>
<?php include 'includes/footer.php'; 
    function coffee_clean_post($key)
{
        if(isset($_POST[$key])){
            return strip_tags(trim($_POST[$key]));
        }else{
            return '';
        }
}
?>