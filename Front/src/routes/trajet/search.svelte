
<script>
    import { empty } from "svelte/internal";
    import {getZone, getTrajets} from "../../api/ApiPhp.js";
    import AfficheUnTrajet from "../../components/Affiche_Un_Trajet.svelte";

    let zones = [''];
    let results = [];

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
        getTrajets(trajet).then((data) => {
            console.log(data);
            results = data;
        });
        console.log(results)
    }

</script>
<div class="flex rounded-full bg-gray-100 justify-between p-3 w-full" >
    <div class="flex items-center w-3/12">
        <img src="src/assets/house.png" alt="logo maison">
        <select id="depart" name="depart" bind:value="{trajet.idZoneDepart}">
            <option value="">Départ</option>
            {#each zones as zone}
                <option value="{zone.id}">{zone.nom}</option>
            {/each}
        </select>
    </div>
    <div class="flex items-center border-l-2 w-3/12">
        <img src="src/assets/house.png" alt="logo maison">
        <select id="arrivee" name="arrivee" bind:value="{trajet.idZoneArrivee}">
            <option value="">Arrivée</option>
            {#each zones as zone}
                <option value="{zone.id}">{zone.nom}</option>
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
<div class="flex flex-wrap gap-10 w-10/12 items-center justify-center">
    {#each results as trajet}
        <AfficheUnTrajet trajet={trajet}/>
    {/each}
</div>

<style>
    img {
        @apply w-6 h-6 mx-4;
    }

    select, input {
        @apply text-lg font-semibold bg-gray-100 text-black w-full;
    }
</style>

