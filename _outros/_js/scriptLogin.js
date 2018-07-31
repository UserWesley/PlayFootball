function aparecerLogin(login,botaoJogar) {
    var fundoLogin = document.getElementById(login).style.display;
    var botao = document.getElementById(botaoJogar).style.display;
    if(fundoLogin == "none"){
        document.getElementById(login).style.display = 'inline-block';
    	document.getElementById(botaoJogar).style.display = 'none';
    }
}