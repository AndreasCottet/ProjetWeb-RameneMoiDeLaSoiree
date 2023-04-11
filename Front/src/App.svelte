<script>
  import Router from 'svelte-spa-router';
  import Home from './routes/Home.svelte';
  import Trajet from './routes/Trajet.svelte';
  import NotFound from './routes/NotFound.svelte';
  import Header from './components/Header.svelte';
  import CreateTrajet from './routes/createTrajet.svelte';
  import Login from './routes/Login.svelte';
  import CreateAccount from './routes/CreateAccount.svelte';
  import SearchBar from './routes/SearchBar.svelte';

  let routes = {
    '/': Home,
    '/trajet/create': CreateTrajet,
    '/trajet': Trajet,
    '/user/login': Login,
    '/user/create': CreateAccount,
    '/user/view': Home,
    '/search': SearchBar,
    '*': NotFound,
  };

</script>

<header>
  <Header />
</header>
<main class="items-center justify-center text-center flex">
  <Router {routes} />
</main>


