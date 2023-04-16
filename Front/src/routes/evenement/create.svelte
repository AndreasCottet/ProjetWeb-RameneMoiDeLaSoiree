<script>
    import { postEvenement } from "../../api/ApiPhp";

    let evenement = {
        nom: ''
    }

    let errorMessage;


    function submitEvenement() {
        var form_data = new FormData();
        for (let key in evenement) {
            if(evenement[key] == '') {
                errorMessage = "Veuillez saisir tous les champs"
                return
            }
            form_data.append(key, evenement[key])
        }
        postEvenement(form_data).then((data) => {
            document.location.href = "#/trajet/create"
        })
    }

</script>

<div class="text-center w-2/3">
    {#if errorMessage}
        <div class="bg-red-100 border border-red-400 text-red-700 mb-8 px-4 py-3 rounded relative w-full mt-10" role="alert">
            <strong class="font-bold">Erreur !</strong>
            <span class="block sm:inline">{errorMessage}</span>
        </div>
    {/if}
    <div class="w-full text-left">
        <h1 class="text-3xl font-bold text-center mb-10 mt-8">Créer un nouveau évènement</h1>

        <label class="mt-12" for="nom">Saisissez le nom de votre évènement</label>
        <input name="nom" class="inputUser" type="text" bind:value={evenement.nom} required>

        <button on:click={submitEvenement}>Créer un nouveau évènement</button>
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