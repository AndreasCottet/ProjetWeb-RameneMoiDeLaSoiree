
<script>
    import {getZone, getTrajets} from "../api/ApiPhp.js";

    let zones = [''];
    export let results;

    getZone().then((data) => {
        zones = data;
    });

    let trajet = {
        idZoneDepart: '',
        idZoneArrivee: '',
        dateDepart: '',
        nbrPassagers: '',
    }

    function handleSubmit() 
    {
        console.log(trajet);
        getTrajets(trajet).then((data) => {
            results = data;
        });
    }

</script>
<div class="flex rounded-full bg-gray-100 justify-between p-3 w-full" >
    <div class="flex items-center w-3/12">
        <img src="src/assets/house.png" alt="logo maison">
        <select id="depart" name="depart" bind:value="{trajet.idZoneDepart}">
            <option value="">Départ</option>
            {#each zones as zone}
                <option value="{zone.ID_ZONE}">{zone.NOM}</option>
            {/each}
        </select>
    </div>
    <div class="flex items-center border-l-2 w-3/12">
        <img src="src/assets/house.png" alt="logo maison">
        <select id="arrivee" name="arrivee" bind:value="{trajet.idZoneArrivee}">
            <option value="">Arrivée</option>
            {#each zones as zone}
                <option value="{zone.ID_ZONE}">{zone.NOM}</option>
            {/each}
        </select>
    </div>
    <div class="flex items-center border-l-2 w-3/12">
        <img src="src/assets/calendar.png" alt="logo maison">
        <input type="datetime-local" bind:value="{trajet.dateDepart}"/>
    </div>
    <div class="flex items-center border-l-2 w-1/6">
        <img src="src/assets/people-audience.png" alt="logo de plusieurs personne">
        <input type="number" name="passengers" placeholder="Passagers" min="1" max="4" bind:value="{trajet.nbrPassagers}">
    </div>
    <button class="bg-cyan-500 text-white rounded-r-full px-4 py-2 h-full" on:click="{handleSubmit}">Rechercher</button>
</div>

<style>
    img {
        @apply w-6 h-6 mx-4;
    }

    select, input {
        @apply text-lg font-semibold bg-gray-100 text-black w-full;
    }
</style>

