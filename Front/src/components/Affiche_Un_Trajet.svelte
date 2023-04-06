<script>
    import { onMount } from 'svelte';

    let date, zone1, zone2, depart, arrivee, depart_Heure, arrivee_Heure;
    let user = {
        prenom: "",
        email: "",
        phoneNumber: "",
        minibio: "",
    };

    async function fetchData() {
        // Simuler l'obtention de données depuis une base de données externe
        const data = {
            date: "2023-04-05",
            zone1: "Campus A",
            depart: "Rue de la poupé qui tousse",
            zone2: "Campus B",
            arrivee: "Gare de Lyon",
            depart_Heure: "14:00",
            arrivee_Heure: "14:30",
            user: {
                prenom: "Lilian",
                email: "liliandocouto63@gmail.com",
                phoneNumber: "0755070088",
                minibio: "Bonjour, je suis nouveau, je pense être agréable, j'aime bien parler bien que je ne mène pas forcément la conversation.",
            },
        };

        date = data.date;
        zone1 = data.zone1;
        zone2 = data.zone2;
        depart = data.depart;
        arrivee = data.arrivee;
        depart_Heure = data.depart_Heure;
        arrivee_Heure = data.arrivee_Heure;
        user = { ...data.user };
    }

    onMount(() => {
        fetchData();
    });

    function valider() {
        // Envoyer des données à la base de données
        // Passer à une autre page
    }
</script>

<style>
    h1 {
        @apply text-3xl font-bold mb-4 text-center;
    }

    h2 {
        @apply text-2xl font-semibold mb-2 mt-4;
    }

    h3 {
        @apply text-lg font-medium mb-1;
    }

    p {
        @apply text-gray-700;
    }

    span {
        @apply font-bold;
    }




</style>

<div class="bg-white p-6 max-w-lg mx-auto mt-8 shadow-lg rounded-lg">
    <h1>{date}</h1>
    <h2>Départ</h2>
    <div class="profile-section">
        <h3><span>Zone :</span> {zone1}</h3>
        <p><span>Adresse :</span> {depart} <span>à</span> {depart_Heure}</p>
    </div>
    <h2>Arrivée</h2>
    <div class="profile-section">
        <h3><span>Zone :</span> {zone2}</h3>
        <p><span>Adresse :</span> {arrivee} <span>à</span> {arrivee_Heure}</p>
    </div>
    <div class="profile-section">
        <h2>Profil de {user.prenom}</h2>
        <p><span>E-mail :</span> {user.email}</p>
        <p><span>Numéro de téléphone :</span> {user.phoneNumber}</p>
        <p><span>Minibio :</span> {user.minibio}</p>
    </div>
    <div class="flex justify-center mt-6">
        <button onclick={valider} class="bg-green-600 text-white font-semibold py-2 px-4 rounded-md shadow-md hover:bg-green-800">
            Valider
        </button>
    </div>
</div>

