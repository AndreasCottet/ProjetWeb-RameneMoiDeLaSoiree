<script>
    import { getZone, postPath } from "../api/ApiPhp";

    let trajet = {
        idZoneDepart: '',
        idZoneArrivee: '',
        lieuDepart: '',
        lieuArrivee: '',
        numberOfPassengers: 1,
        dateDepart: Date(),
        nbrPassagers: 1,
    }

    let step = 1;
    let zones = [
        ''
    ];

    getZone().then((data) => {
        zones = data;
    });


    function handleSubmit() 
    {
        var form_data = new FormData();
        for (let key in trajet ) {
            form_data.append(key, trajet[key]);
        }

        postPath(form_data).then((data) => {
            console.log(data);
        });
    }

    function incrementStep() {
        if(step < 6) {
            step++;
            console.log(step)
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

<div class="mt-16 text-center w-2/3">
    {#if step == 1}
        <div class="w-full text-center">
            <h2>D'où souhaitez vous partir :</h2>
            <div class="flex inputUser">
                <input bind:value="{trajet.lieuDepart}" type="text" placeholder="Saisissez votre adresse de départ" required/>
            </div>
            {#if trajet.lieuDepart != ''}
                <h2>Veuillez saisir une zone dans laquelle est située votre adresse</h2>
                <select bind:value="{trajet.beginZone}" required>
                    <option value="">zone de départ</option>
                    {#each zones as zone}
                        <option value="{zone}">{zone.NOM}</option>
                    {/each}
                </select>
            {/if}
        </div>

    {:else if step == 2}
        <div>
            <h2>Saisissez votre addresse d'arrivée</h2>
            <div class="flex inputUser">
                <input bind:value="{trajet.lieuArrivee}" type="text" placeholder="Saisissez votre adresse de départ" required/>
            </div>
            {#if trajet.lieuArrivee != ''}
                <h2>Veuillez saisir une zone dans laquelle est située votre adresse</h2>
                <select bind:value="{trajet.endZone}" required>
                    <option value="">zone de départ</option>
                    {#each zones as zone}
                        <option value="{zone}">{zone.NOM}</option>
                    {/each}
                </select>
            {/if}
        </div>    
    
    {:else if step == 3}
        <h2>Sélectionnez une date</h2>
        <div class="flex inputUser">
        <input type="date" bind:value="{trajet.dateDepart}" required/>
        </div>

    {:else if step == 4}
        <h2>Sélectionnez une heure de départ</h2>
        <div class="flex inputUser">
        <input bind:value="{trajet.beginTime}" type="time" required/>
        </div>

    {:else if step == 5}
        <h2>Sélectionnez une heure d'arrivée</h2>
        <div class="flex inputUser">
        <input bind:value="{trajet.endTime}" type="time" required/>
        </div>

    {:else if step == 6}
        <h2>Nombre de passagers disponibles : </h2>
        <div class="flex inputUser">
            <input bind:value="{trajet.nbrPassagers}" type="number" min="0" max="4" placeholder="Nombre de passagers" required/>
        </div>
        <button on:click="{handleSubmit}" type="submit">Soumettre</button>
    {/if}

    <div class="absolute bottom-32">
        {#if step > 1} 
            <button class="m-10" on:click={decrementStep}>Précédent</button>
        {/if}
        {#if step < 6} 
            <button on:click={incrementStep}>Suivant</button>
        {/if}
    </div>
</div>
    

<style>
    h2 {
        @apply text-4xl font-semibold mb-10;
    }
    .inputUser {
        @apply border border-gray-300 rounded-lg bg-gray-100 h-16 text-2xl   ;
    }
    input {
        @apply w-full bg-gray-100 rounded-lg;
    }
    button {
        @apply bg-blue-500 text-white border-blue-500 border-2 rounded-xl text-xl font-semibold px-8 py-3 h-full;
    }

    button:hover {
        @apply bg-transparent text-blue-500;
    }
</style>