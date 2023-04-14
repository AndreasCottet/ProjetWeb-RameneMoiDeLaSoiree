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
        console.log(zones);
        zones.forEach(element => {
            if(element.ID_ZONE == trajet.idZoneDepart) {
                nomZoneDepart = element.NOM;
            }
            if(element.ID_ZONE == trajet.idZoneArrivee) {
                nomZoneArrivee = element.NOM;
            }
        });
    });

    getUser(trajet.idConducteur).then((data) => {
        user = data[0];
        console.log(user)
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


<div class="bg-white p-6 max-w-lg mx-auto mt-8 shadow-lg rounded-lg">
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
        <h2>Conducteur : {user.PRENOM} {user.NOM}</h2>
        <p><span>E-mail :</span> {user.EMAIL}</p>
        <p><span>Numéro de téléphone :</span> {user.TELEPHONE}</p>
    </div>
    <slot></slot>
</div>

