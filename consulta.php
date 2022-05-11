<?php 

	include('adm/conexao.php');

	$os= isset($_POST['os']) ? $_POST['os'] : "";
	$cpf= isset($_POST['cpf']) ? $_POST['cpf'] : "";
	
	$query = "select * from os where os='$os' and cpf='$cpf'";
	$resultado = mysqli_query($conexao, $query);
	$num_rows = mysqli_num_rows($resultado);

 ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Consultar</title>
<!--
Newline Template
https://templatemo.com/tm-503-newline
-->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/templatemo-style.css">

        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>

        <div class="overlay"></div>
        <section class="top-part">
          <!--<video controls autoplay loop>
            <source src="videos/v.mp4" type="video/mp4">
            <source src="videos/v.ogg" type="video/ogg">
          </video> -->
        </section>
        
        <section class="cd-hero">



          <ul class="cd-hero-slider">
		  
            <li class="selected">
              <div class="heading">
                <h1>Consultar</h1>
                <span>Verifique o status do seus equipamentos</span> 
              </div>
              <div class="cd-half-width fourth-slide">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="content fourth-content">
		
						<?php
							if($num_rows != 1)
							{
								echo "<font color='red'> <b> <h4> Nenhum registro encontrado </h4> </b> </font>";
								echo "<p> O número da OS e/ou CPF estão ou estão vazios ou estão incorretos, volte e tente novamente, caso o erro continue, procure a ajuda em nosso canal no whatsApp. </p>";	
							}
							else
							{
								$query = "select * from os where os = $os";
								$resultado = mysqli_query($conexao, $query);
								while($exibir = mysqli_fetch_assoc($resultado))
								{
									$tipo = $exibir['tipo'];
									echo "<b> Ordem de Serviço: </b>".$exibir['os']."&nbsp &nbsp";
									echo "<b> Nome: </b>".$exibir['nome']."&nbsp &nbsp ";
									echo "<b> CPF: </b>".$exibir['cpf']."<br> <br> <br>";
									
									switch($tipo)
									{
										case 'notebook':
														
											$query = "select * from os_notebook where os = $os";
											$resultado = mysqli_query($conexao, $query);
											while($exibir = mysqli_fetch_assoc($resultado))
											{
												echo "<b> Notebook: </b>".$exibir['marca']." ". $exibir['modelo']."<br>";
												echo "<b> Processador: </b>".$exibir['processador']."<br>";
												echo "<b> Memória Ram: </b>".$exibir['ram']."<br>";
												echo "<b> HD: </b>".$exibir['hd']."<br>";
												echo "<b> Placa de Vídeo: </b>".$exibir['placa_video']."<br>";
												echo "<b> Tamanho da tela: </b>".$exibir['tamanho_tela']."<br>";
												echo "<b> Carregador: </b>".$exibir['carregador']."<br>";
												echo "<b> Acessórios: </b>".$exibir['acessorios']."<br>";
												echo "<b> Problema: </b>".$exibir['problema']."<br> <br> <br>";
											}
											break;
														
														
										case 'pc':
											$query = "select * from os_pc where os = $os";
											$resultado = mysqli_query($conexao, $query);
											while($exibir = mysqli_fetch_assoc($resultado))
											{
												echo "<b> Equipamento: </b>".$exibir['equipamento']."<br>";
												echo "<b> Placa Mãe: </b>".$exibir['placa_mae']."<br>";
												echo "<b> Processador: </b>".$exibir['processador']."<br>";
												echo "<b> Memória Ram: </b>".$exibir['ram']."<br>";
												echo "<b> HD: </b>".$exibir['hd']."<br>";
												echo "<b> Placa de Vídeo: </b>".$exibir['placa_video']."<br>";
												echo "<b> Fonte: </b>".$exibir['fonte']."<br>";
												echo "<b> Gabinete: </b>".$exibir['gabinete']."<br>";
												echo "<b> Acessórios: </b>".$exibir['acessorios']."<br>";
												echo "<b> Problema: </b>".$exibir['problema']."<br> <br> <br>";
											}
											break;
															
										case 'macbook':
											$query = "select * from os_macbook where os = $os";
											$resultado = mysqli_query($conexao, $query);
											while($exibir = mysqli_fetch_assoc($resultado))
											{
												echo "<b> Macbook: </b>".$exibir['macbook']." ".$exibir['ano']." ".$exibir['modelo']."<br>";
												echo "<b> EMC: </b>".$exibir['emc']."<br>";
												echo "<b> Processador: </b>".$exibir['processador']."<br>";
												echo "<b> Memória Ram: </b>".$exibir['ram']."<br>";
												echo "<b> HD: </b>".$exibir['hd']."<br>";
												echo "<b> Placa de Vídeo: </b>".$exibir['placa_video']."<br>";
												echo "<b> Tamanho da tela: </b>".$exibir['tamanho_tela']."<br>";
												echo "<b> Carregador: </b>".$exibir['carregador']."<br>";
												echo "<b> Acessórios: </b>".$exibir['acessorios']."<br>";
												echo "<b> Problema: </b>".$exibir['problema']."<br> <br> <br>";					
											}												
											break;
														
										case 'imac':
											$query = "select * from os_imac where os = $os";
											$resultado = mysqli_query($conexao, $query);
											while($exibir = mysqli_fetch_assoc($resultado))
											{
												echo "<b> iMac: </b>".$exibir['tamanho']."  ". $exibir['ano']. "  ".$exibir['modelo']."<br>";
												echo "<b> Processador: </b>".$exibir['processador']."<br>";
												echo "<b> Memória Ram: </b>".$exibir['ram']."<br>";
												echo "<b> HD: </b>".$exibir['hd']."<br>";
												echo "<b> Placa de Vídeo: </b>".$exibir['placa_video']."<br>";
												echo "<b> Acessórios: </b>".$exibir['acessorios']."<br>";
												echo "<b> Problema: </b>".$exibir['problema']."<br> <br> <br>";
											}
											break;					
									}
								}	
								
								$query2 = "select * from eventos where os = $os";
								$resultado2 = mysqli_query($conexao, $query2);
								while($exibir2 = mysqli_fetch_assoc($resultado2))
								{
									$id = $exibir2['id'];
													
									echo"<table>";
										echo"<tr>";
											echo"<td align='left'>";
												echo "<b>".$exibir2['data']." - ". $exibir2['hora']." &nbsp  &nbsp";
											echo"</td>";
										echo"</tr>";
										
										echo"<tr>";
											echo"<td>";
												echo "<b>Descrição: </b>".$exibir2['evento']."";
											echo"</td>";
										echo"</tr>";

									echo"</table>";
									
									echo"<hr>";
								}
								
								
								
								
								
								
							}
						
						?>
						<br>
                      </div>
                    </div>
                  </div>                  
                </div>
              </div>
            </li>

          </ul> <!-- .cd-hero-slider -->
        </section> <!-- .cd-hero -->


        <footer>
          <p>Copyright &copy; 2022 Xtreme</p>
        </footer>
    
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>