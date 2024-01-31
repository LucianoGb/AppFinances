console.log('carregado');
const foumularioId = document.getElementById("colaborador");
const msgAlert = document.getElementById("msgAlert");
// const foumularioId = document.getElementById("login");
// msgAlert.innerHTML="Email ou senha são obrigatórios";

foumularioId.addEventListener("submit", async (e) => {
    e.preventDefault();
    console.log('entrou aqui');
    
        const dadosForm = new FormData(foumularioId);
        const dados = await fetch('../cadastro_colaborador.php',{
            method:"POST",
            body: dadosForm
        })
        const resposta = await dados.json();
        // console.log(resposta);

        if(resposta['erro'] ){
            msgAlert.innerHTML= resposta['msg'];
        }else{
            window.location.href = resposta['msg']
            
        }
});