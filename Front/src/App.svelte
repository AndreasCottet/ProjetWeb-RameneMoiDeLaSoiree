<script>
  import Router from 'svelte-spa-router';
  import Home from './routes/Home.svelte';
  import NotFound from './routes/NotFound.svelte';
  import Header from './components/Header.svelte';
  import CreateTrajet from './routes/trajet/create.svelte';
  import Login from './routes/user/Login.svelte';
  import CreateAccount from './routes/user/create.svelte';
  import SearchPage from './routes/trajet/search.svelte';
  import ViewUser from './routes/user/view.svelte';
  import ViewTrajet from './routes/trajet/view.svelte';
  import CreateLieu from './routes/lieu/create.svelte';
  import CreateEvenement from './routes/evenement/create.svelte';
  import ConversationTrajet from './routes/trajet/conversation.svelte';

  let routes = {
    '/': SearchPage,
    '/lieu/create': CreateLieu,
    '/evenement/create': CreateEvenement,
    '/trajet/create': CreateTrajet,
    '/trajet/conversation/:id': ConversationTrajet,
    '/trajet/view/:id': ViewTrajet,
    '/user/login': Login,
    '/user/create': CreateAccount,
    '/user/view': ViewUser,
    '/search': SearchPage,
    '*': NotFound,
  };

</script>

<header>
  <Header />
</header>
<main class="flex items-center justify-center text-center ">
  <Router {routes} />
</main>


