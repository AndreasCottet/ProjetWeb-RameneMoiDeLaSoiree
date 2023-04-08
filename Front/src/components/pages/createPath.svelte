<script>
    import { getZone, postPath } from "../../api/ApiPhp";

    let trajet = {
        idZoneDepart: '',
        idZoneArrivee: '',
        lieuDepart: '',
        lieuArrivee: '',
        numberOfPassengers: 1,
        dateDepart: Date(),
        nbrPassagers: 1,
    }

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

</script>

<div class="text-center bg-white">
    <div>
        <h2>Saisissez votre addresse de départ</h2>
        <input bind:value="{trajet.lieuDepart}" type="text" required/>
        <select bind:value="{trajet.beginZone}" required>
            <option value="">Sélectionner une zone</option>
            {#each zones as zone}
                <option value="{zone}">{zone.NOM}</option>
            {/each}
        </select>
    </div>

    <div>
        <h2>Saisissez votre addresse d'arrivée</h2>
        <input bind:value="{trajet.lieuArrivee}" type="text" required/>
        <select bind:value="{trajet.endZone}">
            <option value="">Sélectionner une zone</option>
            {#each zones as zone}
                <option value="{zone}">{zone.NOM}</option>
            {/each}
        </select>
    </div>

    <h2>Sélectionnez une date</h2>
    <input type="date" bind:value="{trajet.dateDepart}" required/>


    <h2>Sélectionnez une heure de départ</h2>
    <input bind:value="{trajet.beginTime}" type="time" required/>

    <h2>Sélectionnez une heure d'arrivée</h2>
    <input bind:value="{trajet.endTime}" type="time" required/>

    <h2>Nombre de passagers disponibles : </h2>
    <input bind:value="{trajet.nbrPassagers}" type="number" min="0" max="4" placeholder="Nombre de passagers" required/>

    <button on:click="{handleSubmit}" type="submit">Soumettre</button>
</div>
    

<style>
    h2 {
        @apply text-xl font-semibold mb-2;
    }
    input, select {
        @apply border border-gray-300 rounded p-2;
    }
</style>