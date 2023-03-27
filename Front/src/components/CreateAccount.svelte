<form class="p-6 space-y-4 md:space-y-6 sm:p-8 border rounded-lg border-slate-500 bg-white" method="POST" action="http://127.0.0.1/api/insert.php">
    <h1 class="text-xl font-bold text-black">S'inscrire</h1>
    <input type="hidden" value="etudiant" name="entity">
    <div>
        <label for="prenom">Votre prenom</label>
        <input class="inputText" type="text" name="prenom" required="">
    </div>
    <div>
        <label for="nom">Votre nom</label>
        <input class="inputText" type="text" name="nom"  required="">
    </div>
    <div>
        <label for="telephone">Votre numéro de téléphone</label>
        <input class="inputText"  type="telephone" name="telephone" required="">
    </div>
    <div>
        <label for="sexe">Votre sexe</label>
        <input class="inputText"  type="radio" name="sexe" required="" value="H">
        <input class="inputText"  type="radio" name="sexe" required="" value="F">
    </div>
    <div>
        <label for="email">Choisissez un email</label>
        <input class="inputText" type="email" name="email" placeholder="name@company.com" required="">
    </div>
    <!-- <div>
        <label for="email">Confirmer votre email</label>
        <input class="inputText" type="email" name="email" placeholder="name@company.com" required="">
    </div> -->
    <div>
        <label for="password">Choisissez un mot de passe</label>
        <input class="inputText"  type="password" name="password" placeholder="••••••••" required="">
    </div>
    <!-- <div>
        <label for="verifyPassword">Confirmer votre mot de passe</label>
        <input class="inputText"  type="password" name="verifyPassword" placeholder="••••••••" required="">
    </div> -->
    
    <input type="submit" class="w-full text-white bg-[#46CDF8] hover:bg-primary-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center" value="S'inscrire"/>
    <p class="text-sm font-light text-gray-500">
        Vous avez déja un compte ? <a href="#" class="font-medium text-primary-600 hover:underline text-primary-500">Se connecter</a>
    </p>
</form>
    
<script>
    
</script>

<style>
    .inputText {
        @apply text-gray-900 rounded-lg block w-full p-2.5 bg-white border;
    }

    label {
        @apply block text-left mb-2 text-black;
    }
</style>