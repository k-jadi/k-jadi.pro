<?php
function getClientIp()
{
    $ip_address = 'UNKNOWN';

    // Check for shared internet/proxy IPs first
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];
    }
    // Check for IPs from proxies, load balancers (can be a comma-separated list)
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // Take the first IP in the list, as it's usually the client's original IP
        $ip_list = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        $ip_address = trim($ip_list[0]);
    }
    // Standard remote address
    elseif (!empty($_SERVER['REMOTE_ADDR'])) {
        $ip_address = $_SERVER['REMOTE_ADDR'];
    }
    // Additional headers for specific CDN/proxy services (optional, but good for accuracy)
    elseif (!empty($_SERVER['HTTP_CF_CONNECTING_IP'])) { // Cloudflare
        $ip_address = $_SERVER['HTTP_CF_CONNECTING_IP'];
    } elseif (!empty($_SERVER['HTTP_INCAP_CLIENT_IP'])) { // Incapsula
        $ip_address = $_SERVER['HTTP_INCAP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_TRUE_CLIENT_IP'])) { // Akamai
        $ip_address = $_SERVER['HTTP_TRUE_CLIENT_IP'];
    }

    // You might want to add validation to ensure it's a valid IP address
    if (filter_var($ip_address, FILTER_VALIDATE_IP)) {
        return $ip_address;
    } else {
        return 'INVALID_IP_FORMAT'; // Or handle as needed
    }
}

// Use it:
// $clientIp = getClientIp();
// $clientCountry = file_get_contents('http://ip-api.com/json/' . $clientIp);
// $clientCountry = json_decode($clientCountry);
// $clientCountryCode =  $clientCountry->countryCode;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Passions+Conflict&display=swap" rel="stylesheet">
    <!-- Fontawsome Library -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <!-- Link Swiper's CSS -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <!-- Title -->
    <title>K-JADI PRO - Agency</title>
</head>

