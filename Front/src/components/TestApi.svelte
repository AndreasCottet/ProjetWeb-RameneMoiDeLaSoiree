<div>
    <p>Test acteurs</p>
    <ul>
        {#each acteursList as acteur}
        <li>
            <p>{acteur.NOM} {acteur.PRENOM}</p>
        </li>
        {/each}
    </ul>
</div>

<script>
    import { onMount } from 'svelte';
    import { getActeurs } from "../api/ApiPhp";

    let acteursList = [];

  // Get the data from the api, after the page is mounted.
    onMount(async () => {
        const res = await getActeurs();
        acteursList = res;
    });
</script>