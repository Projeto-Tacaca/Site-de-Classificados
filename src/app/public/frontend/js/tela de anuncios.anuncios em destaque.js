   // Simulação de dados de anúncios
            const anuncios = [
            ];

            // Seleciona o elemento onde os anúncios serão exibidos
            const anunciosDiv = document.getElementById("anuncios");

            // Gera o HTML para cada anúncio e insere na página
            anuncios.forEach(anuncio => {
                const anuncioHTML = `
                    <div class="anuncio">
                        <h2>${anuncio.titulo}</h2>
                        <p>${anuncio.descricao}</p>
                        <p><strong>Preço:</strong> ${anuncio.preco}</p>
                    </div>
                `;
                anunciosDiv.innerHTML += anuncioHTML;
            });