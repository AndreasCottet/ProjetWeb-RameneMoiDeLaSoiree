<script>
    import { onMount } from 'svelte';
    import { getUser } from '../api/ApiPhp.js';

    export let id;

    let user = {
        prenom: "",
        email: "",
        telephone: "",
    };

    getUser(id).then((data) => {
        user = data[0];
    });
</script>

<style>
    .profile-section {
        margin-bottom: 1rem;
    }

    h1 {
        @apply text-2xl font-semibold mb-4;
    }

    h2 {
        @apply text-xl font-semibold;
    }

    p{
        @apply text-gray-700;
    }
</style>

<div class="p-6 mt-8 text-left w-1/2">
    <h1>Bienvenue de nouveau {user.prenom}😀</h1>
    <div class="profile-section">
        <h2>Prénom</h2>
        <p>{user.prenom}</p>
    </div>
    <div class="profile-section">
        <h2>Nom</h2>
        <p>{user.nom}</p>
    </div>
    <div class="profile-section">
        <h2>E-mail</h2>
        <p>{user.email}</p>
    </div>
    <div class="profile-section">
        <h2>Numéro de téléphone</h2>
        <p>{user.telephone}</p>
    </div>
    <div>
        <div>
            <h2>Mes trajets</h2>
        </div>
        <div>
        </div>
    </div>
    <div class="profile-section text-center">
        <a href="#/user/update/{id}" class="bg-blue-400 hover:bg-transparent hover:text-blue-400 border-2 border-blue-400 text-white font-bold py-2 px-4 rounded">
            Modifier profil
        </a>
    </div>
</div>
