function aparecerMenu(menu,conteudo,botaoMenu) {
    var vMenu = document.getElementById(menu).style.display;
    var vBotaoMenu = document.getElementById(botaoMenu).innerHTML;
    
    if(vMenu == "inline-block"){
        document.getElementById(menu).style.display = 'none';
        document.getElementById(conteudo).style.margin = '1px 1px 1px 10px';
        document.getElementById(botaoMenu).innerHTML=">>>";
    }
    else{
    	document.getElementById(menu).style.display = 'inline-block';
    	document.getElementById(conteudo).style.margin = "1px 1px 1px 180px";
    	document.getElementById(botaoMenu).innerHTML="<<<";
    }
}
