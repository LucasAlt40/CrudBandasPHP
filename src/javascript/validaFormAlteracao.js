window.addEventListener("load", setEventos);

function setEventos() {
  document
    .querySelector(".btn-submit")
    .addEventListener("click", validaCadastro);
}

function validaCadastro() {
  let nome = document.querySelector("#nome");
  let sobrenome = document.querySelector("#sobrenome");
  let cpf = document.querySelector("#cpf");
  let email = document.querySelector("#email");
  let senha = document.querySelector("#senha");

  let dadosForm = new FormData();
  dadosForm.append("nome", nome.value);
  dadosForm.append("sobrenome", sobrenome.value);
  dadosForm.append("cpf", cpf.value);
  dadosForm.append("email", email.value);
  dadosForm.append("senha", senha.value);

  let inputs = document.querySelectorAll("input");
  for (let input of inputs) {
    if (input.value == "" || !input.value) {
      document.querySelector("form").classList.add("was-validated");
      return false;
    }
  }

  if (senha.value.length < 4) {
    document.querySelector("#senha-invalida").style = "display: block;";
    return false;
  } else {
    document.querySelector("#senha-invalida").style = "display: none;";
  }

  fetch("./login/altera_login.php", { method: "POST", body: dadosForm })
    .then(function (response) {
      if (!response.ok) {
        throw new Error(response.text());
      }
      return response.json();
    })
    .then(function (res) {
      if (res.status == true) {
        window.location.href = "../public/index.php?status='success'";
      } else {
        const toastLiveExample = document.getElementById("liveToast");

        const toast = new bootstrap.Toast(toastLiveExample);
        document.querySelector(".alert-req").innerHTML = res.msg;
        toast.show();
      }
    })
    .catch(function (erro) {
      const toastLiveExample = document.getElementById("liveToast");

      const toast = new bootstrap.Toast(toastLiveExample);
      document.querySelector(".alert-req").innerHTML =
        "Falha na requisição com o servidor.";
      toast.show();
      console.error(erro);
    });
}
