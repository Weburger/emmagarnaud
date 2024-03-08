<html>

<head>
    <meta charset='utf-8'>
    <title><?php bloginfo('name'); ?></title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content=''>
    <meta name="robots" content="follow" />

    <?php wp_head(); ?>
</head>
<body>
    <header>
        <h2>emma <strong>garnaud</strong></h2>
        <nav>
            <?php wp_nav_menu(['theme-location' => 'main-menu']); ?>
        </nav>
        <svg onclick=openBurger() id="burger" width="33" height="34" viewBox="0 0 33 34" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="ico / 24 / ui / menu_hamburger">
                <path id="Icon color" fill-rule="evenodd" clip-rule="evenodd" d="M28.1875 10.125H4.8125C4.4328 10.125 4.125 9.8172 4.125 9.4375V8.0625C4.125 7.6828 4.4328 7.375 4.8125 7.375H28.1875C28.5672 7.375 28.875 7.6828 28.875 8.0625V9.4375C28.875 9.8172 28.5672 10.125 28.1875 10.125ZM28.875 17.6875V16.3125C28.875 15.9328 28.5672 15.625 28.1875 15.625H4.8125C4.4328 15.625 4.125 15.9328 4.125 16.3125V17.6875C4.125 18.0672 4.4328 18.375 4.8125 18.375H28.1875C28.5672 18.375 28.875 18.0672 28.875 17.6875ZM28.875 24.5625V25.9375C28.875 26.3172 28.5672 26.625 28.1875 26.625H4.8125C4.4328 26.625 4.125 26.3172 4.125 25.9375V24.5625C4.125 24.1828 4.4328 23.875 4.8125 23.875H28.1875C28.5672 23.875 28.875 24.1828 28.875 24.5625Z" fill="black"/>
            </g>
        </svg>
        <div id="sidenav" class="sidenav">
            <nav>
                <?php wp_nav_menu(['theme-location' => 'main-menu']); ?>
            </nav>
            <div>
                <svg onclick=closeBurger() width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M32.0998 27.84C32.3522 28.0904 32.4942 28.4312 32.4942 28.7867C32.4942 29.1422 32.3522 29.483 32.0998 29.7333L30.2331 31.6C29.9827 31.8524 29.642 31.9944 29.2864 31.9944C28.9309 31.9944 28.5901 31.8524 28.3398 31.6L16.4998 19.76L4.65977 31.6C4.40941 31.8524 4.06862 31.9944 3.7131 31.9944C3.35759 31.9944 3.01679 31.8524 2.76644 31.6L0.899769 29.7333C0.647352 29.483 0.505371 29.1422 0.505371 28.7867C0.505371 28.4312 0.647352 28.0904 0.899769 27.84L12.7398 16L0.899769 4.16001C0.647352 3.90966 0.505371 3.56886 0.505371 3.21335C0.505371 2.85783 0.647352 2.51704 0.899769 2.26668L2.76644 0.400013C3.01679 0.147596 3.35759 0.00561523 3.7131 0.00561523C4.06862 0.00561523 4.40941 0.147596 4.65977 0.400013L16.4998 12.24L28.3398 0.400013C28.5901 0.147596 28.9309 0.00561523 29.2864 0.00561523C29.642 0.00561523 29.9827 0.147596 30.2331 0.400013L32.0998 2.26668C32.3522 2.51704 32.4942 2.85783 32.4942 3.21335C32.4942 3.56886 32.3522 3.90966 32.0998 4.16001L20.2598 16L32.0998 27.84Z" fill="black"/>
                </svg>
            </div>
        </div>
    </header>


    <div id="cursor-follower"></div>


    <script>
        function openBurger(){
            document.getElementById("sidenav").style.top = 0
        }

        function closeBurger(){
            document.getElementById("sidenav").style.top = "-100vh"
        }

        const cursorFollower = document.getElementById("cursor-follower");
        let prevX = 0;
        let prevY = 0;
        let prevTimestamp = 0;
        let isCursorMoving = false; // Variable to track cursor movement
        let hoverAnimationActive = false; // Variable to track if hover animation is active

        let verticalScrollPosition = 0; // Initialize the variable to store the scroll position

        window.addEventListener('scroll', function() {
            verticalScrollPosition = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;
            console.log("Vertical scroll position: " + verticalScrollPosition);
        });

        const colors = [
            "#FF3D00",
            "#FBFC00",
            "#034ECE",
            "#F20067",
            "#02FB0B",
            "#4700A2"
        ];
        let isCursorInsideImage = false;

        // Écouteur d'événement pour le mouvement de la souris
        document.addEventListener("mousemove", (event) => {
            const x = event.pageX;
            const y = event.pageY;

        // Fonction pour mettre à jour la position de la souris
            function updateCursorPosition(event) {
                const x = event.pageX;
                const y = event.pageY;
            }

            // Vérifier si la souris touche une image ou un lien
            const isTouchingPicture = isCursorTouchingPicture(x, y-verticalScrollPosition);

            // Calcul de la vitesse du mouvement
            const speed = calculateSpeed(x, y);

            // Dimension de base pour le follower, taille à adopter quand on passe sur une image
            const baseDimension = isTouchingPicture ? 200 : 40;
            const growFactor = baseDimension / 40;
            const slowDownFactor = 0.1; // Ajuster le facteur pour un mouvement plus lent

            // Calcul de l'échelle en fonction de la vitesse
            const scale = Math.min(growFactor, 1 - speed * slowDownFactor);

            // Mise à jour de la taille du follower
            cursorFollower.style.width = `${baseDimension * scale}px`;
            cursorFollower.style.height = `${baseDimension * scale}px`;

            // Si la souris touche une image ou un lien et n'était pas à l'intérieur auparavant, changer la couleur
            if (isTouchingPicture && !isCursorInsideImage) {
                cursorFollower.style.backgroundColor = getRandomColor();
                isCursorInsideImage = true;
            } else if (!isTouchingPicture) {
                isCursorInsideImage = false;
            }

            // Si la souris bouge, désactiver l'animation de survol
            if (x !== prevX || y !== prevY) {
                cursorFollower.style.animation = "unset";
                isCursorMoving = true;
                hoverAnimationActive = false; // Reset hover animation flag
            } else {
                // Si la souris ne bouge pas et elle était en mouvement précédemment
                if (isCursorMoving) {
                    // Réinitialiser la position du follower à la position actuelle de la souris
                    cursorFollower.style.transform = `translate(${x}px, ${y}px) translate(-50%, -50%)`;
                    isCursorMoving = false; // Indiquer que la souris est maintenant immobile
                }
                // Activer l'animation de survol uniquement si elle n'est pas déjà active
                if (!hoverAnimationActive) {
                    cursorFollower.style.animation = "hoverAnimation 2s infinite alternate";
                    hoverAnimationActive = true; // Set hover animation flag
                }
            }

            // Facteur d'élasticité pour un mouvement élastique
            const elasticFactor = 0.3;
            const elasticX = prevX + (x - prevX) * elasticFactor;
            const elasticY = prevY + (y - prevY) * elasticFactor;

            // Définir la position du suiveur avec élasticité
            cursorFollower.style.transform = `translate(${elasticX}px, ${elasticY}px) translate(-50%, -50%)`;

            // Mettre à jour les valeurs précédentes
            prevX = elasticX;
            prevY = elasticY;
            prevTimestamp = Date.now();
        });



        // Fonction pour calculer la vitesse du mouvement
        function calculateSpeed(newX, newY) {
            const distance = Math.sqrt((newX - prevX) ** 2 + (newY - prevY) ** 2);
            const timeDiff = Date.now() - prevTimestamp;
            return distance / timeDiff;
        }

        // Fonction pour vérifier si la souris touche une image ou un lien
        function isCursorTouchingPicture(x, y) {
            const imagesAndLinks = document.querySelectorAll("img, a"); // Select all images and links
            for (let element of imagesAndLinks) {
                const rect = element.getBoundingClientRect();
                if (
                    x >= rect.left &&
                    x <= rect.right &&
                    y >= rect.top &&
                    y <= rect.bottom
                ) {
                    return true;
                }
            }
            return false;
        }

        // Fonction pour obtenir une couleur aléatoire
        function getRandomColor() {
            const randomIndex = Math.floor(Math.random() * colors.length);
            return colors[randomIndex];
        }
    </script>
</body>