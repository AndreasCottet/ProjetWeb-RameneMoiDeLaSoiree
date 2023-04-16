<script>
    import { onMount } from "svelte";
    import { getEvenement, getZone, getUser, getLieu, getCommentByTrajetId, getEvaluationByTrajetId, getInscriptionTrajetByTrajetId, postComment } from "../api/ApiPhp";
    import { current_component } from "svelte/internal";

    export let trajet = {
        id: -1,
        idConducteur: '',
        idLieuDepart: '',
        idLieuArrivee: '',
        idEvenement: '',
        nbrPassagers: 1,
        dateDepart: '', 
    }

    const optionsDate = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };

    export let user = {
        prenom: '',
        nom: '',
        email: '',
        telephone: ''
    }

    let zones = [];
    let lieux = [];
    
    let nomEvenement;

    let lieuDepart = {
        adresse: '',
        nom: '',
        zone: {
            nom: ''
        },
    };
    let lieuArrivee = lieuDepart;

    let inscriptions = [];
    let passagers = [];

    let users = [];

    onMount(async () => {
        getZone().then((data) => {
            zones = data;

            getLieu().then((data) => {
                lieux = data;
                lieux.forEach((lieu) => {
                if(lieu.id == trajet.idLieuDepart) {
                    lieuDepart = lieu
                }
                if(lieu.id == trajet.idLieuArrivee) {
                    lieuArrivee = lieu
                }}) 
                zones.forEach((zone) => {
                if(zone.id == lieuDepart.idZone) {
                    lieuDepart.zone = zone
                }
                if(zone.id == lieuArrivee.idZone) {
                    lieuArrivee.zone = zone
                }})
            })

            getEvenement(trajet.idEvenement).then((data) => {
                nomEvenement = data[0].nom
            })
        })
        getUser(trajet.idConducteur).then((data) => {
                user = data[0];
            })
        if(trajet.id != -1) {
            
            getInscriptionTrajetByTrajetId(trajet.id).then((data) => {
                data.forEach((inscription) => {
                    getUser(inscription.idEtudiant).then((data) => {
                        users.push(data[0])
                        inscriptions.push(inscription)
                        if(inscription.status == "subscribe")
                            passagers.push(inscription)
                    })
                })
                console.log("inscriptions :")
                console.log(inscriptions)
                console.log("passagers :")
                console.log(passagers)
            })
            inscriptions = inscriptions
            passagers = passagers
        }
    })

    let comments = [];
    let evaluations = [];

    let viewComment = false;
    let viewEvaluations = false;
    let userId = document.cookie.split('=')[1];


    let currentCommentaire = {
        idTrajet: trajet.id,
        idEtudiant: userId,
        commentaire: '',
        idEtudiantVisee: -1
    };
    let currentEvaluation;

    function ViewComment() {
        ToggleCommentEvaluation('commentaire')
        getCommentByTrajetId(trajet.id).then((data) => {
            comments = data;
        })
    }

    function ViewEvaluations() {
        ToggleCommentEvaluation('evaluation')
        getEvaluationByTrajetId(trajet.id).then((data) => {
            evaluations = data;
        })
    }

    function ToggleCommentEvaluation(entity) {
        if(entity == 'commentaire') {
            console.log("1")
            viewComment = !viewComment;
            if(viewEvaluations)
                viewEvaluations = !viewEvaluations;
        }
        else {
            console.log("2")
            viewEvaluations = !viewEvaluations;
            if(viewComment)
                viewComment = !viewComment;
        }
        }

    function addCommentaire() {
        var form_data = new FormData();
        for (let key in currentCommentaire) {
            if(key != "idEtudiantVisee" || currentCommentaire[key] != -1)
                form_data.append(key, currentCommentaire[key]);
        }
        postComment(form_data).then((data) => {
        })
        comments.push(currentCommentaire)
        comments = comments
    }

    function getUser2(id) {
        return users.find(user => user.id == id)
    }

</script>

<style>
    h1 {
        @apply text-3xl font-semibold mb-2;
    }

    h2 {
        @apply text-2xl font-semibold mt-4 underline;
    }

    p {
        @apply text-gray-700;
    }

    span {
        @apply text-lg font-semibold;
    }
