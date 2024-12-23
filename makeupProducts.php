<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enchantress | Make-up Products</title>
    <link rel="icon" href="./pictures/Untitled design (18).png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="beautyproduct.css">
</head>
<body>
    <video autoplay muted loop id="bg-video">
        <source src="videos/bgvid.mp4" type="video/mp4">
    </video>
    <div class="navbar">
        <div class="website-logo">
            <a href="3_Website_Homepage.html"><img src="pictures/websitelogo.jpg" alt="Logo"></a>
        </div>
        <ul>
            <div class="nav-links">
                <li><a href="BeautyTips.html">Beauty Tips</a></li>
                <li><a href="#top" onclick="scrollToTop()" id="selected">Skin Care Products</a></li>
            </div>
            <div class="dropdown">
                <a href="javascript:void(0)" class="dropper">Makeup Products<img src="./pictures/down-arrow.png" alt="dropdown" /></a>
                <div class="dropdown-content">
                    <a href="./lipProducts.php" class="choice-link">Lip Products</a>
                    <a href="./hairProducts.php" class="choice-link">Hair Products</a>
                    <a href="./faceProducts.php" class="choice-link">Face Products</a>
                    <a href="./skinProducts.php" class="choice-link">Skin Products</a>
                    <a href="./underarmProducts.php" class="choice-link">Underarm Products</a>
                </div>
            </div>
            <div class="right-links">
                <li><a href="About.html"><i class="fas fa-info-circle"></i> About Us</a></li>
            </div>
        </ul>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dropdown = document.querySelector(".dropdown");
            dropdown.addEventListener("click", function(event) {
                this.querySelector(".dropdown-content").classList.toggle("show");
            });
        });
    </script>

    <div id="lips" class="content-section clearfix"></div>
    <div class="main">
        <div class="main-container">
            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <div class="slideshow-container">
                <?php
            
                $host = 'localhost';
                $dbname = 'qrs'; 
                $user = 'root';   
                $pass = '';     
                try {
                    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                  
                    $stmt = $pdo->prepare("SELECT content, content_picture, description FROM makeup");
                    $stmt->execute();
                    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($products as $product) {
                        echo '
                        <div class="mySlides">
                            <div class="text">
                                <h2>Products for Makeup</h2>
                                <img src="' . htmlspecialchars($product['content_picture']) . '" alt="' . htmlspecialchars($product['content']) . '" class="image">
                                <h4>' . htmlspecialchars($product['content']) . '</h4>
                                <p>' . htmlspecialchars($product['description']) . '</p>
                            </div>
                        </div>';
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                ?>
            </div>
            <a class="next" onclick="plusSlides(1)">❯</a>
        </div>
    </div>

    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function showSlides(n) {
            const slides = document.getElementsByClassName("mySlides");
            if (n > slides.length) slideIndex = 1;
            if (n < 1) slideIndex = slides.length;
            Array.from(slides).forEach((slide, index) => {
                slide.style.display = index === slideIndex - 1 ? "block" : "none";
            });
        }
    </script>
</body>
</html>
