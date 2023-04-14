<script>
    import { getZone, getUser } from "../api/ApiPhp";

    export let trajet = {
        idConducteur: 0,
        idZoneDepart: '',
        idZoneArrivee: '',
        lieuDepart: '',
        lieuArrivee: '',
        numberOfPassengers: 1,
        dateDepart: Date(),
        nbrPassagers: 1,
    }

    export let user = {
        prenom: '',
        email: '',
        phoneNumber: '',
    }

    let zones = [];

    let nomZoneDepart;
    let nomZoneArrivee;

    getZone().then((data) => {
        zones = data;
            zones.forEach(element => {
            if(element.id == trajet.idZoneDepart) {
                nomZoneDepart = element.nom;
            }
            if(element.id == trajet.idZoneArrivee) {
                nomZoneArrivee = element.nom;
            }
        });
    });

    getUser(trajet.idConducteur).then((data) => {
        console.log(data);
        user = data[0];
    })
</script>

<style>
    h1 {
        @apply text-3xl font-bold mb-4 text-center;
    }

    h2 {
        @apply text-2xl font-semibold mb-2 mt-4;
    }

    p {
        @apply text-gray-700;
    }

    span {
        @apply font-bold;
    }
</style>


<div class="bg-white p-6 mx-auto mt-8 shadow-lg rounded-lg w-1/4 text-center">
    <h1>Départ</h1>
    <div>
        <h2><span>Zone de départ : </span>{nomZoneDepart}</h2>
        <p><span>Adresse de départ : </span>{trajet.lieuDepart} <span>le</span> {new Date(trajet.dateDepart).toDateString()}</p>
    </div>
    <h1>Arrivée</h1>
    <div>
        <h2><span>Zone d'arrivée :</span> {nomZoneArrivee}</h2>
        <p><span>Adresse d'arrivée :</span> {trajet.lieuArrivee} <span>le</span> {new Date(trajet.dateArrivee).toDateString()}</p>
    </div>
    <div>
        <h2>Conducteur : {user.prenom} {user.nom}</h2>
        <p><span>E-mail :</span> {user.email}</p>
        <p><span>Numéro de téléphone :</span> {user.telephone}</p>
    </div>
    <br>
    <a class="bg-blue-400 hover:bg-transparent hover:text-blue-400 text-blue-50 border-2 border-blue-400 rounded-md px-3 py-2 font-semibold" href="">Voir plus</a>
    <slot></slot>
</div>

