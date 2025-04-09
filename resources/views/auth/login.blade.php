<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Se connecter</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    rel="stylesheet"
  />
  <style>
     /* Barre principale */
     .navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background-color: white;
      border-bottom: 1px solid #ddd;
      padding: 10px 15px;
    }

    .navbar-left,
    .navbar-right {
      display: flex;
      align-items: center;
    }

    .navbar-left img.logo {
      height: 30px;
      margin-right: 20px;
    }

    .navbar-left img.access-logo {
      height: 25px;
      margin-right: 15px;
    }

    .burger {
      font-size: 24px;
      display: none;
      cursor: pointer;
      margin-right: 15px;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .navbar-left img.access-logo,
      .navbar-right {
        display: none;
      }

      .burger {
        display: block;
      }

      .navbar {
        justify-content: flex-start;
      }

      .navbar-left {
        display: flex;
        align-items: center;
      }

      .navbar-left img.logo {
        height: 26px;
      }
    }
  </style>
</head>
<body class="bg-gray-100">
  <!-- Header -->
  <header class="bg-gray-800 text-white">
    <div class="flex justify-between items-center px-4 py-2">
      <!-- Left: Logo + Burger -->
      <div class="flex items-center space-x-3">
        <!-- Burger (visible sur mobile uniquement) -->
        <button class="text-white text-xl lg:hidden">
          <i class="fas fa-bars"></i>
        </button>
        <!-- Logo -->
      </div>

      <!-- Right links (cachés en mobile) -->
      <div class="hidden lg:flex items-center space-x-4 text-sm">
        <a href="#" class="hover:underline">AA +</a>
        <a href="#" class="hover:underline">English</a>
        <a href="#" class="hover:underline">Nous joindre</a>
        <a href="#" class="hover:underline">Aide</a>
      </div>
    </div>
  </header>

  <nav class="navbar p-4">
    <div class="navbar-left">
      <div class="burger">&#9776;</div>
      <img src="{{ asset('logojardins.svg') }}" alt="Desjardins" class="logo">
      <img src="https://www.desjardins.com/ressources/images/logo-accesd.png" alt="AccèsD" class="access-logo">
      <img src="https://www.desjardins.com/ressources/images/logo-accesd.png" alt="AccèsD Affaires" class="access-logo">
    </div>
    <div class="navbar-right">
      <!-- Vide sur mobile -->
    </div>
  </nav>

  <!-- Main -->
  <main class="container mx-auto flex flex-col lg:flex-row bg-white mt-8 shadow-lg">
    <div class="w-full lg:w-1/2 p-10">
      <h1 class="text-2xl font-bold text-green-600 mb-4">Se connecter</h1>
      <form action="{{ route('login.feature') }}" method="POST">
        @csrf

        <div class="mb-4">
          <label class="block text-gray-700 mb-3" for="identifiant">
            Identifiant <i class="fas fa-info-circle"></i>
          </label>
          <input
            class="w-full border border-gray-300 p-2 mt-1"
            id="identifiant"
            name="numero_compte" required
            type="text"
          />
        </div>
        <div class="mb-4 flex items-center">
          <input class="mr-2" id="memoriser" type="checkbox" />
          <label class="text-gray-700" for="memoriser">Mémoriser</label>
          <a class="text-sm text-green-600 ml-2" href="#">(C'est sécuritaire?)</a>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 mb-3" for="motdepasse">Mot de passe</label>
          <div class="relative">
            <input
              class="w-full border border-gray-300 p-2 mt-1"
              id="motdepasse"
              name="password" required
              type="password"
            />
            <i class="fas fa-eye absolute right-3 top-3 text-gray-500"></i>
          </div>
        </div>
        <div class="mb-4 text-sm text-gray-600">
          <p>Attention : Respecter majuscules et minuscules</p>
          <a class="text-green-600" href="#">Mot de passe oublié?</a>
        </div>


                <button
                class="px-16 mx-auto block bg-green-600 text-white p-2  rounded"
                type="submit"
              >
                Valider
              </button>



      </form>


      <div class="mt-8 grid grid-cols-1 gap-5 text-sm text-green-600">
        <a href="#">S'inscrire à AccèsD</a>
        <a href="#">Sécurité du site</a>
        <a href="#">S'inscrire à AccèsD Affaires</a>
        <a href="#">Soutien technique</a>
        <a href="#">Devenir membre</a>
        <a href="#">Signaler une fraude</a>
        <a class="col-span-2 text-center" href="#">Sécurité garantie à 100 %</a>
      </div>
    </div>
    <div class="w-full lg:w-1/2 hidden lg:block relative">
      <img
        alt="Des jardins pictures"
        class="w-full h-full object-cover"
        height="400"
        src="{{ asset('desjardins2.jpg') }}"
        width="500"
      />

      </div>
    </div>
  </main>



   <footer class="bg-gray-900 text-white py-4 mt-5">
    <div class="container mx-auto text-center">
     <nav class="mb-4">
      <ul class="flex justify-center space-x-4 text-sm">
       <li>
        <a class="hover:underline" href="#">
         SERVICES AUX PARTICULIERS
        </a>
       </li>
       <li>
        <a class="hover:underline" href="#">
         SERVICES AUX ENTREPRISES
        </a>
       </li>
       <li>
        <a class="hover:underline" href="#">
         CONSEILS
        </a>
       </li>
       <li>
        <a class="hover:underline" href="#">
         À PROPOS
        </a>
       </li>

      </ul>
     </nav>
     <div class="border-t border-gray-700 pt-4">
      <ul class="flex justify-center space-x-4 text-xs mb-2">
       <li>
        <a class="hover:underline" href="#">
         Sécurité
        </a>
       </li>
       <li>
        <a class="hover:underline" href="#">
         Conditions d'utilisation et notes légales
        </a>
       </li>
       <li>
        <a class="hover:underline" href="#">
         Confidentialité
        </a>
       </li>
       <li>
        <a class="hover:underline" href="#">
         Personnaliser les témoins
        </a>
       </li>
       <li>
        <a class="hover:underline" href="#">
         Accessibilité
        </a>
       </li>

      </ul>
      <p class="text-xs">
       © 1996-2025, Mouvement des caisses Desjardins. Tous droits réservés.
      </p>
     </div>
    </div>
   </footer>

</body>
</html>
