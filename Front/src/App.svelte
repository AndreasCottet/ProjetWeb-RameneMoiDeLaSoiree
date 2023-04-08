<script>
  import Router from 'svelte-spa-router';
  import Home from './routes/Home.svelte';
  import Trajet from './routes/Trajet.svelte';
  import NotFound from './routes/NotFound.svelte';

  let routes = {
    '/': Home,
    '/trajet': Trajet,
    '*': NotFound,
  };

</script>

<main>
  <Router {routes} />
</main>


