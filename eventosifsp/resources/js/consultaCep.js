<script>
    const cepInput = document.getElementById('cep');
    const enderecoInput = document.getElementById('endereco');

    cepInput.addEventListener('change', function() {
        const cep = cepInput.value;

        fetch(`/buscarCep/${cep}`)
            .then(response => response.json())
            .then(data => {
                enderecoInput.value = data.logradouro + ', ' + data.bairro + ', '
                     + data.localidade + ' - ' + data.uf;
            })
            .catch(error => {
                console.error('Erro ao buscar CEP:', error);
            });
    });
</script>
