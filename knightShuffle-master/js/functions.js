function solutionChecker(respostaCorreta)
{
	var respostaFornecida = document.getElementById('solution').value.toUpperCase();
	
	if (respostaFornecida == respostaCorreta) {
		document.getElementById('solution').disabled=true;
		
		alert("Congratulation!");	
	}					
}
