<?php include 'includes/config.php'?>
<?php include 'includes/header.php'?>
<?php
$ctaHeading1 = 'Daily Specials';
        switch($day)
{
    case 'Monday':
        $ctaHeading2 = "On Mondays, we serve buttered croissants and a drip coffee.";
        $dailyImage = 'mon.jpg';
    break;
        
    case 'Tuesday':
        $ctaHeading2 = "On Tuesdays, we serve ginger molasses cookie with a cup of rooibos tea.";
        $dailyImage = 'tue.jpg';
    break;
        
    case 'Wednesday':
        $ctaHeading2 = "On Wednesdays, we serve a macchiato served with a 6 oz americano.";
        $dailyImage = 'wed.jpg';
    break;
        
    case 'Thursday':
        $ctaHeading2 = "On Thursdays, we serve London Fog (Earl Grey tea flavored with bergamot and lavender).";
        $dailyImage = 'thu.jpg';
    break;
        
    case 'Friday':
        $ctaHeading2 = "On Fridays, we serve a shot of espresso in a chocolate stout beer.";
        $dailyImage = 'fri.jpg';
    break;
        
    case 'Saturday':
        $ctaHeading2 = "On Saturdays, we serve affogato: espresso served over a scoop of vanilla ice cream.";
        $dailyImage = 'sat.jpg';
    break;
        
    case 'Sunday':
        $ctaHeading2 = "On Sundays, we serve a pot of chamomile tea.";
        $dailyImage = 'sun.jpg';
    break;     
        
    default:
        $ctaHeading2 = "Nothing. There is nothing.";
        $dailyImage = 'products-01.jpg';
    break;        
}//end daily rotation for daily.php
        echo '
    <section class="page-section about-heading">
      <div class="container">
        <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="img/' . $dailyImage . '" alt="">
        <div class="about-heading-content">
          <div class="row">
            <div class="col-xl-9 col-lg-10 mx-auto">
              <div class="bg-faded rounded p-5">
                <h2 class="section-heading mb-4">
                  <span class="section-heading-lower">' . $ctaHeading1 . '</span>
                  <span class="section-heading-upper">' . $ctaHeading2 . '</span>
                </h2>
                <p>See the specials for: <a href="daily.php?day=Monday">Monday</a> | <a href="daily.php?day=Tuesday">Tuesday</a> | <a href="daily.php?day=Wednesday">Wednesday</a> | <a href="daily.php?day=Thursday">Thursday</a> | <a href="daily.php?day=Friday">Friday</a> | <a href="daily.php?day=Saturday">Saturday</a> | <a href="daily.php?day=Sunday">Sunday</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>';
?>
<?php include 'includes/footer.php'?>