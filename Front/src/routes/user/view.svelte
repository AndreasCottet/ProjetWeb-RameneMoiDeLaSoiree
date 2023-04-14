<script>
    import AccessModifProfil from "../../components/AccessModifProfil.svelte";
    let id = document.cookie.split('=')[1];

</script>
<AccessModifProfil id={id} />

