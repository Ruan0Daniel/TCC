<?php
include('conexao.php');	// Inclui o arquivo responsável por realizar a conexão com o banco de dados
$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB);

$tipo= isset($_POST['tipo']) ? $_POST['tipo'] : "";  // variável de controle para inserir os dados nas tabelas corretamente

switch ($tipo) {
    case 'notebook':	// Caso a variável seja 'notebook' essa case coleta as informações e insere a OS de Notebook no banco de dados
		$nome= isset($_POST['nome']) ? $_POST['nome'] : "";
		$cpf= isset($_POST['cpf']) ? $_POST['cpf'] : "";
		$marca= isset($_POST['marca']) ? $_POST['marca'] : "";
		$modelo= isset($_POST['modelo']) ? $_POST['modelo'] : "";
		$processador= isset($_POST['processador']) ? $_POST['processador'] : "";
		$ram= isset($_POST['ram']) ? $_POST['ram'] : "";
		$hd= isset($_POST['hd']) ? $_POST['hd'] : "";
		$placa_video= isset($_POST['placa_video']) ? $_POST['placa_video'] : "";
		$tamanho_tela= isset($_POST['tamanho_tela']) ? $_POST['tamanho_tela'] : "";
		$carregador= isset($_POST['carregador']) ? $_POST['carregador'] : "";
		$acessorios= isset($_POST['acessorios']) ? $_POST['acessorios'] : "";
		$problema= isset($_POST['problema']) ? $_POST['problema'] : "";
		$descricao_problema= isset($_POST['descricao_problema']) ? $_POST['descricao_problema'] : "";
		$descricao_orcamento= isset($_POST['descricao_orcamento']) ? $_POST['descricao_orcamento'] : "";
		
		$consulta = mysqli_query($conexao,"select * from os order by os desc limit 1");
		while($exibir = mysqli_fetch_array($consulta))
		{
			$os = $exibir['os'];
		}
		
		$os = $os + 1;	// o número da OS vai ser sempre o número da OS anterior + 1
		
		$sql = "insert into os (os, nome, cpf, tipo) values ('$os', '$nome', '$cpf', '$tipo')";

		$resultado = $conexao->query($sql) or trigger_error($conexao->error);
		
		
		
		$sql = "insert into os_notebook (os, marca, modelo, processador, ram, hd, placa_video, tamanho_tela, carregador, acessorios, problema, descricao_problema, descricao_orcamento) values ('$os', '$marca', '$modelo', '$processador', '$ram', '$hd', '$placa_video', '$tamanho_tela', '$carregador', '$acessorios', '$problema', '$descricao_problema', '$descricao_orcamento')";

		$resultado = $conexao->query($sql) or trigger_error($conexao->error);

		if($resultado==true)
		{
			header("Location: painel.php");

		}
		else 
		{
			echo "erro: Cadastro da OS não foi realizado";	
		}

		$conexao ->close();
        break;
		
	case 'pc':	// Caso a variável seja 'pc' essa case coleta as informações e insere a OS de PC no banco de dados
		$nome= isset($_POST['nome']) ? $_POST['nome'] : "";
		$cpf= isset($_POST['cpf']) ? $_POST['cpf'] : "";
		$pc= isset($_POST['pc']) ? $_POST['pc'] : "";
		$placa_mae= isset($_POST['placa_mae']) ? $_POST['placa_mae'] : "";
		$processador= isset($_POST['processador']) ? $_POST['processador'] : "";
		$ram= isset($_POST['ram']) ? $_POST['ram'] : "";
		$hd= isset($_POST['hd']) ? $_POST['hd'] : "";
		$placa_video= isset($_POST['placa_video']) ? $_POST['placa_video'] : "";
		$fonte= isset($_POST['fonte']) ? $_POST['fonte'] : "";
		$gabinete= isset($_POST['gabinete']) ? $_POST['gabinete'] : "";
		$acessorios= isset($_POST['acessorios']) ? $_POST['acessorios'] : "";
		$problema= isset($_POST['problema']) ? $_POST['problema'] : "";
		$descricao_problema= isset($_POST['descricao_problema']) ? $_POST['descricao_problema'] : "";
		$descricao_orcamento= isset($_POST['descricao_orcamento']) ? $_POST['descricao_orcamento'] : "";
		
		$consulta = mysqli_query($conexao,"select * from os order by os desc limit 1");
		while($exibir = mysqli_fetch_array($consulta))
		{
			$os = $exibir['os'];
		}
		
		$os = $os + 1; // o número da OS vai ser sempre o número da OS anterior + 1
		
		$sql = "insert into os (os, nome, cpf, tipo) values ('$os', '$nome', '$cpf', '$tipo')";

		$resultado = $conexao->query($sql) or trigger_error($conexao->error);
	
	
		
		$sql = "insert into os_pc (os, equipamento, placa_mae, processador, ram, hd, placa_video, fonte, gabinete, acessorios, problema, descricao_problema, descricao_orcamento) values ('$os', '$pc', '$placa_mae', '$processador', '$ram', '$hd', '$placa_video', '$fonte', '$gabinete', '$acessorios', '$problema', '$descricao_problema', '$descricao_orcamento')";
			
		$resultado = $conexao->query($sql) or trigger_error($conexao->error);

		if($resultado==true)
		{
			header("Location: painel.php");
		}
		else 
		{
			echo "erro: Cadastro da OS não foi realizado";
		}

		$conexao ->close();
		break;
			
	case 'macbook':
		$nome= isset($_POST['nome']) ? $_POST['nome'] : "";
		$cpf= isset($_POST['cpf']) ? $_POST['cpf'] : "";
		$macbook= isset($_POST['macbook']) ? $_POST['macbook'] : "";
		$modelo= isset($_POST['modelo']) ? $_POST['modelo'] : "";
		$ano= isset($_POST['ano']) ? $_POST['ano'] : "";
		$emc= isset($_POST['emc']) ? $_POST['emc'] : "";
		$processador= isset($_POST['processador']) ? $_POST['processador'] : "";
		$ram= isset($_POST['ram']) ? $_POST['ram'] : "";
		$placa_video= isset($_POST['placa_video']) ? $_POST['placa_video'] : "";
		$hd= isset($_POST['hd']) ? $_POST['hd'] : "";
		$carregador= isset($_POST['carregador']) ? $_POST['carregador'] : "";
		$tamanho_tela= isset($_POST['tamanho_tela']) ? $_POST['tamanho_tela'] : "";
		$acessorios= isset($_POST['acessorios']) ? $_POST['acessorios'] : "";
		$problema= isset($_POST['problema']) ? $_POST['problema'] : "";
		$descricao_problema= isset($_POST['descricao_problema']) ? $_POST['descricao_problema'] : "";
		$descricao_orcamento= isset($_POST['descricao_orcamento']) ? $_POST['descricao_orcamento'] : "";
		
		$consulta = mysqli_query($conexao,"select * from os order by os desc limit 1");
		while($exibir = mysqli_fetch_array($consulta))
		{
			$os = $exibir['os'];
		}
		
		$os = $os + 1; // o número da OS vai ser sempre o número da OS anterior + 1
		
		$sql = "insert into os (os, nome, cpf, tipo) values ('$os', '$nome', '$cpf', '$tipo')";

		$resultado = $conexao->query($sql) or trigger_error($conexao->error);
		

		$sql = "insert into os_macbook (os ,macbook, modelo, ano, emc, processador, ram, placa_video, hd, carregador, tamanho_tela, acessorios, problema, descricao_problema, descricao_orcamento) values ('$os', '$macbook', '$modelo', '$ano', '$emc','$processador', '$ram', '$placa_video', '$hd', '$carregador', '$tamanho_tela', '$acessorios', '$problema', '$descricao_problema', '$descricao_orcamento')";
			
		$resultado = $conexao->query($sql) or trigger_error($conexao->error);

		if($resultado==true)
		{
			header("Location: painel.php");
		}
		else 
		{
			echo "erro: Cadastro da OS não foi realizado";
		}
		
		$conexao ->close();
		break;
			
	case 'imac':
		$nome= isset($_POST['nome']) ? $_POST['nome'] : "";
		$cpf= isset($_POST['cpf']) ? $_POST['cpf'] : "";
		$modelo= isset($_POST['modelo']) ? $_POST['modelo'] : "";
		$ano= isset($_POST['ano']) ? $_POST['ano'] : "";
		$tamanho= isset($_POST['tamanho']) ? $_POST['tamanho'] : "";
		$emc= isset($_POST['emc']) ? $_POST['emc'] : "";
		$processador= isset($_POST['processador']) ? $_POST['processador'] : "";
		$ram= isset($_POST['ram']) ? $_POST['ram'] : "";
		$placa_video= isset($_POST['placa_video']) ? $_POST['placa_video'] : "";
		$hd= isset($_POST['hd']) ? $_POST['hd'] : "";
		$acessorios= isset($_POST['acessorios']) ? $_POST['acessorios'] : "";
		$problema= isset($_POST['problema']) ? $_POST['problema'] : "";
		$descricao_problema= isset($_POST['descricao_problema']) ? $_POST['descricao_problema'] : "";
		$descricao_orcamento= isset($_POST['descricao_orcamento']) ? $_POST['descricao_orcamento'] : "";
		
		$consulta = mysqli_query($conexao,"select * from os order by os desc limit 1");
		while($exibir = mysqli_fetch_array($consulta))
		{
			$os = $exibir['os'];
		}
		
		$os = $os + 1;
		
		$sql = "insert into os (os, nome, cpf, tipo) values ('$os', '$nome', '$cpf', '$tipo')";

		$resultado = $conexao->query($sql) or trigger_error($conexao->error);  
		
		
		
		$sql = "insert into os_imac (os, modelo, ano, tamanho, emc, processador, ram, placa_video, hd, acessorios, problema, descricao_problema, descricao_orcamento) values ('$os', '$modelo', '$ano', '$tamanho', '$emc','$processador', '$ram', '$placa_video', '$hd', '$acessorios', '$problema', '$descricao_problema', '$descricao_orcamento')";
			
		$resultado = $conexao->query($sql) or trigger_error($conexao->error);

		if($resultado==true)
		{
			header("Location: painel.php");
			//echo "Cadastro da OS realizado com sucesso";
		}
			else 
		{
			echo "erro: Cadastro da OS não foi realizado";
		}

		$conexao ->close();
		break;
		
		
	case 'evento':
		$os= isset($_POST['os']) ? $_POST['os'] : "";
		$data= isset($_POST['data']) ? $_POST['data'] : "";
		$hora= isset($_POST['hora']) ? $_POST['hora'] : "";
		$evento= isset($_POST['evento']) ? $_POST['evento'] : "";
		
		$sql = "insert into eventos (os, data, hora, evento) values ('$os', '$data', '$hora', '$evento')";
			
		$resultado = $conexao->query($sql) or trigger_error($conexao->error);

		if($resultado==true)
		{
			header("Location: painel.php");
		}
			else 
		{
			echo "erro: Cadastro do evento não foi realizado";
		}

		$conexao ->close();
		break;	
		
	case 'excluir':
		
		$os= isset($_POST['os']) ? $_POST['os'] : "";
		$equipamento= isset($_POST['equipamento']) ? $_POST['equipamento'] : "";
		
		
		
		switch($equipamento)
		{
			case 'notebook':
				$sql="delete from os_notebook where os='$os'";
				break;
				
			case 'pc':
				$sql="delete from os_pc where os='$os'"; 
				break;
				
			case 'macbook':
				$sql="delete from os_macbook where os='$os'"; 
				break;
				
			case 'imac':
				$sql="delete from os_imac where os='$os'"; 
				break;	
		}
		
		$resultado = $conexao->query($sql) or trigger_error($conexao->error);
		
		
		$sql="delete from os where os='$os'"; 
		$resultado = $conexao->query($sql) or trigger_error($conexao->error);

		if($resultado==true)
		{
			//echo "Cadastro da OS realizado com sucesso";
			//echo '<script>alert("OS cadastrada com sucesso");</script>';
			header("Location: painel.php");
			

		}
		else 
		{
			echo "erro: Cadastro da OS não foi realizado retorne e tente novamente ou contacte o suporte.";	
		}

		$conexao ->close();
        break;
		
		
	case 'editar':		
		$os= isset($_POST['os']) ? $_POST['os'] : "";
		$equipamento= isset($_POST['equipamento']) ? $_POST['equipamento'] : "";
		
		switch($equipamento)
		{
			case 'notebook':
				$nome= isset($_POST['nome']) ? $_POST['nome'] : "";
				$cpf= isset($_POST['cpf']) ? $_POST['cpf'] : "";
				$marca= isset($_POST['marca']) ? $_POST['marca'] : "";
				$modelo= isset($_POST['modelo']) ? $_POST['modelo'] : "";
				$processador= isset($_POST['processador']) ? $_POST['processador'] : "";
				$ram= isset($_POST['ram']) ? $_POST['ram'] : "";
				$hd= isset($_POST['hd']) ? $_POST['hd'] : "";
				$placa_video= isset($_POST['placa_video']) ? $_POST['placa_video'] : "";
				$tamanho_tela= isset($_POST['tamanho_tela']) ? $_POST['tamanho_tela'] : "";
				$carregador= isset($_POST['carregador']) ? $_POST['carregador'] : "";
				$acessorios= isset($_POST['acessorios']) ? $_POST['acessorios'] : "";
				$problema= isset($_POST['problema']) ? $_POST['problema'] : "";
				$descricao_problema= isset($_POST['descricao_problema']) ? $_POST['descricao_problema'] : "";
				$descricao_orcamento= isset($_POST['descricao_orcamento']) ? $_POST['descricao_orcamento'] : "";
				$valor_orcamento= isset($_POST['valor_orcamento']) ? $_POST['valor_orcamento'] : "";
				$status= isset($_POST['status']) ? $_POST['status'] : "";
				$valor_final= isset($_POST['valor_final']) ? $_POST['valor_final'] : "";
				
				
				
				$sql = "UPDATE `os_notebook` SET `marca`='$marca',`modelo`='$marca', `processador`='$processador',`ram`='$ram',`hd`='$hd',`placa_video`='$placa_video',
				`tamanho_tela`='$tamanho_tela',`carregador`='$carregador',`acessorios`='$acessorios',`problema`='$problema', `descricao_problema`='$descricao_problema',
				`descricao_orcamento`='$descricao_orcamento',`valor_orcamento`='$valor_orcamento', `status`='$status'  WHERE os='$os'";
				
				$resultado = $conexao->query($sql) or trigger_error($conexao->error);
				
				$sql = "UPDATE `os` SET `nome`='$nome',`cpf`='$cpf',`valor_final`='$valor_final' WHERE os='$os'";
				
				$resultado = $conexao->query($sql) or trigger_error($conexao->error);
				
				if($resultado==true)
				{
					//echo "Cadastro da OS realizado com sucesso";
					//echo '<script>alert("OS cadastrada com sucesso");</script>';
					header("Location: painel.php");
			
				}
				else 
				{
					echo "erro: alteração dos dados não foi concluida, retorne e tente novamente ou contacte o suporte.";	
				}

				$conexao ->close();
				
				break;
			
			case 'pc':
				$nome= isset($_POST['nome']) ? $_POST['nome'] : "";
				$cpf= isset($_POST['cpf']) ? $_POST['cpf'] : "";
				$pc= isset($_POST['pc']) ? $_POST['pc'] : "";
				$placa_mae= isset($_POST['placa_mae']) ? $_POST['placa_mae'] : "";
				$processador= isset($_POST['processador']) ? $_POST['processador'] : "";
				$ram= isset($_POST['ram']) ? $_POST['ram'] : "";
				$hd= isset($_POST['hd']) ? $_POST['hd'] : "";
				$placa_video= isset($_POST['placa_video']) ? $_POST['placa_video'] : "";
				$fonte= isset($_POST['fonte']) ? $_POST['fonte'] : "";
				$gabinete= isset($_POST['gabinete']) ? $_POST['gabinete'] : "";
				$acessorios= isset($_POST['acessorios']) ? $_POST['acessorios'] : "";
				$problema= isset($_POST['problema']) ? $_POST['problema'] : "";
				$descricao_problema= isset($_POST['descricao_problema']) ? $_POST['descricao_problema'] : "";
				$descricao_orcamento= isset($_POST['descricao_orcamento']) ? $_POST['descricao_orcamento'] : "";
				$valor_orcamento= isset($_POST['valor_orcamento']) ? $_POST['valor_orcamento'] : "";
				$status= isset($_POST['status']) ? $_POST['status'] : "";
				$valor_final= isset($_POST['valor_final']) ? $_POST['valor_final'] : "";
				
				$sql = "UPDATE `os_pc` SET `equipamento`='$pc',`placa_mae`='$placa_mae',`processador`='$processador',
				`ram`='$ram',`hd`='$hd',`placa_video`='$placa_video',`fonte`='$fonte',`gabinete`='$gabinete',`acessorios`='$acessorios',
				`problema`='$problema', `descricao_problema`='$descricao_problema', `descricao_orcamento`='$descricao_orcamento',
				`valor_orcamento`='$valor_orcamento', `status`='$status' WHERE os='$os'";
				
				$resultado = $conexao->query($sql) or trigger_error($conexao->error);
				
				$sql = "UPDATE `os` SET `nome`='$nome',`cpf`='$cpf',`valor_final`='$valor_final' WHERE os='$os'";
				
				$resultado = $conexao->query($sql) or trigger_error($conexao->error);
				
				if($resultado==true)
				{
					//echo "Cadastro da OS realizado com sucesso";
					//echo '<script>alert("OS cadastrada com sucesso");</script>';
					header("Location: painel.php");
			
				}
				else 
				{
					echo "erro: alteração dos dados não foi concluida, retorne e tente novamente ou contacte o suporte.";	
				}

				$conexao ->close();
				
				break;
			
			case 'macbook':
				$nome= isset($_POST['nome']) ? $_POST['nome'] : "";
				$cpf= isset($_POST['cpf']) ? $_POST['cpf'] : "";
				$macbook= isset($_POST['macbook']) ? $_POST['macbook'] : "";
				$modelo= isset($_POST['modelo']) ? $_POST['modelo'] : "";
				$ano= isset($_POST['ano']) ? $_POST['ano'] : "";
				$emc= isset($_POST['emc']) ? $_POST['emc'] : "";
				$processador= isset($_POST['processador']) ? $_POST['processador'] : "";
				$ram= isset($_POST['ram']) ? $_POST['ram'] : "";
				$placa_video= isset($_POST['placa_video']) ? $_POST['placa_video'] : "";
				$hd= isset($_POST['hd']) ? $_POST['hd'] : "";
				$carregador= isset($_POST['carregador']) ? $_POST['carregador'] : "";
				$tamanho_tela= isset($_POST['tamanho_tela']) ? $_POST['tamanho_tela'] : "";
				$acessorios= isset($_POST['acessorios']) ? $_POST['acessorios'] : "";
				$problema= isset($_POST['problema']) ? $_POST['problema'] : "";
				$descricao_problema= isset($_POST['descricao_problema']) ? $_POST['descricao_problema'] : "";
				$descricao_orcamento= isset($_POST['descricao_orcamento']) ? $_POST['descricao_orcamento'] : "";
				$valor_orcamento= isset($_POST['valor_orcamento']) ? $_POST['valor_orcamento'] : "";
				$status= isset($_POST['status']) ? $_POST['status'] : "";
				$valor_final= isset($_POST['valor_final']) ? $_POST['valor_final'] : "";
				
				$sql = "UPDATE `os_macbook` SET `macbook`='$macbook',`modelo`='$modelo',`ano`='$ano',`emc`='$emc',`processador`='$processador',
				`ram`='$ram',`placa_video`='$placa_video',`hd`='$hd',`carregador`='$carregador',`tamanho_tela`='$tamanho_tela',`acessorios`='$carregador',
				`problema`='$problema', `descricao_problema`='$descricao_problema', `descricao_orcamento`='$descricao_orcamento',
				`valor_orcamento`='$valor_orcamento', `status`='$status' WHERE os='$os'";
				
				$resultado = $conexao->query($sql) or trigger_error($conexao->error);
				
				$sql = "UPDATE `os` SET `nome`='$nome',`cpf`='$cpf',`valor_final`='$valor_final' WHERE os='$os'";
				
				$resultado = $conexao->query($sql) or trigger_error($conexao->error);
				
				if($resultado==true)
				{
					//echo "Cadastro da OS realizado com sucesso";
					//echo '<script>alert("OS cadastrada com sucesso");</script>';
					header("Location: painel.php");
			
				}
				else 
				{
					echo "erro: alteração dos dados não foi concluida, retorne e tente novamente ou contacte o suporte.";	
				}

				$conexao ->close();
				break;
				
			case 'imac':
				$nome= isset($_POST['nome']) ? $_POST['nome'] : "";
				$cpf= isset($_POST['cpf']) ? $_POST['cpf'] : "";
				$modelo= isset($_POST['modelo']) ? $_POST['modelo'] : "";
				$ano= isset($_POST['ano']) ? $_POST['ano'] : "";
				$tamanho= isset($_POST['tamanho']) ? $_POST['tamanho'] : "";
				$emc= isset($_POST['emc']) ? $_POST['emc'] : "";
				$processador= isset($_POST['processador']) ? $_POST['processador'] : "";
				$ram= isset($_POST['ram']) ? $_POST['ram'] : "";
				$placa_video= isset($_POST['placa_video']) ? $_POST['placa_video'] : "";
				$hd= isset($_POST['hd']) ? $_POST['hd'] : "";
				$acessorios= isset($_POST['acessorios']) ? $_POST['acessorios'] : "";
				$problema= isset($_POST['problema']) ? $_POST['problema'] : "";
				$descricao_problema= isset($_POST['descricao_problema']) ? $_POST['descricao_problema'] : "";
				$descricao_orcamento= isset($_POST['descricao_orcamento']) ? $_POST['descricao_orcamento'] : "";
				$valor_orcamento= isset($_POST['valor_orcamento']) ? $_POST['valor_orcamento'] : "";
				$status= isset($_POST['status']) ? $_POST['status'] : "";
				$valor_final= isset($_POST['valor_final']) ? $_POST['valor_final'] : "";
				
				
				$sql = "UPDATE `os_imac` SET `modelo`='$modelo',`ano`='$ano',`tamanho`='$tamanho',`emc`='$emc',`processador`='$processador',
				`ram`='$ram',`placa_video`='$placa_video',`hd`='$hd',`acessorios`='$acessorios',`problema`='$problema', `descricao_problema`='$descricao_problema', `descricao_orcamento`='$descricao_orcamento',
				`valor_orcamento`='$valor_orcamento', `status`='$status' WHERE os='$os'";
				
				$resultado = $conexao->query($sql) or trigger_error($conexao->error);
				
				$sql = "UPDATE `os` SET `nome`='$nome',`cpf`='$cpf',`valor_final`='$valor_final' WHERE os='$os'";
				
				$resultado = $conexao->query($sql) or trigger_error($conexao->error);
				
				if($resultado==true)
				{
					//echo "Cadastro da OS realizado com sucesso";
					//echo '<script>alert("OS cadastrada com sucesso");</script>';
					header("Location: painel.php");
			
				}
				else 
				{
					echo "erro: alteração dos dados não foi concluida, retorne e tente novamente ou contacte o suporte.";	
				}

				$conexao ->close();
				
			
				break;
				
			case 'evento':
				$id= isset($_POST['id']) ? $_POST['id'] : "";
				$data= isset($_POST['data']) ? $_POST['data'] : "";
				$hora= isset($_POST['hora']) ? $_POST['hora'] : "";
				$evento= isset($_POST['evento']) ? $_POST['evento'] : "";
				
				
				$sql = "UPDATE `eventos` SET `data`='$data',`hora`='$hora',`evento`='$evento' WHERE id ='$id'";
				
				$resultado = $conexao->query($sql) or trigger_error($conexao->error);
				
				if($resultado==true)
				{
					//echo "Cadastro da OS realizado com sucesso";
					//echo '<script>alert("OS cadastrada com sucesso");</script>';
					header("Location: visualizar_eventos.php");
					
				}
				else 
				{
					echo "erro: alteração dos dados não foi concluida, retorne e tente novamente ou contacte o suporte.";	
				}

				$conexao ->close();
				
			
				break;
		}
		
	
	
		break;
		
		
	case 'finalizar_os':
		$os= isset($_POST['os']) ? $_POST['os'] : "";
		
		$sql="update os set estado='finalizado' where os='$os'";
		$resultado = $conexao->query($sql) or trigger_error($conexao->error);
		
		if($resultado==true)
				{
					//echo "Cadastro da OS realizado com sucesso";
					//echo '<script>alert("OS cadastrada com sucesso");</script>';
					header("Location: painel.php");
					
				}
				else 
				{
					echo "erro: A os NÃO foi fechada corretamente.";	
				}

		$conexao ->close();
        break;	
		
	case 'abrir_os':
		$os= isset($_POST['os']) ? $_POST['os'] : "";
		
		$sql="update os set estado='aberto' where os='$os'";
		$resultado = $conexao->query($sql) or trigger_error($conexao->error);
		
		if($resultado==true)
				{
					//echo "Cadastro da OS realizado com sucesso";
					//echo '<script>alert("OS cadastrada com sucesso");</script>';
					header("Location: painel.php");
					
				}
				else 
				{
					echo "erro: A os NÃO foi fechada corretamente.";	
				}

		$conexao ->close();
        break;	
		
		case 'encaminhar_os':
		$os= isset($_POST['os']) ? $_POST['os'] : "";
		
		$sql="update os set estado='pendente' where os='$os'";
		$resultado = $conexao->query($sql) or trigger_error($conexao->error);
		
		if($resultado==true)
				{
					//echo "Cadastro da OS realizado com sucesso";
					//echo '<script>alert("OS cadastrada com sucesso");</script>';
					header("Location: painel.php");
					
				}
				else 
				{
					echo "erro: A os NÃO foi fechada corretamente.";	
				}

		$conexao ->close();
        break;
		
		case 'aprovar_os':
			$os= isset($_POST['os']) ? $_POST['os'] : "";
		
		$sql="update os set estado='aprovado' where os='$os'";
		$resultado = $conexao->query($sql) or trigger_error($conexao->error);
		
		if($resultado==true)
				{
					//echo "Cadastro da OS realizado com sucesso";
					//echo '<script>alert("OS cadastrada com sucesso");</script>';
					header("Location: painel.php");
					
				}
				else 
				{
					echo "erro: A os NÃO foi fechada corretamente.";	
				}

		$conexao ->close();
        break;
		
		case 'editar_usuario':
			$id= isset($_POST['id']) ? $_POST['id'] : "";
			$nome= isset($_POST['nome']) ? $_POST['nome'] : "";
			$login= isset($_POST['login']) ? $_POST['login'] : "";
			$senha= isset($_POST['senha']) ? $_POST['senha'] : "";
			$nivel= isset($_POST['nivel']) ? $_POST['nivel'] : "";
		
		$sql="UPDATE `usuarios` SET `nome`='$nome',`login`='$login',`senha`=md5('$senha'),`nivel`='$nivel' WHERE login = '$login'";
		$resultado = $conexao->query($sql) or trigger_error($conexao->error);
		
		if($resultado==true)
				{
					//echo "Cadastro da OS realizado com sucesso";
					//echo '<script>alert("OS cadastrada com sucesso");</script>';
					header("Location: gerenciar_usuarios.php");
					
				}
				else 
				{
					echo "erro: A os NÃO foi fechada corretamente.";	
				}

		$conexao ->close();
        break;
		
		
		case 'adicionar_usuario':
			$nome= isset($_POST['nome']) ? $_POST['nome'] : "";
			$login= isset($_POST['login']) ? $_POST['login'] : "";
			$senha= isset($_POST['senha']) ? $_POST['senha'] : "";
			$nivel= isset($_POST['nivel']) ? $_POST['nivel'] : "";
		
		$sql="INSERT INTO `usuarios`(`nome`, `login`, `senha`, `nivel`) VALUES ('$nome','$login',md5('$senha'),'$nivel') ";
		$resultado = $conexao->query($sql) or trigger_error($conexao->error);
		
		if($resultado==true)
				{
					//echo "Cadastro da OS realizado com sucesso";
					//echo '<script>alert("OS cadastrada com sucesso");</script>';
					header("Location: gerenciar_usuarios.php");
					
				}
				else 
				{
					echo "erro: A os NÃO foi fechada corretamente.";	
				}

		$conexao ->close();
        break;
		
		
	case 'excluir_usuario':
			$login= isset($_POST['login']) ? $_POST['login'] : "";
			$id= isset($_POST['id']) ? $_POST['id'] : "";
		
		$sql="delete from usuarios where login='$login' ";
		$resultado = $conexao->query($sql) or trigger_error($conexao->error);
		
		if($resultado==true)
				{
					//echo "Cadastro da OS realizado com sucesso";
					//echo '<script>alert("OS cadastrada com sucesso");</script>';
					header("Location: gerenciar_usuarios.php");
					
				}
				else 
				{
					echo "erro: A os NÃO foi fechada corretamente.";	
				}

		$conexao ->close();
        break;
	
}
?>
