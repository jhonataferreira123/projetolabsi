<?php include('header.php') ?>


<form class="form" method="POST" action="senha.php">
  <label for="inputEmail">Login</label>
  <input id="inputEmail" name="login" type="text" placeholder="Digite o seu login..." /><br><br>
  <label for="inputPassword">Senha</label>
  <input id="inputPassword" name="senha" type="password" placeholder="Digite a sua senha..." /><br><br>

	<p class="submit">
			<input type="submit" value="Entrar" />
	</p>
</form>

<?php include('footer.php') ?>