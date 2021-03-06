<?php
    include 'data/data.php';
    include 'functions/render-services.php';
?>


<?php
    include 'includes/head.php';
?>

<body>
    <?php include 'includes/header.php'; ?>

    <!-- hero -->
    <div id="hero" class="parallax bgr-black">
        <div class="container">
            <div class="Hello">
                <h4>Hello! i'm</h4>
                <h2>Martin Luther</h2>
                <p>WEB DESIGN | DIGITAL MARKETING | UX DESIGN | WEB DEVELOPMENT | MOBILE APPS</p>
                <div class="btn btn-red btn-big">Let's talk new</div>
            </div>
            <i class="fa fa-pencil" data-admin="edit-section" data-section="hero"></i>
        </div>
    </div>

    <!-- about me -->
    <div id="about_me" class="bg-white">
        <div class="container">
            <!-- <div class="cover-pic"> -->
                <img class="img-box" src="assets/img/about/cover_pic.png" alt="cover_photo">
            <!-- </div> -->
            <div class="info-box">
                <h2 class="section-title title-left">About <span>me</span></h2>
                <h3 class="intro"> <span class="caps">h</span class="caps">ello im <span class="caps">m</span>artin <span>l</span>uther</h3>
                <p class="info-paragraph">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro adipisci neque, praesentium, 
                    distinctio cupiditate libero, nesciunt aperiam tenetur magnam veniam nihil asperiores! Nisi saepe magnam veritatis!</p>
                <p class="info-paragraph">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro adipisci neque, praesentium, 
                    distinctio cupiditate libero, nesciunt aperiam tenetur magnam veniam nihil asperiores! Nisi saepe magnam veritatis!</p>
                    <div id="sociali-icona"></div>
                    <div class="btn btn-red about-btn">contact me</div>
                    <div class="btn btn-red about-btn">download cv</div>
                    <!-- <button class="btn btn-red about-btn btn-shadow">contact me</button>
                    <button class="btn btn-red about-btn btn-shadow">contact me</button> -->
            </div>
            <i class="fa fa-pencil" data-admin="edit-section" data-section="about"></i>
        </div>
    </div>

    <!-- my services -->
    <div id="services" class="bg-grey">
        <div class="container">
            <h2 class="section-title"><span>My</span> services</h2>
            <div class="service-list">
                <!-- <div class="service">
                    <i class="fa fa-paint-brush"></i>
                    <h3>Web design</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem, molestias!</p>
                </div> -->
                <?php echo renderServices( $services ) ?>
            </div>
            <i class="fa fa-pencil" data-admin="edit-section" data-section="services"></i>
        </div>
    </div>

    <!-- my resume -->
    <div id="resume" class="bg-white">
        <div class="container">
            <h2 class="section-title"><span>My</span> resume</h2>
                <div class="resume-container">
                    <div class="resume-box">
                        <h4 class="h4">work</h4>
                        <h5 class="h5">Apple</h5>
                        <p class="text-date"> OCT 2015 - JUNE 2016</p>
                        <p class="text">Lorem ipsum dolor sit amet.</p>
                        <h5 class="h5">GOOGLE</h5>
                        <p class="text-date"> OCT 2016 - JUNE 2017</p>
                        <p class="text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia deleniti a commodi asperiores, adipisci nostrum itaque iure, excepturi sint saepe autem.</p>
                    </div>
                    <div class="resume-box">
                        <h4 class="h4">education</h4>
                        <h5 class="h5">university</h5>
                        <p class="text-date"> OCT 2010 - JUNE 2013</p>
                        <p class="text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem, molestias!</p>
                        <h5 class="h5">design and art</h5>
                        <p class="text-date"> OCT 2013 - JUNE 2015</p>
                        <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt aperiam dolore distinctio consequuntur doloribus error illo quibusdam blanditiis dolores, voluptatum similique sint at dicta non.</p>
                    </div>  
                </div>
                <i class="fa fa-pencil" data-admin="edit-section" data-section="resume"></i>
            </div>
        </div>
    </div>

    <!-- freelance -->
    <div id="freelance" class="bg-red">
        <div class="container">
            <h2 class="freelance-type">I am Available for Freelance</h2>
            <div class="btn-wrapper">
                <button class="btn btn-white">hire me now</button>
            </div>
            <i class="fa fa-pencil" data-admin="edit-section" data-section="freelance"></i>
        </div>
    </div>

    <!-- my portfolio -->
    <div id="portfolio" class="bg-white">
        <div class="container">
            <h2 class="section-title"><span>My</span> portfolio</h2>
            <div class="gallery">
                <div class="gallery-filter">
                    <!-- <div class="active">All</div>
                    <div>apps</div> -->
                </div>
                <div class="gallery-list">
                    <script id="portfolio_item_template" type="text/template">
                        <div class="gallery-item">
                            <img src="assets/img/portfolio/{{photo}}" alt="">
                            <div class="black"></div>
                            <div class="texts">
                                <div class="title">{{title}}</div>
                                <div class="tag btn btn-red btn-small">{{tag}}</div>
                            </div>
                        </div>
                    </script>
                </div>
            </div>
            <i class="fa fa-pencil" data-admin="edit-section" data-section="portfolio"></i>
        </div>
    </div>

    <!-- testimonials -->
    <div id="testimonials" class="bg-grey">
        <div class="container">
            <div class="testimonials-list">
                <div class="drag-layer"></div>
            </div>
            <div class="centered-text">
                <div id="go-left" class="fa fa-chevron-left btn"></div>
                <div id="go-right" class="fa fa-chevron-right btn"></div>
            </div>
            <i class="fa fa-pencil" data-admin="edit-section" data-section="testimonials"></i>
        </div>
    </div>

    <!-- my blog -->
    <div id="blog" class="bg-white">
        <div class="container">
            <h2 class="section-title"><span>My</span> blog</h2>
            <div class="blog-list">
                <!-- <div class="blog">
                    <div class="img"></div>
                    <h3>Web design</h3>
                    <div class="date">Posted on 25th Oct 2018</div>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem, molestias...</p>
                    <a href="#" class="btn btn-red">Read more</a>
                </div> -->
            </div>
            <i class="fa fa-pencil" data-admin="edit-section" data-section="blog"></i>
        </div>
    </div>

    <!-- contact me -->
    <div id="contact_me" class="bg-grey">
        <div class="container">
            <h2 class="section-title">Contact <span>me</span></h2>
            <form id="contact-form">
                <div class="form-row">
                    <input class="float-left" type="text" placeholder="Name">
                    <input class="float-right" type="email" placeholder="Email">
                </div>
                <div class="form-row">
                    <input class="float-left" type="tel" placeholder="Number">
                    <input class="float-right" type="url" placeholder="Website">
                </div>
                <div class="form-row">
                    <textarea name="" id="" cols="30" rows="6" placeholder="Your message"></textarea>
                </div>
                <div class="form-row">
                    <span class="btn btn-red btn-flatter">Send message</span>
                </div>
            </form>
            <div id="contact-info-list"></div>
            <!-- <div class="contact-info">
                <i class="fa fa-envelope"></i>
                <h4>Adress:</h4>
                <p>123 6th St.</p>
                <p>Melbourne, FL 32904, USA</p>
            </div> -->
            <i class="fa fa-pencil" data-admin="edit-section" data-section="footer"></i>
        </div>
    </div>

    <?php
        include 'includes/footer.php';
        include 'includes/admin-editor.php';
        include 'includes/footer-scripts.php';
    ?>
</body>
</html>
