<script>
    import CreateAccountForm from '../components/CreateAccount.svelte';
    import CaseTrajet from "../components/CaseTrajet.svelte";
    import SearchBar from "../components/SearchBar.svelte";
    import { fade } from 'svelte/transition';
    import { writable } from 'svelte/store';

    let showTrajets = writable(false);
    function handleSearchClick() {
        $showTrajets = true;
    }

</script>

<div class="w-full flex justify-center items-center">
    <div class="w-3/4 mt-16">
        <!-- <SearchBar on:click={handleSearchClick} /> -->
    </div>
    {#if $showTrajets}
        <div class="flex">
            <CaseTrajet />
            <CaseTrajet />
            <CaseTrajet />
            <CaseTrajet />
        </div>
    {/if}
</div>