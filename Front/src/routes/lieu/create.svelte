<script>
    import { onMount } from "svelte";
    import { getZone, postLieu } from "../../api/ApiPhp";

    let lieu = {
        nom: '',
        adresse: '',
        idZone: ''
    }

    let zone = [];

    onMount(() => {
        getZone().then((data) => {
            zone = data
        })
    })

    function submitLieu() {
        var form_data = new FormData();
        for (let key in lieu ) {
            if(lieu[key] == '') {
                errorMessage = "Veuillez saisir tous les champs"
                return
            }
            form_data.append(key, lieu[key]);
        }
        postLieu(form_data).then((data) => {
            document.location.href = "#/trajet/create";
        })
    }

    let errorMessage;
</script>

<div class="text-center w-2/3">
    {#if errorMessage}
        <div class="bg-red-100 border border-red-400 text-red-700 mb-8 px-4 py-3 rounded relative w-full mt-10" role="alert">
            <strong class="font-bold">Erreur !</strong>
            <span class="block sm:inline">{errorMessage}</span>
        </div>
    {/if}
    <div class="w-full text-left">
        <h1 class="text-3xl font-bold text-center mb-10 mt-8">Créer un nouveau lieu</h1>

        <label class="mt-12" for="nom">Saisissez le nom du lieu</label>
        <input name="nom" class="inputUser" type="text" bind:value={lieu.nom} required>

        <label for="adresse">Saisissez l'adresse du lieu</label>
        <input name="adresse" class="inputUser" type="text" bind:value={lieu.adresse} required>

        <label for="adresse">Saisissez la zone du lieu</label>
        <select bind:value="{lieu.idZone}" class="inputUser" name="zone" required>
            <option value="">Zone de départ</option>
            {#each zone as lieu}
                <option value="{lieu.id}">{lieu.nom}</option>
            {/each}
        </select>
        <button on:click={submitLieu}>Créer un nouveau lieu</button>
    </div>
</div>
    

<style>
    label {
        @apply font-semibold text-xl mt-10 text-gray-600;
    }
    .inputUser {
        @apply border w-full border-gray-300 rounded-lg bg-gray-100 h-16 text-2xl pl-4 mt-2 mb-8 ;
    }
    input {
        @apply w-full bg-gray-100 rounded-lg;
    }
    button {
        @apply bg-blue-400 text-white border-blue-400 border-2 rounded-xl text-lg font-semibold px-6 py-3;
    }

    button:hover {
        @apply bg-transparent text-blue-400;
    }
</style>