
<script>
    import {getTrajets, getLieu} from "../../api/ApiPhp.js";
    import CaseTrajet from "../../components/CaseTrajet.svelte";

    let lieux = [];
    let results = [];

    getLieu().then((data) => {
        lieux = data;
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
    handleSubmit();

</script>
<div class="flex flex-col w-full items-center justify-center text-center mt-10">
    <div class="flex rounded-full bg-gray-100 justify-center items-center p-3 w-3/4" >
        <div class="flex items-center w-3/12">
            <img src="src/assets/house.png" alt="logo maison">
            <select id="depart" name="depart" bind:value="{trajet.idZoneDepart}">
                <option value="">Départ</option>
                {#each lieux as lieu}
                    <option value="{lieu.id}">{lieu.nom}</option>
                {/each}
            </select>
        </div>
        <div class="flex items-center border-l-2 w-3/12">
            <img src="src/assets/house.png" alt="logo maison">
            <select id="arrivee" name="arrivee" bind:value="{trajet.idZoneArrivee}">
                <option value="">Arrivée</option>
                {#each lieux as lieu}
                    <option value="{lieu.id}">{lieu.nom}</option>
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
        <button class="bg-blue-400 text-white rounded-r-full px-4 py-2 h-full" on:click="{handleSubmit}">Rechercher</button>
    </div>

    {#if results.length}
    <div class="w-10/12">
        <h1 class="text-3xl font-bold mt-10 text-left">Résultats :</h1>
        <div class="flex flex-wrap gap-10 mt-2">
        {#each results as trajet}
            <CaseTrajet trajet={trajet}/>
        {/each}
        </div>
    </div>
    {/if}
</div>

<style>
    img {
        @apply w-6 h-6 mx-4;
    }

    select, input {
        @apply text-lg font-semibold bg-gray-100 text-black w-full;
    }
</style>

