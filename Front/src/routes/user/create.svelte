<script>
    import { postUser } from "../../api/ApiPhp";

    let user = {
        prenom: '',
        nom: '',
        telephone: '',
        email: '',
        password: ''
    }

    let errorMessage = '';

    function handleSubmit() {
        var form_data = new FormData();
        for (var key in user) {
            if(user[key] == '') {
                errorMessage = 'Veuillez remplir tous les champs';
                return;
            }
            form_data.append(key, user[key]);
            errorMessage = '';
        } 

        postUser(form_data).then((response) => {
            if(response) {
                errorMessage = response;
            } else {
                //document.location.href="/"; 
            }
        });
        
    }

</script>

<div class="w-1/3 drop-shadow-lg text-center p-6 space-y-4 md:space-y-6 sm:p-8 border rounded-lg bg-white my-16">
    {#if errorMessage}
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Erreur !</strong>
            <span class="block sm:inline">{errorMessage}</span>
        </div>
    {/if}
    <h1 class="text-2xl font-bold text-black">S'inscrire</h1>
    <input type="hidden" value="etudiant" name="entity">
    <div>
        <label for="prenom">Saisissez votre prénom</label>
        <input class="inputText" type="text" bind:value="{user.prenom}" required>
    </div>
    <div>
        <label for="nom">Saisissez votre nom</label>
        <input class="inputText" type="text" name="nom" bind:value="{user.nom}" required>
    </div>
    <div>
        <label for="telephone">Saisissez votre numéro de téléphone</label>
        <input class="inputText"  type="telephone" name="telephone" bind:value="{user.telephone}" required>
    </div>
    <div>
        <label for="email">Choisissez un email</label>
        <input class="inputText" type="email" name="email" placeholder="name@company.com" bind:value="{user.email}" required>
    </div>
    <div>
        <label for="password">Choisissez un mot de passe</label>
        <input class="inputText"  type="password" name="password" placeholder="••••••••" bind:value="{user.password}" required>
    </div>
    
    <button on:click={handleSubmit} class="hover:bg-transparent hover:text-blue-400">S'inscrire</button>
    <p class="text-sm font-light text-gray-500">
        Vous avez déja un compte ? <a href="#/user/login" class="font-medium text-primary-600 hover:underline text-primary-500">Se connecter</a>
    </p>
</div>

<style>
    .inputText {
        @apply text-gray-900 rounded-lg block w-full p-2.5 bg-white border;
    }

    label {
        @apply block text-left mb-2 font-semibold text-lg text-black;
    }

    button {
        @apply w-full text-white border-2 border-blue-400 bg-blue-400 font-semibold rounded-lg text-sm px-5 py-2.5 text-center;
    }
</style>