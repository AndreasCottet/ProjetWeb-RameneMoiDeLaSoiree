<script>
    import { onMount } from 'svelte';

    let user = {
        prenom: "",
        email: "",
        phoneNumber: "",
        minibio: "",
    };

    async function fetchUserData() {
        // Simuler l'obtention de données depuis une base de données externe
        const data = {
            prenom: "Lilian",
            email: "liliandocouto63@gmail.com",
            phoneNumber: "0755070088",
            minibio: "Bonjour, je suis nouveau, je pense être agréable, j'aime bien parler bien que je ne mène pas forcément la conversation.",
        };

        user = { ...data };
    }

    onMount(() => {
        fetchUserData();
    });

    function goToModifProfil() {
        // Naviguer vers la page de modification du profil
    }
</script>

<style>
    .profile-section {
        margin-bottom: 1rem;
    }
    .text-xl {
        font-size: 1.25rem;
        font-weight: 700;
    }
    .text-gray-700 {
        color: #4a5568;
    }
    .bg-blue-500 {
        background-color: #4299e1;
    }
    .hover\:bg-blue-700:hover {
        background-color: #2b6cb0;
    }
    .text-white {
        color: #fff;
    }
    .font-bold {
        font-weight: 700;
    }
    .py-2 {
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
    }
    .px-4 {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    .rounded {
        border-radius: 0.25rem;
    }

    h1 {
        @apply text-2xl font-semibold mb-4;
    }

    h2 {
        @apply text-xl font-semibold mb-2;
    }

    p{
        @apply text-gray-700;
    }
</style>

<div class="bg-white p-6 max-w-md mx-auto mt-8 shadow-lg rounded-lg">
    <h1>Profil de {user.prenom}</h1>
    <div class="profile-section">
        <h2>Prénom</h2>
        <p>{user.prenom}</p>
    </div>
    <div class="profile-section">
        <h2>E-mail</h2>
        <p>{user.email}</p>
    </div>
    <div class="profile-section">
        <h2>Numéro de téléphone</h2>
        <p>{user.phoneNumber}</p>
    </div>
    <div class="profile-section">
        <h2>Minibio</h2>
        <p>{user.minibio}</p>
    </div>
    <div class="profile-section text-center">
        <button onclick={goToModifProfil} class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Modifier profil
        </button>
    </div>
</div>
