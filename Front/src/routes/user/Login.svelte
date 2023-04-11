<form class="w-1/4 p-6 space-y-4 md:space-y-6 sm:p-8 rounded-lg drop-shadow-lg border mt-20 bg-white" method="GET" action="http://127.0.0.1/api/connect.php">
    <h1 class="text-xl font-bold text-black">Se connecter</h1>
    <input type="hidden" value="etudiant" name="entity">
    <div>
        <label for="email">Choisissez un email</label>
        <input class="inputText" type="email" name="email" placeholder="name@company.com" required="">
    </div>
    <div>
        <label for="password">Choisissez un mot de passe</label>
        <input class="inputText"  type="password" name="password" placeholder="••••••••" required="">
    </div>
    <button type="submit" class="hover:bg-transparent hover:text-blue-400">Se connecter</button>
    <p class="text-sm font-light text-gray-500">
        Vous n'avez pas de compte ? <a href="#/user/create" class="font-medium text-primary-600 hover:underline text-primary-500">S'inscrire</a>
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

    button {
        @apply w-full text-white border-2 border-blue-400 bg-blue-400 font-semibold rounded-lg text-sm px-5 py-2.5 text-center;
    }
</style>