<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Usuario</title>
</head>
<body>

	<h1>		Cadastro Usuario:	</h1><br/>
	<form action="../../controllers/Usuario.php" method="post" id="form1">
		Nome: <br/>
				<input type="text" name="nome" size="30" placeholder="Digite login"> <br/>
		Senha: <br/>
		<input type="password" name="senha" size="30" placeholder="Digite a senha"> <br/>
		<input type="submit" name="Submit" value="Salvar">
	</form>
</body>
</html>