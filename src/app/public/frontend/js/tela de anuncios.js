const anuncios = [
    { titulo: "Anúncio 1", descricao: "Descrição do anúncio 1" },
    { titulo: "Anúncio 2", descricao: "Descrição do anúncio 2" }
];

const container = document.getElementById('anuncios');
anuncios.forEach(anuncio => {
    const div = document.createElement('div');
    div.classList.add('anuncio');
    div.innerHTML = `<h2>${anuncio.titulo}</h2><p>${anuncio.descricao}</p>`;
    container.appendChild(div);
});