<body>
    <?php // if ($clientCountryCode != 'MA') :
    ?>
    <div class="main-container">
        <!-- Menu and Profile -->
        <div class="menu-profile">
            <!-- Header -->
            <header>
                <nav>
                    <!-- KJ Logo -->
                    <div class="bg-gradient">
                        <img src="./images/kjprologo.png" alt="KJ Logo">
                    </div>
                    <!-- Menu -->
                    <ul>
                        <!-- About -->
                        <li>
                            <a href="./index.php" data-label="Reload" class="active">
                                <i class="fa-solid fa-arrows-rotate"></i>
                            </a>
                        </li>
                        <!-- Services -->
                        <li>
                            <a href="#services" data-label="Services">
                                <i class="fa-solid fa-list-ul"></i>
                            </a>
                        </li>
                        <!-- Project -->
                        <li>
                            <a href="#projects" data-label="Projects">
                                <i class="fa-solid fa-diagram-project"></i>
                            </a>
                        </li>

                        <!-- Clients -->
                        <li>
                            <a href="#testimonials" data-label="Clients">
                                <i class="fa-regular fa-face-smile"></i>
                            </a>
                        </li>
                        <!-- Contact -->
                        <li>
                            <a href="#contact" data-label="Contact">
                                <i class="fa-solid fa-solid fa-headset"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </header>
            <!-- Profile -->
            <div class="profile-container">
                <div class="user-profile bg-gradient">
                    <!-- Profile Box -->
                    <div class="user-profile-container">
                        <!-- Image -->
                        <div class="user-profile-img">
                            <img src="images/logo-k-jadi-pro.png" alt="Khalid Jadi" />
                        </div>
                        <!-- Text -->
                        <div class="user-profile-text">
                            <span>Web Development Agency</span>
                            <h1>By Khalid Jadi</h1>
                            <!-- Social -->
                            <div class="profile-social-container">
                                <a href="https://www.linkedin.com/company/k-jadi-pro" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                                <a href="#" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                                <a href="#" target="_blank"><i class="fa-brands fa-github"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Buttons -->
                    <div class="user-profile-btns">
                        <a href="#">Highlights &nbsp <i class="fa-regular fa-circle-play"></i></a>
                        <a href="#">Contact Us &nbsp <i class="fa-solid fa-file-signature"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- All content -->
        <div class="all-content">
            <!-- About section -->
            <section id="about-section" class="section-container">
                <h3>We ... <span id="role"></span></h3>
                <h1>Evolve your business with <span>K-JADI.PRO</span> and build it Byte by Byte ...</h1>
                <!-- Block = comment on used tech + swiper slider -->
                <div class="usedTechnologies">
                    <!-- Comment On used technologies-->
                    <div class="techComment">
                        <p>Technologies We Use</p>
                    </div>
                    <!-- Slider of used technologies-->
                    <div class="swiper-used-tech">
                        <div class="swiper-wrapper">
                            <!-- Box-slide -->
                            <div class="swiper-slide">
                                <div class="swiper-slide-content"><img src="./images/html.svg" alt=""></div>
                            </div>
                            <!-- Box-slide -->
                            <div class="swiper-slide" style="opacity: 1;">
                                <div class="swiper-slide-content"><img src="./images/css.svg" alt=""></div>
                            </div>
                            <!-- Box-slide -->
                            <div class="swiper-slide" style="opacity: 1;">
                                <div class="swiper-slide-content"><img src="./images/js.svg" alt=""></div>
                            </div>
                            <!-- Box-slide -->
                            <div class="swiper-slide" style="opacity: 1;">
                                <div class="swiper-slide-content"><img src="./images/react.svg" alt=""></div>
                            </div>
                            <!-- Box-slide -->
                            <div class="swiper-slide" style="opacity: 1;">
                                <div class="swiper-slide-content"><img src="./images/angular.svg" alt=""></div>
                            </div>
                            <!-- Box-slide -->
                            <div class="swiper-slide" style="opacity: 1;">
                                <div class="swiper-slide-content"><img src="./images/vue.svg" alt=""></div>
                            </div>
                            <!-- Box-slide -->
                            <div class="swiper-slide" style="opacity: 1;">
                                <div class="swiper-slide-content"><img src="./images/node.js.svg" alt=""></div>
                            </div>
                            <!-- Box-slide -->
                            <div class="swiper-slide" style="opacity: 1;">
                                <div class="swiper-slide-content"><img src="./images/next.svg" alt=""></div>
                            </div>
                            <!-- Box-slide -->
                            <div class="swiper-slide" style="opacity: 1;">
                                <div class="swiper-slide-content"><img src="./images/php.svg" alt=""></div>
                            </div>
                            <!-- Box-slide -->
                            <div class="swiper-slide" style="opacity: 1;">
                                <div class="swiper-slide-content"><img src="./images/laravel.svg" alt=""></div>
                            </div>
                            <!-- Box-slide -->
                            <div class="swiper-slide" style="opacity: 1;">
                                <div class="swiper-slide-content"><img src="./images/sqldeveloper.svg" alt=""></div>
                            </div>
                            <!-- Box-slide -->
                            <div class="swiper-slide" style="opacity: 1;">
                                <div class="swiper-slide-content"><img src="./images/mysql.svg" alt=""></div>
                            </div>
                            <!-- Box-slide -->
                            <div class="swiper-slide" style="opacity: 1;">
                                <div class="swiper-slide-content"><img src="./images/postgre.svg" alt=""></div>
                            </div>
                            <!-- Box-slide -->
                            <div class="swiper-slide" style="opacity: 1;">
                                <div class="swiper-slide-content"><img src="./images/googlecloud.svg" alt=""></div>
                            </div>
                            <!-- Box-slide -->
                            <div class="swiper-slide" style="opacity: 1;">
                                <div class="swiper-slide-content"><img src="./images/azure.svg" alt=""></div>
                            </div>
                            <!-- Box-slide -->
                            <div class="swiper-slide" style="opacity: 1;">
                                <div class="swiper-slide-content"><img src="./images/aws.svg" alt=""></div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- Services -->
            <section id="services" class="section-container">
                <div class="section-heading">
                    <span><i class="fa-solid fa-screwdriver-wrench"></i> Our Services</span>
                    <h3>What Services We provide ?</h3>
                </div>
                <!-- Container -->
                <div class="service-container">
                    <!-- Box 1 -->
                    <div class="service-box bg-gradient" data-aos="fade-up">
                        <!-- Heading -->
                        <div class="service-box-heading">
                            <!-- icon -->
                            <div class="service-box-icon">
                                <img src="images/graphic.png" alt="graohic" />
                            </div>
                            <!-- Text -->
                            <div class="service-box-heading-text">
                                <strong>UI/UX Design</strong>
                            </div>
                        </div>
                        <!-- Details -->
                        <p class="service-box-details">
                            Creating the visual elements and user experience of a website or
                            application.
                        </p>
                    </div>
                    <!-- Box 2 -->
                    <div class="service-box bg-gradient" data-aos="fade-up">
                        <!-- Heading -->
                        <div class="service-box-heading">
                            <!-- icon -->
                            <div class="service-box-icon">
                                <img src="images/web.png" alt="graohic" />
                            </div>
                            <!-- Text -->
                            <div class="service-box-heading-text">
                                <strong>End-to-end Development</strong>
                            </div>
                        </div>
                        <!-- Details -->
                        <p class="service-box-details">
                            Managing the entire development process from design to
                            deployment, ensuring a cohesive and functional application.
                        </p>
                    </div>
                    <!-- Box 3 -->
                    <div class="service-box bg-gradient" data-aos="fade-up">
                        <!-- Heading -->
                        <div class="service-box-heading">
                            <!-- icon -->
                            <div class="service-box-icon">
                                <img src="images/tech.png" alt="graohic" />
                            </div>
                            <!-- Text -->
                            <div class="service-box-heading-text">
                                <strong>Integration</strong>
                            </div>
                        </div>
                        <!-- Details -->
                        <p class="service-box-details">
                            Integrating various components, including databases, APIs, and
                            third-party services, to create a complete system.
                        </p>
                    </div>
                    <!-- Box 4 -->
                    <div class="service-box bg-gradient" data-aos="fade-up">
                        <!-- Heading -->
                        <div class="service-box-heading">
                            <!-- icon -->
                            <div class="service-box-icon">
                                <img src="images/cloud-services.png" alt="graohic" />
                            </div>
                            <!-- Text -->
                            <div class="service-box-heading-text">
                                <strong>Cloud Services</strong>
                            </div>
                        </div>
                        <!-- Details -->
                        <p class="service-box-details">
                            Utilizing cloud platforms like AWS, Azure, or Google Cloud for
                            hosting, storage, and other services.
                        </p>
                    </div>
                </div>

                <!-- Message -->
                <p class="service-message">
                    Contact me for Any Help And Services
                    <a href="#">Let's get Started</a>
                </p>
            </section>

            <!-- Projects -->
            <section id="projects" class="section-container">
                <!-- Heading -->
                <div class="section-heading">
                    <span><i class="fa-solid fa-briefcase"></i> Projects</span>
                    <h3>Explore portfolio By Technology</h3>
                </div>

                <!-- Filter -->
                <ul class="project-list">
                    <li class="active" data-filter="all">All</li>
                    <li data-filter="ReactJs">ReactJs</li>
                    <li data-filter="Figma">Figma</li>
                </ul>

                <!-- Container -->
                <div class="project-container">
                    <!-- project-box -->
                    <a
                        href="#"
                        class="project-box"
                        data-category="ReactJs"
                        data-aos="fade-up">
                        <!-- Img -->
                        <div class="project-box-img">
                            <img src="images/p2.jpg" alt="project" />
                        </div>
                        <!-- Text -->
                        <div class="project-box-text-container">
                            <!-- Details -->
                            <div class="project-box-text">
                                <strong>Business Company Website</strong>
                                <span>ReactJs</span>
                            </div>
                            <!-- Link icon -->
                            <div class="project-box-btn">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </div>
                        </div>
                    </a>
                    <!-- project-box -->
                    <a
                        href="#"
                        class="project-box"
                        data-category="Figma"
                        data-aos="fade-up">
                        <!-- Img -->
                        <div class="project-box-img">
                            <img src="images/p3.jpg" alt="project" />
                        </div>
                        <!-- Text -->
                        <div class="project-box-text-container">
                            <!-- Details -->
                            <div class="project-box-text">
                                <strong>Figma App Design</strong>
                                <span>Figma</span>
                            </div>
                            <!-- Link icon -->
                            <div class="project-box-btn">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </div>
                        </div>
                    </a>
                    <!-- project-box -->
                    <a
                        href="#"
                        class="project-box"
                        data-category="ReactJs"
                        data-aos="fade-up">
                        <!-- Img -->
                        <div class="project-box-img">
                            <img src="images/p1.jpg" alt="project" />
                        </div>
                        <!-- Text -->
                        <div class="project-box-text-container">
                            <!-- Details -->
                            <div class="project-box-text">
                                <strong>Dashboard of the website</strong>
                                <span>ReactJs</span>
                            </div>
                            <!-- Link icon -->
                            <div class="project-box-btn">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </section>

            <!-- Clients -->
            <section id="testimonials" class="section-container">
                <!-- Heading -->
                <div class="section-heading">
                    <span><i class="fa-regular fa-comment-dots"></i> Testimonials</span>
                    <h3>Here's what my clients says !</h3>
                </div>

                <!-- Container -->
                <div class="testimonials-container">
                    <!-- Slider -->
                    <div class="swiper mySwiper" data-aos="fade-up">
                        <div class="swiper-wrapper">
                            <!-- Slide -->
                            <div class="swiper-slide">
                                <!-- Box -->
                                <div class="testimonials-box bg-gradient">
                                    <!-- review -->
                                    <div class="testimonials-review">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Explicabo non dolorem voluptates sed repellat consequatur
                                        odio provident molestias officia. Tenetur.
                                    </p>
                                    <div class="client-profile">
                                        <!-- img -->
                                        <div class="client-profile-img">
                                            <img src="images/c1.jpg" alt="client" />
                                        </div>
                                        <!-- Text -->
                                        <div class="client-profile-text">
                                            <strong>Clayton Ayers</strong>
                                            <span>CTO, Abc co</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Slide End -->
                            <!-- Slide -->
                            <div class="swiper-slide">
                                <!-- Box -->
                                <div class="testimonials-box bg-gradient">
                                    <!-- review -->
                                    <div class="testimonials-review">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Explicabo non dolorem voluptates sed repellat consequatur
                                        odio provident molestias officia. Tenetur.
                                    </p>
                                    <div class="client-profile">
                                        <!-- img -->
                                        <div class="client-profile-img">
                                            <img src="images/c1.jpg" alt="client" />
                                        </div>
                                        <!-- Text -->
                                        <div class="client-profile-text">
                                            <strong>Clayton Ayers</strong>
                                            <span>CTO, Abc co</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Slide End -->
                            <!-- Slide -->
                            <div class="swiper-slide">
                                <!-- Box -->
                                <div class="testimonials-box bg-gradient">
                                    <!-- review -->
                                    <div class="testimonials-review">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Explicabo non dolorem voluptates sed repellat consequatur
                                        odio provident molestias officia. Tenetur.
                                    </p>
                                    <div class="client-profile">
                                        <!-- img -->
                                        <div class="client-profile-img">
                                            <img src="images/c1.jpg" alt="client" />
                                        </div>
                                        <!-- Text -->
                                        <div class="client-profile-text">
                                            <strong>Clayton Ayers</strong>
                                            <span>CTO, Abc co</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Slide End -->
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <!-- Message -->
                <p class="testimonials-message">
                    More than <span>200+ companies </span> trusted me worldwide
                </p>

                <!-- Clients logos -->
                <div class="client-logos">
                    <img src="images/b1.png" alt="logo" />
                    <img src="images/b2.png" alt="logo" />
                    <img src="images/b3.png" alt="logo" />
                    <img src="images/b4.png" alt="logo" />
                </div>
            </section>

            <!-- Contact -->
            <section id="contact" class="section-container">
                <!-- Heading -->
                <div class="section-heading">
                    <span><i class="fa-solid fa-paper-plane"></i> Contact</span>
                    <h3>Let's Got in touch !</h3>
                </div>

                <!-- Container -->
                <div class="contact-box-container">
                    <!-- Box -->
                    <div class="contact-box bg-gradient" data-aos="fade-up">
                        <!-- Icon -->
                        <div class="contact-box-icon">
                            <i class="fa-solid fa-address-book"></i>
                            <strong>Phone</strong>
                        </div>
                        <!-- Details -->
                        <span>+212 6 75 31 72 28</span>
                    </div>
                    <!-- Box -->
                    <div class="contact-box bg-gradient" data-aos="fade-up">
                        <!-- Icon -->
                        <div class="contact-box-icon">
                            <i class="fa-solid fa-envelope"></i>
                            <strong>Address</strong>
                        </div>
                        <!-- Details -->
                        <span>contact@k-jadi.pro</span>
                    </div>
                    <!-- Box -->
                    <div
                        class="contact-box bg-gradient contact-box-location"
                        data-aos="fade-up">
                        <!-- Icon -->
                        <div class="contact-box-icon">
                            <i class="fa-solid fa-map-location-dot"></i>
                            <strong>Location</strong>
                        </div>
                        <!-- Details -->
                        <span>Casablanca, Morocco</span>
                    </div>
                </div>

                <!-- Map -->
                <div class="contact-map" data-aos="fade-up">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3324.7078405481843!2d-7.6442551000000005!3d33.5609664!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sma!4v1747144056322!5m2!1sfr!2sma"
                        width="600"
                        height="450"
                        style="border: 0"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </section>
        </div>
    </div>

    <?php // else:
    ?>
    <!-- <div style="width:100vw; height:100vh;display:flex;align-items:center; justify-content:center;background-color:#000">
            <p style="width:90%;font-size:1rem;text-align:center;font-family:arial;padding:20px;border
        :1px solid #fff;border-radius:15px;color:#fff">
                OOS ...
            </p>
        </div> -->
    <?php // endif;
    ?>


    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="./js/main.js"></script>
</body>

</html>