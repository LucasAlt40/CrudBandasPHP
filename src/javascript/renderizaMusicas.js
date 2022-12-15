window.addEventListener("load", setEventos);

async function setEventos() {
  await renderMusicas();
  const buttons = document.querySelectorAll(".btn-adicionar");
  for (let button of buttons) {
    button.addEventListener("click", adicionarParaPlaylist);
  }
  checaMusicaEstaEmPlaylist();
}

function encontraMusicas(musicas) {
  let musicasEncontradas = [];

  for (let musica of musicas) {
    musicasEncontradas.push(musica.children[1].innerHTML);
  }

  return musicasEncontradas;
}

function encontraMusicaNaPlaylist(musicas, musicasEncontradas) {
  let musicasQueEstaoNaPlaylist = [];

  for (let musica of musicas) {
    let a = musicasEncontradas.find((msc) => msc == musica?.id_musica);
    musicasQueEstaoNaPlaylist.push(a);
  }

  return musicasQueEstaoNaPlaylist;
}

async function checaMusicaEstaEmPlaylist() {
  let listaMusicas = document.querySelectorAll(".card-body");
  let musicas = await fetch("../musica/retorna_musicas_playlist.php")
    .then((response) => response.json())
    .then((res) => res.musicas)
    .catch((error) => console.log(error));

  let musicasEncontradas = encontraMusicas(listaMusicas);
  let musicasNaPlaylist = encontraMusicaNaPlaylist(musicas, musicasEncontradas);

  for (let element of listaMusicas) {
    let item = musicasNaPlaylist.find(
      (msc) => msc == element.children[1].innerHTML
    );
    if (item) {
      element.children[3].setAttribute("disabled", "");
      element.children[3].innerHTML = "Já adicionado à playlist";
      element.children[3].classList.remove("btn-outline-success");
      element.children[3].classList.add("btn-outline-warning");
    }
  }
}

function adicionarParaPlaylist() {
  let card = this.parentElement;
  let id_musica = card.children[1].innerHTML;
  let cpf_user = localStorage.getItem("cpf_user");

  let dadosForm = new FormData();
  dadosForm.append("id_musica", id_musica);
  dadosForm.append("cpf_usuario", cpf_user);

  fetch("../musica/adiciona_musica_playlist.php", {
    method: "POST",
    body: dadosForm,
  })
    .then((response) => response.json())
    .then((res) => {
      const toastLiveExample = document.getElementById("liveToastSuccess");

      const toast = new bootstrap.Toast(toastLiveExample);
      document.querySelector(".alert-req").innerHTML = res?.msg;
      toast.show();
    })
    .catch((err) => console.error(err))
    .finally(() => checaMusicaEstaEmPlaylist());
}

async function renderMusicas() {
  let listaMusicas = document.querySelector(".lista-musicas");
  let musicas = await fetch("../musica/retorna_musicas.php")
    .then((response) => response.json())
    .then((res) => res.musicas)
    .catch((error) => console.log(error));

  musicas.map(
    (musica) =>
      (listaMusicas.innerHTML += `
  <div class="card text-bg-dark " style="width: 18rem;">
    <img src="../uploads/${musica?.nome_arquivo}" />
    <div class="card-body">
      <h5 class="card-title">${musica?.nome_musica}</h5>
      <p id="id_musica" style="display: none;">${musica?.id_musica}</p>
      <p class="card-text">
        Album: ${musica?.album || "Sem album"}<br />
        Ano de lançamento: ${musica?.ano_lancamento}<br />
        Banda: ${musica?.banda}
      </p>
        <button type="button" class="btn btn-outline-success btn-adicionar">
          Adicionar à Playlist
        </button>
    </div>
  </div>
  `)
  );
}
