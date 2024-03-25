<script>
    $(document).ready(function(){
        $('#search').autocomplete({
            source: "{{ route('buscarCatalogo') }}",
            minLength: 1,
        });
    });
</script>