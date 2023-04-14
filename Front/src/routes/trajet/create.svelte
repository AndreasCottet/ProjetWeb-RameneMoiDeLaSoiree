<script>
    import { getZone, postPath } from "../../api/ApiPhp";
    import AfficheUnTrajet from "../../components/Affiche_Un_Trajet.svelte";

    console.log(document.cookie);
    let idConducteur = document.cookie.split('=')[1];

    let trajet = {
        idConducteur: Number(idConducteur),
        idZoneDepart: '',
        idZoneArrivee: '',
        lieuDepart: '',
        lieuArrivee: '',
        numberOfPassengers: 1,
        dateDepart: '',
        dateArrivee: '',
        nbrPassagers: 1,
    }

    let step = 1;
    let zones = [
        ''
    ];

    let errorMessage = '';

    getZone().then((data) => {
        zones = data;
        console.log(zones);
    });



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
                if(trajet.lieuDepart == '' || trajet.idZoneDepart == '') {
                    errorMessage = 'Veuillez remplir le lieu et la zone de départ';
                    return
                }
                break;
            case 2:
                if(trajet.lieuArrivee == '' || trajet.idZoneArrivee == '') {
                    errorMessage = 'Veuillez remplir le lieu et la zone d\'arrivée';
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
                    errorMessage = 'Veuillez remplir la date d\'arrivée';
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
            console.log(step)
        }
        if(step == 1) {
            
        }
    }

</script>

<form class="mt-10 text-center justify-center items-center flex-row w-2/3">
    {#if errorMessage}
        <div class="bg-red-100 border border-red-400 text-red-700 mb-8 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Erreur !</strong>
            <span class="block sm:inline">{errorMessage}</span>
        </div>
    {/if}
    {#if step == 1}
        <div class="w-full text-center">
            <h2>D'où souhaitez vous partir :</h2>
            <div class="flex inputUser">
                <input bind:value="{trajet.lieuDepart}" type="text" placeholder="Saisissez votre adresse de départ" required/>
            </div>
            {#if trajet.lieuDepart != ''}
                <div class="mt-10">
                    <h2>Veuillez saisir une zone dans laquelle est située votre adresse</h2>
                    <select bind:value="{trajet.idZoneDepart}" required class="inputUser">
                        <option value="">Zone de départ</option>
                        {#each zones as zone}
                            <option value="{zone.ID_ZONE}">{zone.NOM}</option>
                        {/each}
                    </select>
                </div>
            {/if}
        </div>

    {:else if step == 2}
        <div>
            <h2>Saisissez votre addresse d'arrivée</h2>
            <div class="flex inputUser">
                <input bind:value="{trajet.lieuArrivee}" type="text" placeholder="Saisissez votre adresse de départ" required/>
            </div>
            {#if trajet.lieuArrivee != ''}
                <div class="mt-10">
                    <h2>Veuillez saisir une zone dans laquelle est située votre adresse</h2>
                    <select bind:value="{trajet.idZoneArrivee}" required class="inputUser">
                        <option value="">Zone d'arrivée</option>
                        {#each zones as zone}
                            <option value="{zone.ID_ZONE}">{zone.NOM}</option>
                        {/each}
                    </select>
                </div>
            {/if}
        </div>    
    
    {:else if step == 3}
        <h2>Sélectionnez la date et l'heure de départ</h2>
        <div class="flex inputUser">
        <input type="datetime-local" bind:value="{trajet.dateDepart}" required/>
        </div>

    {:else if step == 4}
        <h2>Sélectionnez la date et l'heure d'arrivée</h2>
        <div class="flex inputUser">
        <input type="datetime-local" bind:value="{trajet.dateArrivee}" required/>
        </div>

    {:else if step == 5}
        <h2>Nombre de passagers disponibles : </h2>
        <div class="flex inputUser">
            <input bind:value="{trajet.nbrPassagers}" type="number" min="1" max="4" placeholder="Nombre de passagers" required/>
        </div>

    {:else if step == 6}
        <AfficheUnTrajet trajet={trajet}>
            <button on:click="{handleSubmit}" type="submit" class="mt-5">Valider</button>
        </AfficheUnTrajet>
    
    {:else if step == 7}
        <div class="drop-shadow-lg">
            <!-- A faire -->
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
        {#if step > 1} 
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
        @apply border border-gray-300 rounded-lg bg-gray-100 h-16 text-2xl pl-4  ;
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
        @apply  absolute bg-blue-400 rounded-full h-4 w-4 m-2;
    }

    .stepBullet {
        @apply flex justify-center absolute left-0 right-0 gap-2;
    }
</style>