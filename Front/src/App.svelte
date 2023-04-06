<script>

  import Header from './components/Header.svelte';
  import SearchBar from "./components/SearchBar.svelte";
  import CreateAccount from './components/CreateAccount.svelte';
  import AccessModifProfil from "./components/AccessModifProfil.svelte";
</script>

<body class="bg-red-500 h-screen">
<header>
  <Header />
</header>
<main>

  <SearchBar />
  <CreateAccount />
  <AccessModifProfil />

</main>
</body>