</style>


<div class="bg-white mt-8 shadow-lg rounded-lg relative text-left p-6 z-50">
    <h1>Récapitulatif trajet</h1>
    {#if trajet.idEvenement}
        <p><span>Evenement : </span>{nomEvenement}</p>
    {/if}
    <div>
        <h2>Départ :</h2>
        <p><span>Lieu de départ : </span>{lieuDepart.nom}</p>
        <p><span>Adresse de départ : </span>{lieuDepart.adresse}</p>
        <p><span>Zone de départ : </span>{lieuDepart.zone.nom}</p>
        <p><span>Date et heure de départ : </span>{new Date(trajet.dateDepart).toLocaleDateString('fr-FR', optionsDate)} <span> à </span>{new Date(trajet.dateDepart).toLocaleTimeString('fr-FR')}</p>
    </div>
    <div>
        <h2>Arrivée :</h2>
        <p><span>Lieu d'arrivée : </span>{lieuArrivee.nom}</p>
        <p><span>Adresse d'arrivée : </span>{lieuArrivee.adresse}</p>
        <p><span>Zone d'arrivée : </span>{lieuArrivee.zone.nom}</p>
    </div>
    <div>
        <h2>Conducteur :</h2>
        <p><span>Nombre de passagers : </span>{trajet.nbrPassagers}</p>
        <p><span>Prénom : </span>{user.prenom}</p>
        <p><span>Nom : </span>{user.nom}</p>
        <p><span>E-mail : </span>{user.email}</p>
        <p><span>Numéro de téléphone : </span>{user.telephone}</p>
    </div>
    {#if passagers.length > 0}
    <div>
        <h2>Passagers :</h2>
        {#each passagers as passager}
            <p class="text-lg font-semibold text-gray-700">{getUser2(passager.idEtudiant).prenom} {getUser2(passager.idEtudiant).nom}</p>
        {/each}
    </div>
    {/if}
    <slot></slot>
    {#if new Date(trajet.dateDepart) < new Date(Date.now())}
        <div class="mt-3">
        <button on:click={ViewComment} class="{viewComment ? "bg-blue-400" : "bg-gray-400"} text-white px-4 py-3 rounded-lg">Commentaire</button>
        <button on:click={ViewEvaluations} class="{viewEvaluations ? "bg-blue-400" : "bg-gray-400"} text-white px-4 py-3 rounded-lg">Evaluations</button>
    
        {#if viewComment}
            <div class="bg-gray-200 rounded-lg mt-3">
                {#each comments as comment}
                    <div class="p-2 px-4">
                    <h3 class="underline">{getUser2(comment.idEtudiant).prenom + ' ' + getUser2(comment.idEtudiant).nom}</h3>
                        {#if comment.idEtudiantVisee}
                            <h3>Concernant : {getUser2(comment.idEtudiantVisee).prenom + ' ' + getUser2(comment.idEtudiantVisee).nom}</h3>
                        {/if}
                        <p>{comment.commentaire}</p>
                    </div>
                {/each}
                <br>
                <div class="sticky flex bottom-5 w-full border-2 rounded-lg">
                    <input placeholder="Saisissez votre commentaire" class="w-full" bind:value={currentCommentaire.commentaire}>
                    <select bind:value={currentCommentaire.idEtudiantVisee} class="bg-white">
                        <option value="-1">Le trajet</option>
                        {#each inscriptions as inscription}
                            <option value="{inscription.idEtudiant}">{getUser2(inscription.idEtudiant).prenom + ' ' + getUser2(inscription.idEtudiant).nom}</option>
                        {/each}
    
                    </select>
                    <button on:click={addCommentaire} class="bg-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 mr-2 text-blue-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                    </svg>   
                    </button>       
                </div>
            </div>
        {/if}  
        {#if viewEvaluations}
            <div>
                {#each evaluations as evaluation}
                    <p>{evaluation.note}</p>
                {/each}
            </div>
        {/if}
        
    </div>
    {/if}
    
</div>

