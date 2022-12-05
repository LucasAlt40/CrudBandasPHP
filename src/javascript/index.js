window.addEventListener("load", setEventos);

function setEventos() {
  document.querySelector("#btn_enviar").addEventListener("click", validaLogin);
}

function validaLogin() {
  let email = document.querySelector("#floatingInput").value;
  let senha = document.querySelector("#floatingPassword").value;

  let dados_form = new FormData();
  dados_form.append("email", email);
  dados_form.append("senha", senha);

  fetch("login/valida_login.php", {
    method: "POST",
    body: dados_form,
  })
    .then(function (response) {
      return response.text();
    })
    .then(function (res) {
      if (res == "ok") {
        window.location.href = "../public/index.php";
      } else {
        const toastLiveExample = document.getElementById("liveToast");

        const toast = new bootstrap.Toast(toastLiveExample);

        toast.show();
      }
    })
    .catch(function (erro) {
      console.error(erro);
    });
}
