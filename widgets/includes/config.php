<?php
/*
config.php
PUT CONFIGURATION INFO FOR WIDGETS IN HERE
*/

//other include files referenced here
include 'credentials.php';
include 'random_rotate.php';

define('DEBUG',TRUE); #we want to see all errors

define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

$nav1['index.php'] = "HOME";
$nav1['customers.php'] = "CUSTOMERS";
$nav1['contact.php'] = "CONTACT";
$nav1['daily.php'] = "DAILY";

//superglobal $_GET to grab querystring from URL
    
    if(isset($_GET['day']))
    {//data in querystring, use it!
        $day = $_GET['day'];
    }else{//use current date
        $day = date('l');
    }

//defaults for header.php
    $pageBanner = 'WIDGETS';
    $pageSlogan = 'Our Widgets are better!';   

switch(THIS_PAGE){
    case 'template.php':
        $pageTitle = 'Template';
    break;
    
    case 'index.php':
        $pageTitle = 'Home';
    break;
                
    case 'customers.php':
        $pageTitle = 'Customers';
    break;
        
    case 'contact.php':
        $pageTitle = 'Contact';
    break;
        
    case 'daily.php':
        $pageTitle = 'Daily Special';
    break;
 
    default:
        $pageTitle = THIS_PAGE; 
    break;
}//end switch title tags

function load_widget() {
switch(THIS_PAGE){
    case 'index.php':
        $heros[] = '<img src="uploads/coulson.png" />';
        $heros[] = '<img src="uploads/fury.png" />';
        $heros[] = '<img src="uploads/hulk.png" />';
        $heros[] = '<img src="uploads/thor.png" />';
        $heros[] = '<img src="uploads/black-widow.png" />';
        $heros[] = '<img src="uploads/captain-america.png" />';
        $heros[] = '<img src="uploads/machine.png" />';
        $heros[] = '<img src="uploads/iron-man.png" />';
        $heros[] = '<img src="uploads/loki.png" />';
        $heros[] = '<img src="uploads/giant.png" />';
        $heros[] = '<img src="uploads/hawkeye.png" />';
        echo randomize($heros);
    break;
        
    case 'daily.php':
        include 'includes/planets.php';
        echo rotate($planets);
    break;
        
    default: 
        echo '';
    break;
}//end random_rotate widgets
}

function load_cta(){
switch(THIS_PAGE){
        
    case 'template.php':
        $ctaImage = 'products-02.jpg';
        $ctaHeading1 = 'Try Our Widgets';
        $ctaHeading2 = 'Yummy Yummy';
        $ctaText = 'Mocha java variety, java froth single origin arabica wings. Carajillo, body aftertaste aged coffee frappuccino affogato. Cultivar cinnamon, mocha dark cultivar saucer aroma wings spoon irish dripper body. Strong, extra affogato, id coffee and sugar blue mountain siphon.';
        include 'includes/cta.php';
    break;    
        
    case 'index.php':
        $ctaImage = 'products-04.jpg';
        $ctaHeading1 = 'Try Our Homemade Widgets';
        $ctaHeading2 = 'So tasty';
        $ctaText = 'Mocha java variety, java froth single origin arabica wings. Carajillo, body aftertaste aged coffee frappuccino affogato. Cultivar cinnamon, mocha dark cultivar saucer aroma wings spoon irish dripper body. Strong, extra affogato, id coffee and sugar blue mountain siphon.';
        include 'includes/cta.php';
    break;
        
    default:
        echo '';
    break;

}//end switch cta content
}

function myerror($myFile, $myLine, $errorMsg)
{
    if(defined('DEBUG') && DEBUG)
    {
       echo "Error in file: <b>" . $myFile . "</b> on line: <b>" . $myLine . "</b><br />";
       echo "Error Message: <b>" . $errorMsg . "</b><br />";
       die();
    }else{
		echo "I'm sorry, we have encountered an error.  Would you like to buy some socks?";
		die();
    }
}//end myerror()

function coffee_links($nav1){
    foreach($nav1 as $url => $text){
        //echo '<li><a href="' . $url . '">' . $text . '</a></li>'; 
        
        if(THIS_PAGE == $url){//current page - add highlight
           echo '
        <li class="nav-item active px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="' . $url . '">' . $text . '</a>
        </li>
        ';    
        }else{//no highlight
           echo '
        <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="' . $url . '">' . $text . '</a>
        </li>
        ';            
        } 
    }   
    
}//end coffee_links()


/*
<div class="container">
        <div class="intro">
          <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="img/<?=$midIimage?>" alt="">
          <div class="intro-text left-0 text-center bg-faded p-5 rounded">
            <h2 class="section-heading mb-4">
              <span class="section-heading-upper">$midHeadingUp</span>
              <span class="section-heading-lower">$midHeadingLow</span>
            </h2>
            <p class="mb-3">$midText
            </p>
            <div class="intro-button mx-auto">
              <a class="btn btn-primary btn-xl" href="$midUrl">Visit Us Today!</a>
            </div>
          </div>
        </div>
      </div>
*/


?>