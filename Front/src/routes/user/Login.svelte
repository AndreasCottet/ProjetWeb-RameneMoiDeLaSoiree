<script>
    import { connectUser } from "../../api/ApiPhp";

    let user = {
        email: '',
        password: '',
    };

    export let errorMessage = '';

    if(document.cookie.includes('userId')) {
        document.location.href="#/"
    }

    function handleSubmit()
    {
        if (user.email == '' || user.password == '') {
            throw new Error('Veuillez remplir tous les champs');
        }
        connectUser(user).then((data) => {
            console.log(data);
            setCookie('userId', data, 1)
            document.location.href="#/"
            document.location.reload()
        }).catch((error) => {
            errorMessage = error.response.data.error
        });
    }

    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        let expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
</script>

<div class="w-1/4 p-6 space-y-4 md:space-y-6 sm:p-8 rounded-lg drop-shadow-lg border mt-20 bg-white">
    <h1 class="text-3xl font-bold text-black">Se connecter</h1>
    <!-- <input type="hidden" value="etudiant" name="entity"> -->
    {#if errorMessage}
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Erreur !</strong>
            <span class="block sm:inline">{errorMessage}</span>
        </div>
    {/if}
    <div>
        <label for="email">Saisissez votre email</label>
        <input class="inputText" type="email" bind:value={user.email} placeholder="andreas.cottet@enseirb-matmeca.fr" required>
    </div>
    <div>
        <label for="password">Saisissez votre mot de passe</label>
        <input class="inputText"  type="password" bind:value={user.password} placeholder="••••••••" required>
    </div>
    <button on:click={handleSubmit} class="hover:bg-transparent hover:text-blue-400">Se connecter</button>
    <p class="text-sm font-light text-gray-500">
        Vous n'avez pas de compte ? <a href="#/user/create" class="font-medium text-primary-600 hover:underline text-primary-500">S'inscrire</a>
    </p>
</div>

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