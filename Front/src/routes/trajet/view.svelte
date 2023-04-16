<script>
    import { onMount } from "svelte";
    import { deleteInscriptionTrajet, deleteTrajet, getInscriptionTrajetByTrajetId, getTrajetById, subscribeTrajet } from "../../api/ApiPhp";
    import AfficheUnTrajet from "../../components/Affiche_Un_Trajet.svelte";

    export let params = {};

    let trajet;

    let inscriptionsTrajet = undefined;

    let userId = document.cookie.split('=')[1];

    let nbrPlaceRestante;

    function handleSubscribe() {
        let inscription = {
            idTrajet: params.id,
            status: 'subscribe',
            idEtudiant: document.cookie.split('=')[1],
        }
        var form_data = new FormData();
        for (let key in inscription) {
            form_data.append(key, inscription[key]);
        }
        subscribeTrajet(form_data).then((data) => {
            isSubscribeTrajet = !isSubscribeTrajet;
            nbrPlaceRestante--;
        });
    }

    function handleUnsubscribe() {
        let inscription = {
            idTrajet: params.id,
            idEtudiant: document.cookie.split('=')[1],
        }
        var form_data = new FormData();
        for (let key in inscription) {
            form_data.append(key, inscription[key]);
        }
        deleteInscriptionTrajet(form_data).then((data) => {
            isSubscribeTrajet = !isSubscribeTrajet;
            nbrPlaceRestante++;
        });
    }

    function handleDelete() {
        let form_data = new FormData();
        form_data.append("id", params.id);
        deleteTrajet(form_data).then((data) => {
            window.location.href = "/trajets";
        });
    
    }

    let isSubscribeTrajet;
    onMount(async () => {
        getTrajetById(params.id).then((data) => {
            trajet = data[0];

            getInscriptionTrajetByTrajetId(params.id).then((data) => {
                inscriptionsTrajet = data;
                nbrPlaceRestante = trajet.nbrPassagers - (inscriptionsTrajet ? inscriptionsTrajet.length : 0)
                isSubscribeTrajet = inscriptionsTrajet.filter((inscription) => inscription.idEtudiant == userId).length > 0;
                console.log(isSubscribeTrajet)
            });
        });
    });


</script>

{#if trajet}
    <div class="w-1/3">
        <AfficheUnTrajet trajet={trajet}>
            <div class="text-center">
            <p class="text-gray-700 text-left"><span class="text-lg font-semibold">Nombre de places restantes : </span>{nbrPlaceRestante}</p>
            <div class="flex gap-6">
            {#if trajet.idConducteur == userId && nbrPlaceRestante == trajet.nbrPassagers && new Date(trajet.dateDepart) > new Date(Date.now())}
                <button on:click={handleDelete} class="mt-5 bg-red-600 border-2 border-red-600 hover:bg-transparent hover:text-red-600 text-white font-bold py-2 px-4 rounded">Supprimer le trajet</button>
            {:else if trajet.idConducteur != userId && nbrPlaceRestante > 0 && !isSubscribeTrajet &&  new Date(trajet.dateDepart) > new Date(Date.now())}
                <button on:click={handleSubscribe} class="mt-5 bg-blue-400 border-2 border-blue-400 hover:bg-transparent hover:text-blue-400 text-white font-bold py-2 px-4 rounded">S'inscrire</button>
            {:else if isSubscribeTrajet && new Date(trajet.dateDepart) > new Date(Date.now())}
                <button on:click={handleUnsubscribe} class="mt-5 bg-red-600 border-2 border-red-600 hover:bg-transparent hover:text-red-600 text-white font-bold py-2 px-4 rounded">Se désinscrire</button>
            {/if}
            {#if trajet.idConducteur == userId || isSubscribeTrajet}
                <a href="#/trajet/conversation/{trajet.id}" class="mt-5 bg-blue-400 border-2 border-blue-400 hover:bg-transparent hover:text-blue-400 text-white font-bold py-2 px-4 rounded">Voir les messages du trajet</a>
            {/if}
        </div>
            </div>
        </AfficheUnTrajet>
    </div>
{/if}