<script>
    import { onMount } from "svelte";
    import { getEvenement, getLieu, getZone, postPath } from "../../api/ApiPhp";
    import AfficheUnTrajet from "../../components/Affiche_Un_Trajet.svelte";

    if(!document.cookie.includes('userId')) {
        document.location.href="#/user/login"
    }

    let idConducteur = document.cookie.split('=')[1];

    let trajet = {
        id: -1,
        idConducteur: Number(idConducteur),
        idLieuDepart: '',
        idLieuArrivee: '',
        dateDepart: '',
        nbrPassagers: 1,
        idEvenement: ''
    }

    let step = 1;

    let lieux = [];
    let evenements = [];

    let errorMessage = '';

    onMount(async () => {
        getLieu().then((data) => {
            lieux = data;
        });
        getEvenement().then((data) => {
            evenements = data;
        });
    })


    function handleSubmit() 
    {
        var form_data = new FormData();
        for (let key in trajet ) {
            form_data.append(key, trajet[key]);
        }
        postPath(form_data).then((data) => {
            step++;
        });
    }

    function incrementStep() {
        switch(step) {
            case 1:
                if(trajet.idLieuDepart == '' || trajet.idZoneDepart == '') {
                    errorMessage = 'Veuillez remplir le lieu de départ';
                    return
                }
                break;
            case 2:
                if(trajet.lieuArrivee == '' || trajet.idZoneArrivee == '') {
                    errorMessage = 'Veuillez remplir le lieu d\'arrivée';
                    return

                }
                break;
            case 3:
                if(trajet.dateDepart == '') {
                    errorMessage = 'Veuillez remplir la date de départ';
                    return
                }
                break;
            case 4:
                if(trajet.dateArrivee == '') {
                    errorMessage = 'Veuillez remplir le nombre de passagers';
                    return
                }
        }
        errorMessage = '';
        if(step < 6) {
            step++;
        }
        
    }

    function decrementStep() {
        if(step > 1) {
            step--;
        }
    }

</script>

<form class="mt-10 flex flex-col text-center justify-center items-center w-2/3">
    {#if errorMessage}
        <div class="bg-red-100 border border-red-400 text-red-700 mb-8 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Erreur !</strong>
            <span class="block sm:inline">{errorMessage}</span>
        </div>
    {/if}
    {#if step == 1}
        <div class="w-full text-center">
            <h2>D'où souhaitez vous partir :</h2>
            <select bind:value="{trajet.idLieuDepart}" required class="inputUser">
                <option value="">Lieu de départ</option>
                {#each lieux as lieu}
                    <option value="{lieu.id}">{lieu.nom}</option>
                {/each}
            </select>
            <a href="#/lieu/create"><h3 class="mt-10 underline text-lg text-gray-600">Vous ne trouvez pas votre lieu, cliquer ici pour le créer</h3></a>
        </div>

    {:else if step == 2}
        <div class="w-full">
            <h2>Où souhaitez vous aller :</h2>
            <select bind:value="{trajet.idLieuArrivee}" required class="inputUser">
                <option value="">Lieu d'arrivée</option>
                {#each lieux as lieu}
                    <option value="{lieu.id}">{lieu.nom}</option>
                {/each}
            </select>
            <a href="#/lieu/create"><h3 class="mt-10 underline text-lg text-gray-600">Vous ne trouvez pas votre lieu, cliquer ici pour le créer</h3></a>
        </div>    
    
    {:else if step == 3}
        <div class="w-full">
            <h2>Sélectionnez la date et l'heure de départ</h2>
            <div class="flex inputUser">
                <input type="datetime-local" bind:value="{trajet.dateDepart}" required/>
            </div>
        </div>

    {:else if step == 4}
    <div class="w-full">
        <h2>Nombre de passagers disponibles : </h2>
        <div class="flex inputUser">
            <input bind:value="{trajet.nbrPassagers}" type="number" min="1" max="4" placeholder="Nombre de passagers" required/>
        </div>
    </div>

    {:else if step == 5}
    <div>
        <h2>Voulez-vous le rattacher à un évènement</h2>
        <select bind:value="{trajet.idEvenement}" required class="inputUser">
            <option value="">Choisissez un évènement</option>
            {#each evenements as evenement}
                <option value="{evenement.id}">{evenement.nom}</option>
            {/each}
        </select>
        <a href="#/evenement/create"><h3 class="mt-10 underline text-lg text-gray-600">Vous ne trouvez pas votre évènement, cliquer ici pour le créer</h3></a>
    </div>

    {:else if step == 6}
        <div class="w-1/2">
            <AfficheUnTrajet trajet={trajet}>
                <div class="flex justify-center gap-10 mt-5">
                    <button on:click="{handleSubmit}" type="submit" >Valider</button>
                    <button on:click="{decrementStep}" type="button" class="redButton">Modifier</button>
                </div>
            </AfficheUnTrajet>
        </div>
    
    {:else if step == 7}
        <div class="text-center items-center justify-center">
            <h1 class="text-3xl font-bold">La création du trajet s'est passé avec succès</h1>
            <img src="src/assets/success_create_trajet.png" alt="succès création trajet" class="w-4/6">      
            <a href="#/">Rejoindre la page d'accueil</a>     
        </div>

    {/if}
    
    {#if step != 7}
    <div class="stepBullet {step == 6 ? 'bottom-20' : 'bottom-40'}">
        <div class="outer-circle">
            {#if step == 1}
            <div class="inner-circle"></div>
            {/if}
        </div>
        <div class="outer-circle">
            {#if step == 2}
            <div class="inner-circle"></div>
            {/if}
        </div>
        <div class="outer-circle">
            {#if step == 3}
            <div class="inner-circle"></div>
            {/if}
        </div>
        <div class="outer-circle">
            {#if step == 4}
            <div class="inner-circle"></div>
            {/if}
        </div>
        <div class="outer-circle">
            {#if step == 5}
            <div class="inner-circle"></div>
            {/if}
        </div>
        <div class="outer-circle">
            {#if step == 6}
            <div class="inner-circle"></div>
            {/if}
        </div>
    </div>


    <div class="flex justify-center gap-10 absolute left-0 right-0 {step == 6 ? 'bottom-2' : 'bottom-10'}">
        {#if step > 1 && step < 6} 
            <button on:click={decrementStep}>Précédent</button>
        {/if}
        {#if step < 6} 
            <button on:click={incrementStep}>Suivant</button>
        {/if}
    </div>
    {/if}
</form>
    

<style>
    h2 {
        @apply text-4xl font-semibold mb-10;
    }
    .inputUser {
        @apply border w-full border-gray-300 rounded-lg bg-gray-100 h-16 text-2xl pl-4  ;
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

    .outer-circle {
        @apply bg-gray-200 rounded-full h-8 w-8 relative;
    }

    .inner-circle {
        @apply absolute bg-blue-400 rounded-full h-4 w-4 m-2;
    }

    .stepBullet {
        @apply flex justify-center absolute left-0 right-0 gap-2;
    }

    .redButton{
        @apply bg-red-600 border-red-600 border-2 rounded-xl text-lg font-semibold px-6 py-3;
    }
    .redButton:hover {
        @apply bg-transparent text-red-600;
    }
</style>