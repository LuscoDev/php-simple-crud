<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>CRUD PHP</title>
	
	<style>
		#formEditar, #formGravar, #btnEsconder{
			display: none;
		}
	</style>


	<script>		
		window.onload = function(){		
			let botoes = document.getElementsByClassName('btnsExcluir');	
			let codProdutoExcluir;

			document.getElementById('btnAdd').addEventListener("click",function(){
				document.getElementById("formGravar").style.display = 'block';
				document.getElementById("btnEsconder").style.display = 'block'
			});
			
			document.getElementById("btnEsconder").addEventListener("click",function(){
				document.getElementById("formGravar").style.display = 'none';
				document.getElementById("btnEsconder").style.display = 'none';
			});

			for(let i = 0; i < botoes.length;i++){
				botoes[i].addEventListener("click", function(){
					//window.location.href = "delete.php?";
					let btnClicado = event.target.attributes.id.value;
					let btns = document.getElementsByTagName('button');					
					for (let i = 0; i < btns.length; i++) {

						if ( btns[i].id == event.target.id ) {	
						codProdutoExcluir = Number(btns[i].parentNode.parentNode.firstChild.firstChild.nodeValue);						
							//console.log(codProdutoExcluir) ;
						};
					};
						window.location.replace('delete.php?cod='+codProdutoExcluir);
				} );//evento de clique botoes excluir				
			};
			
			let botoesEditar = document.getElementsByClassName("btnsEditar");
			for(let i = 0; i < botoesEditar.length; i++){
				botoesEditar[i].addEventListener("click", function(){
					document.getElementById( "formEditar" ).style.display = 'block' ;
					document.getElementById("cmpCodProduto").value = botoesEditar[i].parentNode.parentNode.firstChild.firstChild.nodeValue;
				}); //evento de clique dos botoes editar
			}

		};
				

	</script>

</head>
<body>
	<h2>Produtos CRUD</h2>
	<button id="btnAdd">Adicionar </button>

	 <br>
	<form action="gravar.php" id="formGravar">
		<label>Nome: 
			<input type="text" name="gravarNome" required>			
		</label>
		</br>
		<label>Valor:
			<input type="text" name="gravarValor" required>
		</label>
		</br>
		<input type="submit">
		
		</br>
	</form>
	<button id="btnEsconder"> Esconder </button>
	<?php

		if ( isset( $_GET['gravar'] ) ) { 
			if ( $_GET['gravar'] == "1" ) {				
				echo "Registro adicionado com sucesso!";
			}else{
				echo 'Erro ao adicionar registro!';
			}
		}
		
		if ( isset($_GET['excluir']) ) {
			if ( $_GET['excluir'] == "1" ) {
				echo 'Registro deletado com sucesso!';
			}else{
				echo 'Erro ao deletar registro!';
			}				
		}

		if ( isset( $_GET['editar'] ) ) {
			if ( $_GET['editar'] == "1" ) {
				echo 'Registro alterado com sucesso!';
			}else{
				echo 'Falha ao alterar registro!';
			}
		}

		require_once('dao/ProdutoDAO.php');
		$produtoDao = new ProdutoDAO();
		$produtos = array();
		$produtos = $produtoDao->selectProdutos();	
		
		echo '<table id="tabela"> 
			<th>Cód</th>
			<th>Nome</th>
			<th>Valor (R$)</th>
			<th> Excluir </th>';
			$i = 0;
		foreach ($produtos as $key => $produtoAtual) {			

			echo "<tr>";
			echo "<td>".$produtoAtual->getIdProduto()."</td>";
			echo "<td>".$produtoAtual->getNomeProduto()."</td>";
			echo "<td>".$produtoAtual->getValorProduto()."</td>";
			echo "<td> <button  class='btnsExcluir' id='btn".$i."'> Excluir </button> </td>";
			echo "<td> <button class='btnsEditar' id='btnEditar".$i."' > Editar </button> </td>";
			echo "</tr>";			
			$i++;
		}
		echo '</table>';		
	?>
		
	<form action="editar.php" id="formEditar">
		<label>
			Código:
			<input type="text" name="codProduto" id="cmpCodProduto" readonly required>
		</label>
		</br>
		<label> Nome:
			<input type="text" name="nomeProduto" required>
		</label>
		</br>
		<label>Valor: 
			<input type="text" name="valorProduto" required>
		</label>
		</br>
		<button>Enviar</button>
	</form>

</body>
</html>