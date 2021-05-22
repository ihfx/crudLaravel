(function(win,doc){
  'use strict';
  // Funcao AJAX para Deletar registros, validando o token CSRF
  function confirmarDelecao(event){
    event.preventDefault();
    let token = doc.getElementsByName('_token')[0].value;
    if(confirm("Deseja apagar este registro?")){
      let ajax = new XMLHttpRequest();
      ajax.open('DELETE', event.target.parentNode.href);
      ajax.setRequestHeader('X-CSRF-TOKEN',token);
      ajax.onreadystatechange = function(){
        if(ajax.readyState === 4 && ajax.status === 200){
          win.location.href="/products";
        }
      };
      ajax.send();
    }else{
      return false;
    }
  }
  if(doc.querySelector('.js-deletar')){
    let botao = doc.querySelectorAll('.js-deletar');
    for(let i=0;i<botao.length;i++){
      botao[i].addEventListener('click',confirmarDelecao,false);
    }
  }
})(window, document);