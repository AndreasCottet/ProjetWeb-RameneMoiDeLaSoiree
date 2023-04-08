<script>
  import { fade } from 'svelte/transition';
  import { writable } from 'svelte/store';
  import svelteLogo from './assets/svelte.svg'
  import Counter from './lib/Counter.svelte'
  import TestApi from './components/TestApiComponents/TestApi.svelte';
  import CreateAccountForm from './components/CreateAccount.svelte';
  import LoginForm from './components/LoginForm.svelte';
  import Header from './components/Header.svelte';
  import CaseTrajet from "./components/CaseTrajet.svelte";
  import SearchBar from "./components/SearchBar.svelte";
  import CreateAccount from './components/CreateAccount.svelte';

  let showTrajets = writable(false);

  function handleSearchClick() {
    $showTrajets = true;
  }
</script>

<body>
<header>
  <Header />
</header>
<main>
  <SearchBar on:click={handleSearchClick} />
  {#if $showTrajets}
    <div class="flex">
      <CaseTrajet transition:fade={{ duration: 300 }} />
      <CaseTrajet transition:fade={{ duration: 300 }} />
      <CaseTrajet transition:fade={{ duration: 300 }} />
      <CaseTrajet transition:fade={{ duration: 300 }} />
    </div>
    {/if}
</main>
</body>
