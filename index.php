<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Trim and fetch POST values
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    if (!empty($name) && !empty($email) && !empty($message)) {
        // Basic escaping to avoid syntax errors; consider using prepared statements
        $name_esc = mysqli_real_escape_string($con, $name);
        $email_esc = mysqli_real_escape_string($con, $email);
        $message_esc = mysqli_real_escape_string($con, $message);

        $query = "INSERT INTO form (name, email, textarea) VALUES ('$name_esc', '$email_esc', '$message_esc')";
        if (mysqli_query($con, $query)) {
            echo "<script type=\"text/javascript\">alert('Your message has been sent successfully!');</script>";
        } else {
            // Show a simple error (avoid exposing DB details in production)
            echo "<script type=\"text/javascript\">alert('Failed to send message. Please try again later.');</script>";
        }
    } else {
        echo "<script type=\"text/javascript\">alert('Please fill all the fields');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset ="UTF-8">
        <meta http-equiv="X-UA-Compatible" content ="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer">
        <title> Portfolio </title>
    </head>
    <body>  
        <nav>
            <div class="left">
                <a href="/">MY PORTFOLIO</a>
            </div>
            <div class="right">
                <a href="http://github.com" target="_blank" rel="noopener noreferrer">
                <i class="fa-brands fa-github"></i>
                <span> GitHub </span></a>
                <a href="https://www.linkedin.com/in/thanniru-likhitha-706b01348?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i class="fa-brands fa-linkedin"></i>
                <span>Linkedin</span></a>
                <a href="mailto:thannirulikhitha587@gmail.com"><i class="fa-solid fa-envelope"></i>
                <span>Email</span></a>
            </div>

        </nav>
        <!-- section 1-->
        <section class="hero-section">
            <div class="text">
                <h2>HI,I'M LIKHITHA 👋</h2>
                <P>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis asperiores quaerat porro tempora fuga incidunt ex esse quo quod, animi, rerum nisi! Dolorem repellendus beatae consequatur excepturi ratione. Aperiam, nostrum.</P>
                <div class="links">
                    <a href="#skills">
                        <i class="fa-solid fa-code"></i>
                    <span> Skills</span>
                    </a>
                     <a href="#testimony">
                        <i class="fa-solid fa-pencil"></i>
                    <span>Testimony</span>
                    </a>
                     <a href="#contact">
                        <i class="fa-solid fa-circle-user"></i>
                    <span>Contact</span>
                    </a>
                </div>
            </div> 
            <div class="headshot">
                <img src="mee.jpeg" alt="headshot">
            </div>
        </section>
        <!--section 2-->
         <section id="skills" class ="skill-section">
            <h2>Skills</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum amet accusantium neque saepe. Sint magnam natus porro amet id tempora? Esse reprehenderit commodi quibusdam non dignissimos hic optio, placeat eos.</p>
            <div class="cells">
            <div class="cell">
                <img src="html.png" alt="html logo">
                <span>HTML5</span>
            </div>
              <div class="cell">
                <img src="css.png" alt="css logo">
                <span>CSS</span>
            </div>
              <div class="cell">
                <img src="js.png" alt="javascript logo">
                <span>Javascript</span>
            </div>
                </div>
            </section>
            <!--section 3-->
            <section id="testimony" class="testimony-section" >
                <h2>Testimony</h2>
                <div class="group">
                <div class="person-details">
                <img src="testimony.png" alt="person1">
                <p>USER:</p>
                </div>
                <div class="text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit sapiente consectetur quas minima, quis provident nemo et nostrum dolore animi eaque vero atque necessitatibus facere ipsa esse, commodi veritatis aut.</p>

                </div>
                </div>
            </section>
                <!--section 4-->
                <section id="contact" class="contact-section">
                    <h2>Contact</h2>
                    <div class="group">
                    <div class="text">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorum itaque obcaecati accusantium consequuntur tempore dolores quia reprehenderit totam eligendi quas pariatur, odio tempora cum laboriosam ea molestiae, ipsam aliquid recusandae.
                    </div>
                    <form action="index.php" id="contactform" method="post">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                        <label for="message">Message</label>
                        <textarea id="message" name="message" cols="30" rows="10" required></textarea>
                        <button type="submit">Send</button>
                    </form>
                
            </section>
    </body>
</html>