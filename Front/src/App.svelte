<script>
  import svelteLogo from './assets/svelte.svg'
  import Counter from './lib/Counter.svelte'
  import TestApi from './components/TestApiComponents/TestApi.svelte';
  import CreateAccountForm from './components/CreateAccount.svelte';
  import LoginForm from './components/LoginForm.svelte';
  import Header from './components/Header.svelte';
</script>

<main>
  <header>
    <Header />
  </header>
  
  <p class="text-3xl font-bold">
    Test
  </p>
  <LoginForm />
</main>
