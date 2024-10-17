<?php
	if (isset($_POST['btn'])) {
		$user = $_POST['username'];
		$cidade = $_POST['cidade'];
		$uf = $_POST['uf'];
		$nomeArquivo = "alunos.txt";
		$arquivo = fopen($nomeArquivo, "a+");
		fwrite($arquivo, "$user;$cidade;$uf" . PHP_EOL);
		fclose($arquivo);
		echo "<h3>Aluno(a) $user cadastrado com sucesso!!! </h3>";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<h1>Cadastro de Alunos</h1>
	<fieldset>
		<form method="POST">
			<p>
				Nome do aluno: <br> <input type="text" name="username">
			</p>
			<p>
				Cidade: <br> <input type="text" name="cidade">
			</p>
			<p>
				Estado: <br> 
				<select id="uf" name="uf">
			    <option value="AC">Acre</option>
			    <option value="AL">Alagoas</option>
			    <option value="AP">Amapá</option>
			    <option value="AM">Amazonas</option>
			    <option value="BA">Bahia</option>
			    <option value="CE">Ceará</option>
			    <option value="DF">Distrito Federal</option>
			    <option value="ES">Espírito Santo</option>
			    <option value="GO">Goiás</option>
			    <option value="MA">Maranhão</option>
			    <option value="MT">Mato Grosso</option>
			    <option value="MS">Mato Grosso do Sul</option>
			    <option value="MG">Minas Gerais</option>
			    <option value="PA">Pará</option>
			    <option value="PB">Paraíba</option>
			    <option value="PR">Paraná</option>
			    <option value="PE">Pernambuco</option>
			    <option value="PI">Piauí</option>
			    <option value="RJ">Rio de Janeiro</option>
			    <option value="RN">Rio Grande do Norte</option>
			    <option value="RS">Rio Grande do Sul</option>
			    <option value="RO">Rondônia</option>
			    <option value="RR">Roraima</option>
			    <option value="SC">Santa Catarina</option>
			    <option value="SP">São Paulo</option>
			    <option value="SE">Sergipe</option>
			    <option value="TO">Tocantins</option>
			    <option value="EX">Estrangeiro</option>
				</select>
			</p>
			<p>
				<input type="submit" name="btn" value="Cadastrar">
			</p>
		</form>
	</fieldset>
</body>
</html>

<?php
	if (file_exists("alunos.txt")) {
		$abrir = file("alunos.txt");
		foreach ($abrir as $linha) {
			$aluno = explode(";", $linha);
			echo "<b>Nome:</b> $aluno[0]<br>";
			echo "<b>Cidade:</b> $aluno[1]<br>";
			echo "<b>Estado:</b> $aluno[2]<br> <hr>";
		}
	}
?>