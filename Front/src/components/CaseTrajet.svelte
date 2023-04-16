<script>
    import { getZone, getUser, getTrajetById, getLieu } from "../api/ApiPhp";
    const optionsDate = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };

    export let trajet = {
        id: 0,
        idConducteur: -1,
        idLieuDepart: '',
        idLieuArrivee: '',
        dateDepart: Date(),
        nbrPassagers: 1,
    }

    export let user = {
        prenom: '',
        email: '',
        phoneNumber: '',
    }

    let lieux = [];

    let lieuDepart = {
        nom: ''
    };
    let lieuArrivee = lieuDepart;

    getLieu().then((data) => {
        lieux = data;
        lieux.forEach(element => {
            if(element.id == trajet.idLieuDepart) {
                lieuDepart = element;
            }
            if(element.id == trajet.idLieuArrivee) {
                lieuArrivee = element;
            }
        });
    });

    getUser(trajet.idConducteur).then((data) => {
        console.log(data);
        user = data[0];
    })

</script>


<div class="w-1/4 p-4 bg-white rounded-3xl shadow-md">
    <h1>Départ: </h1>
    <div class="flex gap-4">
        <img src="src/assets/house.png" alt="Logo maison">
        <h2>{lieuDepart.nom}</h2>
    </div>
    <h1>Arrivée:</h1>
    <div class="flex gap-4">
        <img src="src/assets/house.png" alt="Logo maison">
        <h2>{lieuArrivee.nom}</h2>
    </div>
    <h1>Date:</h1>
    <div class="flex gap-4">
        <img src="src/assets/calendar.png" alt="Logo d'une calendrier">
        <h2>{new Date(trajet.dateDepart).toLocaleDateString('fr-FR', optionsDate)}</h2>
    </div>
    <h1>Place Restante:</h1>
    <div class="flex gap-4">
        <img src="src/assets/people-audience.png" alt="Logo de plusieurs personnes">
        <h2>{trajet.nbrPassagers}</h2>
    </div>
    <h1>Proposé Par:</h1>
    <div class="flex gap-4">
        <h2>{user.prenom}</h2>
    </div>
    <a href="#/trajet/view/{trajet.id}" class="hover:bg-transparent border-2 border-blue-400 text-white bg-blue-400 rounded-lg px-2 py-3 justify-center align-middle hover:text-blue-400 w-full gap-4 flex">  
        <svg aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-6">
            <path d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>          
        <p class="font-bold">Voir plus</p>
    </a>
</div>

<style>
    h1
    {
        @apply text-xl font-bold text-left mb-1;
    }
    h2
    {
        @apply text-gray-900 text-lg text-left flex-auto mb-3;
    }
    img
    {
        @apply w-7 h-7;
    }

    button
    {
        @apply border-4 border-blue-400 rounded-2xl bg-blue-400 text-white font-semibold pl-16 pr-16 flex gap-4;
    }

</style>
