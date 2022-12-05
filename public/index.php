<?php
include("../include/cabecalho.php");
?>

<main>
  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
        aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./images/background1.jpg"
          alt="Mulher apreciando suas músicas em seu fone de ouvido com os olhos fechados" />
        <div class="container">
          <div class="carousel-caption text-left">
            <h1>Ouça músicas com melhor qualidade.</h1>
            <p>
              Com Musicfy é possível escutar aquele som com a qualidade mais
              fiel do mercado.
            </p>
            <p><a class="btn btn-lg btn-success" href="#">Detalhes</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./images/background2.jpg" alt="Mulher dançando enquanto escuta música em seu fone de ouvido" />

        <div class="container">
          <div class="carousel-caption">
            <h1>Acessível a todo público.</h1>
            <p>No Musicfy temos planos que cabem em todos os bolsos.</p>
            <p><a class="btn btn-lg btn-success" href="#">Veja mais</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./images/background3.jpg"
          alt="Mulher usando seu celular como microfone e cantando enquanto escuta música" />

        <div class="container">
          <div class="carousel-caption text-right">
            <h1>Assine já!</h1>
            <p>Assinantes novos ganham 1 mês grátis.</p>
            <p><a class="btn btn-lg btn-success" href="#">Assine</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="container marketing">
    <div class="row">
      <div class="col-lg-4">
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="./images/headphoneicon.png" />

        <h2>Em qualquer lugar</h2>
        <p>O Musicfy está disponível em todas as localidades do mundo.</p>
        <p><a class="btn btn-success" href="#">Detalhes &raquo;</a></p>
      </div>
      <div class="col-lg-4">
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="./images/musicicon.png" />

        <h2>Milhares de músicas</h2>
        <p>O Musicfy conta com uma biblioteca imensa de músicas.</p>
        <p><a class="btn btn-success" href="#">Detalhes &raquo;</a></p>
      </div>
      <div class="col-lg-4">
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="./images/downloadicon.png" />

        <h2>Ouça músicas offline</h2>
        <p>
          Escute suas músicas favoritas sem precisar estar conectado à
          internet.
        </p>
        <p><a class="btn btn-success" href="#">Detalhes &raquo;</a></p>
      </div>
    </div>

    <hr class="featurette-divider" />

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">
          Qualidade sonora de estúdio.
          <span class="text-muted">É como se você estivesse junto aos cantores.</span>
        </h2>
        <p class="lead">
          Temos orgulho em afirmar que nossos usuários sempre terão a melhor
          qualidade na hora de ouvir suas músicas.
        </p>
      </div>
      <div class="col-md-5">
        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
          height="500" src="./images/fitas.jpg" />
      </div>
    </div>

    <hr class="featurette-divider" />

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">
          Todo mundo junto.
          <span class="text-muted">Ou cada um no seu quadrado.</span>
        </h2>
        <p class="lead">
          No plano família não tem essa de revezamento: com as contas
          individuais, cada pessoa pode escutar as músicas que quiser, sem
          anúncios.
        </p>
      </div>
      <div class="col-md-5 order-md-1">
        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
          height="500" src="./images/vinil.jpg" alt="Loja de vinil" />
      </div>
    </div>

    <hr class="featurette-divider" />

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">
          Qualidade. <span class="text-muted">Variedade.</span>
        </h2>
        <p class="lead">
          O Musicfy tem milhões de músicas e episódios de podcasts. Então
          você sempre encontra algo ótimo para ouvir, não importa se está
          dirigindo ou fazendo exercícios, em clima de festa ou relaxando em
          casa. Escolha o que quer escutar ou deixe o Musicfy te
          surpreender.
        </p>
      </div>
      <div class="col-md-5">
        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
          height="500" src="./images/instrumentos.jpg" />
      </div>
    </div>

    <hr class="featurette-divider" />
  </div>

  <footer class="container">
    <p class="float-right"><a href="#">Voltar ao topo</a></p>
    <p>
      &copy; 2022-2022 Music, Inc. &middot;
      <a href="#">Termos</a> &middot; <a href="#">Privacidade</a>
    </p>
  </footer>
</main>

<?php
include("../include/rodape.php");
?>