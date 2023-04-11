<script>
  import Router from 'svelte-spa-router';
  import Home from './routes/Home.svelte';
  import NotFound from './routes/NotFound.svelte';
  import Header from './components/Header.svelte';
  import CreateTrajet from './routes/trajet/create.svelte';
  import Login from './routes/user/Login.svelte';
  import CreateAccount from './routes/user/create.svelte';
  import SearchBar from './routes/SearchBar.svelte';
  import ViewUser from './routes/user/view.svelte';

  let routes = {
    '/': Home,
    '/trajet/create': CreateTrajet,
    '/user/login': Login,
    '/user/create': CreateAccount,
    '/user/view': ViewUser,
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


