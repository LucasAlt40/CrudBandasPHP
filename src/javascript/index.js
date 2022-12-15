window.addEventListener("load", setEventos);

function setEventos() {
  document.querySelector("#btn_enviar").addEventListener("click", validaLogin);
  obterMensagem();
}

function obterMensagem() {
  const url = window.location.search;
  const urlParams = new URLSearchParams(url);
  if (urlParams.get("status")) {
    const toastLiveExample = document.getElementById("liveToastSuccess");

    const toast = new bootstrap.Toast(toastLiveExample);
    toast.show();
  } else {
    return false;
  }
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
      if (!response.ok) {
        throw new Error(response.text());
      }
      return response.json();
    })
    .then(function (res) {
      console.log(res)
      if (res.msg == "ok") {
        localStorage.setItem('cpf_user', res?.usuario_infos?.cpf);
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