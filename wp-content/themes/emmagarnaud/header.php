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
    </header>
    <div id="cursor-container">
        <div id="cursor-follower"></div>
    </div>

    <script>
        const cursorFollower = document.getElementById("cursor-follower");
        let prevX = 0;
        let prevY = 0;
        let prevTimestamp = 0;
        let isCursorMoving = false; // Variable to track cursor movement
        let hoverAnimationActive = false; // Variable to track if hover animation is active

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
            const x = event.clientX;
            const y = event.clientY;

            // Vérifier si la souris touche une image ou un lien
            const isTouchingPicture = isCursorTouchingPicture(x, y);

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