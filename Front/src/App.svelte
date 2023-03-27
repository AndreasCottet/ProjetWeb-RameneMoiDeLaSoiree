<script>
  import svelteLogo from './assets/svelte.svg'
  import Counter from './lib/Counter.svelte'
  import TestApi from './components/TestApiComponents/TestApi.svelte';
  import CreateAccountForm from './components/CreateAccount.svelte';
  import LoginForm from './components/LoginForm.svelte';
  import Header from './components/Header.svelte';
  import PublicationStart from "./components/PublicationStart.svelte";
  import ChoixDate from "./components/ChoixDate.svelte";
  import TimeSelector from "./components/TimeSelector.svelte";
</script>

<main>
 <PublicationStart />
 <ChoixDate />
 <TimeSelector />
</main>
