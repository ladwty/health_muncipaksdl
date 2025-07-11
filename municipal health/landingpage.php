<?php
session_start();
if (!isset($_SESSION["username"])) { 
    header("Location: LogIn.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Medical Center of Tandang Sora</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_forward_ios" />
  <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css' rel='stylesheet' />
  <link rel="stylesheet" href="landingpage.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
</head>

<body>
  <!--Navbar-->
  <header class="navbar">
    <a href="landingpage.html">
    <div class="logo">
      <img src="images/Group 8.svg" alt="Logo"/> </a>
      <div style="text-align: center; color: #187B5D;">
        <h2 style="margin: 0; font-size: 20px;">Medical Center of Tandang Sora</h2>
        <p style="font-size: 19px; margin: 0; margin-top: 5px; font-weight: 500;">City of Quezon</p>
    </div>
    <nav>
      <ul class="nav-links">
        <li class="nav-link"><a href="about.html">About</a></li>
        <li class="nav-link"><a href="#">Request <span class="arrow">&#9662</span></a>
          <ul class="drop-down">
            <li><a href="History_vaccination.html ">New Patient</a></li>
            <li><a href="General CheckUp_History.html">Returning Patient</a></li>
            <li><a href="chest_xray.html">Laboratory Test</a></li>
          </ul>
        </li>
        <li class="nav-link"><a href="contactUs.html">Contact Us</a></li>
        <li class="nav-link"><a href="Doctors.html">Doctors</a></li>
        <li class="nav-link"><a href="#">Services <span class="arrow">&#9662</span></a>
        <ul class="drop-down">
            <li><a href="Services.html">Services</a></li>
            <li><a href="news-file.html">News</a></li>
          </ul>
        </li>
      </ul>
    </nav>
    <div class="nav-buttons">
      <a href="logout.php" class="btn login-btn">
        <img src="images/user.png" class="icon"> Log Out
      </a>

    <span class="welcome-message">
      Welcome, 
      <span class="user-name" style="font-size:18px;">
        <?php echo isset($_SESSION['first_name']) ? htmlspecialchars($_SESSION['first_name']) : 'User'; ?>!
      </span>
    </span>
    </div>
  </header>

  <section class="hero">
    <div class="search-box">
      <input type="text" placeholder="Search...">
      <button class="search-button">
      <img src="images/search_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="Search">
      </button>
    </div>

    <div class="hero-text">
      <h2>Leading the Way to a<br><span>Healthier Tomorrow</span></h2>
      <p>
        A commitment to advancing community health through preventive care,
        innovation, and accessible services, empowering a healthier future for all.
      </p>
          <a href="appointmentform.html" class="btn hero-btn">Make an Appointment now
          <img src="images/Vector.svg" alt="arrow" class="arrow-icon">
          </a>      
    </div>
  </section>

 <!-- Slider Carousel  -->
<section class="section-bg">
  <div class="content">
    <h2>News & Services</h2>
    <h4>Explore the latest news and events that keep our community informed</h4>
  </div>

  <div class="carousel-selection swiper">
    <div class="swiper-wrapper">

      <div class="swiper-slide">
        <a href="#" class="card">
          <img src="images/dengue.png" class="card-image">
        </a>
      </div>

      <div class="swiper-slide">
        <a href="#" class="card">
          <img src="images/freevac.png" class="card-image">
        </a>
      </div>

      <div class="swiper-slide">
        <a href="#" class="card">
          <img src="images/maternity.png" class="card-image">
        </a>
      </div>

      <div class="swiper-slide">
        <a href="#" class="card">
          <img src="images/hivcases.png"  class="card-image">
        </a>
      </div>
    </div>

    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>

    <div class="section-title">
    <h1>EVENT CALENDAR</h1>
    <div id="calendar" style="max-width: 1000px; margin: 30px auto;"></div>
  </div>
</section>

<!--ETO FAQ-->
<section class="faq-section">
  <h2>FAQ - Frequently asked Question</h2>
  <p>This section answers some of the most common questions visitors may have about our website, project goals, and the content we provide. If you don’t find your answer here, feel free to reach out to us!</p>

  <div class="faq">
    <button class="faq-question">
      Do I need an appointment?
      <span class="icon">⌃</span>
    </button>
    <div class="faq-answer">
      Walk-ins are welcome for most services, but for specific tests or consultations, it's best to call ahead and schedule an appointment.
    </div>
  </div>

  <div class="faq">
    <button class="faq-question">
      Are the services free?
      <span class="icon">⌃</span>
    </button>
    <div class="faq-answer">
      Yes, many of our services, such as HIV testing, health consultations, and safe sex education, are free. Some specialized services may have minimal fees.
    </div>
  </div>

  <div class="faq">
    <button class="faq-question">
      What do I need to bring?
      <span class="icon">⌃</span>
    </button>
    <div class="faq-answer">
      Please bring a valid ID, any previous medical records, and your PhilHealth card (if available).
    </div>
  </div>

  <div class="faq">
    <button class="faq-question">
      Where’s the health center?
      <span class="icon">⌃</span>
    </button>
    <div class="faq-answer">
      We are located at Tandang Sora – Quezon City, easily accessible to all residents of Quezon.
    </div>
  </div>
</section>

<!--FOOTER DIZ-->
<footer>
  <div class="container-footer">
    <div class="content-footer-left">
      <img src="images/Group 8.svg" alt="Logo" class="logo">
      <div class="logo-info">
        <h2 style="color:#6BD0A6" class="logo-name">Medical Center of Tandang Sora</h2>
              <div class="tagline"> <p>Dedicated on our own Citizens</p></div>
      </div>
    </div>
     
      <div class="content-footer-center">
        <h3>Mission</h3>
        <p>To promote the preventive health care and well-being of our 
          community through quality health services, health education, 
          and affordable care.</p>
        <h3>Vision</h3>
        <p>A healthier, balanced, and empowered community where 
          everyone has access to basic and essential health services
          in our whole municipality.</p>
      </div>

      <div class="content-right-footer">
        <h3>Hotline</h3>
        <p>(02) 1234 5678</p>
        <h3>Mobile Support</h3>
        <p>0917 890 1234 (Globe)</p>
        <p>0980 765 4321 (Smart)</p>
      </div>

      <div class="content-footer-bottom">
        <div class="footer-bottom-inner">
            <p>©2025 All rights reserved.</p>
        <div class="policy-links">
          <a href="#">Privacy Policy</a>
          <a href="#">Terms of use</a>
          <a href="#">Site Maps</a>
        </div>
        <div class="icons">
            <a href="#"><img src="images/facebook.png" alt="facebook"></a>
            <a href="#"><img src="images/instagram.png" alt="instagram"></a>
            <a href="#"><img src="images/email.png" alt="email"></a>
        </div>
       </div>
      </div> 
    </div>
</footer>

<!--POP UP TERMS :> -->
<div id="privacy-modal" class="modal-overlay" style="display: none;">
  <div class="modal-content">
    <h2>Terms of Use & Privacy Policy</h2>
    <p>Welcome to our <strong style="color:#58BC92">Municipal of Tandang Sora Medical Center</strong>!<br>
    This site was created as part of a school project for educational purposes only. By using this site, you agree to the following terms and policies.</p>

    <h3>Educational Purpose</h3>
    <p>This website was developed strictly for learning and educational use. The content is not meant to provide professional advice, especially in areas such as health, legal, or financial matters.</p>

    <h3>Health Disclaimer</h3>
    <p>Any health-related content on this site is for informational purposes only and should not be considered medical advice. Always consult a doctor or qualified healthcare provider for real medical concerns.</p>

    <h3>Privacy Policy</h3>
    <p>We respect your privacy. This website does not collect personal information unless you choose to provide it (such as through a contact or feedback form).</p>
    <ul>
      <li>General, non-identifiable usage data (e.g., number of visitors, time spent on pages)</li>
      <li>Information you voluntarily provide (e.g., comments or messages)</li>
    </ul>
    <p>This data is used solely for educational evaluation and improvement of the project. We do not share or sell your information.</p>

    <div class="modal-buttons">
      <button id="disagree-btn">Disagree</button>
      <button id="agree-btn">Agree</button>
    </div>
  </div>
</div>
  
<!--Eto javascript connection-->
<script>
  window.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("privacy-modal");
    const agreeBtn = document.getElementById("agree-btn");
    const disagreeBtn = document.getElementById("disagree-btn");

    if (modal && agreeBtn && disagreeBtn) {
      if (!localStorage.getItem("agreedToPrivacy")) {
        modal.style.display = "flex";
      }

      agreeBtn.onclick = function () {
        localStorage.setItem("agreedToPrivacy", "true");
        modal.style.display = "none";
      };

      disagreeBtn.onclick = function () {
        alert("You must agree to proceed.");
      };
    }
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<script src="script.js"></script>


</body>
</html>
