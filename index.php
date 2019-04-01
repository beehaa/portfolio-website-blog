<?php
if(!empty($_POST["submit"])) {
	$name = $_POST["name"];
	$email = $_POST["email"];
	$subject = $_POST["subject"];
	$content = $_POST["message"];

	$toEmail = "bvotesting@gmail.com";
	$mailHeaders = "From: " . $name . "<". $email .">\r\n";
	if(mail($toEmail, $subject, $content, $mailHeaders)) {
	    $message = "Your contact information is received successfully.";
	    $type = "success";
    }
}
 else {
    $message = "";
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Brian Ha</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/icons/favicon-16x16.png">
    <link rel="manifest" href="/icons/site.webmanifest">
    <link rel="mask-icon" href="/icons/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/icons/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css" />

    <!-- custom sheets -->
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>

</head>

<body>
    <div class="container">

            <nav class="navbar">
                    <!-- <h1 class="logo">Logo</h1> -->
                <ul class="main-nav">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#experience">Experience</a></li>
                    <li><a href="viewblog.php">Blog</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
        <section id="home">
            <header>
                <!-- <h1>Brian Ha</h1> -->

                <!-- insert text to display in typewriter effect -->
                <p class="lead"><a href="" class="typewrite" data-period="2000"
                        data-type='[ "Hello there!","My name is Brian Ha.","Welcome to my personal blog.", "Take a scroll to learn more about me!"]'>
                        <span class="wrap"></span>
                    </a></p>
            </header>
            <!-- scroll arrow -->
            <div class="arrow bounce animated bounceInDown">
                <a class="fa fa-arrow-down fa-2x" href="#about"></a>
            </div>
        </section>

        <section id="about">
            <div class="about-wrapper">

                <div class="box">
                    <div class="inner-box">
                    <article>
                    <h4>Student Organizations</h4>
                        <ul>
                            <li>BCCSS</li>
                            <li>TCO</li>
                            <li>ABCD</li>
                        </ul>
                    </article>
                        
                    </div>
                    <div class="inner-box">
                        <h4>Programming Languages</h4>
                        <ul>
                            <li>Python (Proficient)</li>
                            <li>Java (Proficient)</li>
                            <li>C (Familiar)</li>
                            <li>HTML, CSS, JS (Proficient)</li>
                            <li>PHP (Familiar)</li>
                        </ul>
                    </div>
                    <div class="inner-box">
                        <h4>Interests</h4>
                        <ul>
                            <li>Machine Learning</li>
                            <li>Computational Investing</li>
                            <li>Frontend Development</li>
                        </ul>
                    </div>
                </div>

                <div class="box" id="mid">
                    <div class="inner-box" id="aboutme">
                        <h3>About me</h3>
                        </a></p>
                        <p>I am a junior at Boston College double majoring in economics and computer science. 
                            I am interested in computational finance, software development, and data science. </p>
                        <p>I'm from Worcester, MA.</p>
                    </div>
                    <div class="inner-box" id="education">
                            <h3>Education</h3>
                        <div class="educ">
                            <div class="logo">
                                    <img class="bc" src="img/bc-logo.png" alt="">
                            </div>
                            
                            <div class="info">
                                    <h5>Boston College</h5>
                                    <p>B.A. in Economics and Computer Science</p>
                                    <p>Expected May 2020</p>
                                    <small>IN PROGRESS</small>
                            </div>
                                
                                
                        </div>
                        
                        <br>
                        <div class="educ">
                                <div class="logo">
                                        <img class="qm" src="img/qmul.png" alt="">
                                </div>
                                <div class="info">
                                        <h5>Queen Mary University of London</h5>
                                        <p>Study Abroad Program</p>
                                        <p>Spring 2019</p>
                                </div>
                                
                        </div>
                        
                        
                    </div>
                </div>

                <div class="box">
                    <div class="inner-box">
                        <h4>Hobbies</h4>
                        <ul>
                            <li>Biking</li>
                            <li>CHeckers</li>
                            <li>gardening</li>
                        </ul>
                    </div>
                    <div class="inner-box">
                        <h4>Travel</h4>
                        
                        <p>I love to travel.</p>
                        
                    </div>
                </div>

            </div>
        </section>

        <section id="experience">
            <div class="exp-wrapper"> 
                <header>
                    <h2>Experiences</h2>
                    <p>Summer Internships</p>
                </header>

                <aside class="sidebar-left">
                    <div class="exp" id="top">
                            
                        <h4>Los Angeles, CA</h4>
                        <p>Anticipated June 2019</p>
                    </div>

                    <div class="exp">
                        <h4>Waltham, MA</h4>
                        <p>May 2018 - August 2018</p>
                    </div>
                    <div class="exp">
                            <h4>Boston, MA</h4>
                        <p>June 2017 - August 2017</p>
                        </div>
                </aside>
                <article class="article">
                    <div class="exp" id="top">
                        <h4>PriceWaterhouseCoopers</h4>
                        <i><p>Incoming Technology Consulting Intern</p></i>
                        <br>
                    </div>
                    <div class="exp">
                        <h4>National Grid</h4>
                        <i><p>Business Planning and Performance Intern</p>
                        </i>
                        
                        <br>
                        <p>
                                • Explored clean energy solutions (e.g. renewable natural gas, offshore wind integration) to analyze investment opportunities
                             <br>   • Created Salesforce data validation metrics to track team data input progress and perform frequent data cleanups
                             <br>  • Composed Excel Macros with VBA to track the 10-year Transmission Capital Plan
                             <br>   • Proposed the adoption of drone technology in electric utilities through a comprehensive 30+ page research paper
                        </p>
                    </div>
                    <div class="exp">
                        <h4>State Street Corporation</h4>
                        <i><p>Global Operations Intern</p> </i>
                        
                        <br>
                    <p>
                            • Interacted with clients and vendors to resolve price challenges that arose during high volume pricing window 
                           <br> • Conducted security research and verification to ensure maximum vendor coverage using Bloomberg, Reuters, and IDC
                           <br> • Identified unusual or potentially suspicious transaction activity & escalated in accordance with corporate policy
                           <br> • Monitored availability of prices, indices, and exchange rates to process eight major client funds

                    </p>    
                    </div>
                </article>

                
                <footer>
                    <a href="files/brian-ha.pdf" target="_blank"><i class="far fa-file-pdf"></i> Resume</a>
                </footer>
            </div>
            <!-- <div class="exp1">
                <h3>PriceWaterhouseCoopers</h3>
                <h4>Technology Consulting Intern</h4>
                <h5>Los Angeles, CA</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus voluptas eos error, possimus quo
                    distinctio sed ipsum incidunt sit ex?</p>
            </div>
            <br>
            <div class="exp2">
                <h3>Experience 2</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis, laudantium?</p>
            </div> -->

        </section>

        <section id="contact">
            <div class="form-container">
                    
                    <form id="contact-form" action="<?=htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                            <h3>Shoot me an email.</h3>
                            <br>
                        <label for="name">Name</label> <br>
                        <input type="text" name="name" placeholder="Full Name" required> <br>
                        
                        <label for="email">Email</label> <br>
                        <input type="email" name="email" placeholder="Email Address" required> <br>
                        
                        <label for="subject">Subject</label><br>
                        <input type="text" name="subject" placeholder="Subject Header" required><br>
                        
                        <label for="message">Message</label><br>
                        <textarea name="message" id="message" placeholder="Your message..." required></textarea><br>
                        
                        <?php echo $message; ?>

                        <button type="submit" name="submit" class="btn">Submit</button>
                    </form>
            </div>
        </section>

        <footer>
            
            <div class="icons">
                <a class="fb-ic" target="_blank" href="https://www.facebook.com/brianhha"><i
                        class="fab fa-facebook fa-2x" style="color: white;"> </i></a>
                <a class="gh-ic" target="_blank" href="https://github.com/brianvoha"><i
                        class="fab fa-github fa-lg fa-2x" style="color: white;"> </i></a>
                <a class="li-ic" target="_blank" href="https://www.linkedin.com/in/brian-ha/"><i
                        class="fab fa-linkedin fa-lg fa-2x" style="color: white;"> </i></a>
                <a class="ins-ic" target="_blank" href="https://www.instagram.com/brianhha/"><i
                        class="fab fa-instagram fa-lg fa-2x" style="color: white;"> </i></a>
            </div>
            <small>Copyright &copy; 2019 Brian Ha. All rights reserved.</small>
        </footer>
    </div>
</body>

</html>