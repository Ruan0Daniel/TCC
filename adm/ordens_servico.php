<?php
include('verificar_login.php'); 
include('conexao.php'); // Arquivo PHP com as informações de conexão ao banco de dados
$login = $_SESSION['usuario'];


	// Verificação de permissão para acessar o conteúdo da página
	$query= "SELECT * FROM usuarios where login='$login'";
	$resultado = mysqli_query($conexao, $query);
	while($exibir = mysqli_fetch_assoc($resultado))
	{
		$nome = $exibir['nome'];
		$nivel = $exibir['nivel'];
	}

	if($nivel > 0)
	{
		header("Location: painel.php");
	}

?>

<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Xtreme lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Xtreme admin lite design, Xtreme admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Xtreme Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Ordens de Serviço</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtreme-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
	<style>
		.pagination{display:inline-block;padding-left:0;margin:20px 0;border-radius:4px}.pagination>li{display:inline}.pagination>li>a,.pagination>li>span{position:relative;float:left;padding:6px 12px;margin-left:-1px;line-height:1.42857143;color:#337ab7;text-decoration:none;background-color:#fff;border:1px solid #ddd}.pagination>li:first-child>a,.pagination>li:first-child>span{margin-left:0;border-top-left-radius:4px;border-bottom-left-radius:4px}.pagination>li:last-child>a,.pagination>li:last-child>span{border-top-right-radius:4px;border-bottom-right-radius:4px}.pagination>li>a:focus,.pagination>li>a:hover,.pagination>li>span:focus,.pagination>li>span:hover{z-index:2;color:#23527c;background-color:#eee;border-color:#ddd}.pagination>.active>a,.pagination>.active>a:focus,.pagination>.active>a:hover,.pagination>.active>span,.pagination>.active>span:focus,.pagination>.active>span:hover{z-index:3;color:#fff;cursor:default;background-color:#337ab7;border-color:#337ab7}.pagination>.disabled>a,.pagination>.disabled>a:focus,.pagination>.disabled>a:hover,.pagination>.disabled>span,.pagination>.disabled>span:focus,.pagination>.disabled>span:hover{color:#777;cursor:not-allowed;background-color:#fff;border-color:#ddd}.pagination-lg>li>a,.pagination-lg>li>span{padding:10px 16px;font-size:18px;line-height:1.3333333}.pagination-lg>li:first-child>a,.pagination-lg>li:first-child>span{border-top-left-radius:6px;border-bottom-left-radius:6px}.pagination-lg>li:last-child>a,.pagination-lg>li:last-child>span{border-top-right-radius:6px;border-bottom-right-radius:6px}.pagination-sm>li>a,.pagination-sm>li>span{padding:5px 10px;font-size:12px;line-height:1.5}.pagination-sm>li:first-child>a,.pagination-sm>li:first-child>span{border-top-left-radius:3px;border-bottom-left-radius:3px}.pagination-sm>li:last-child>a,.pagination-sm>li:last-child>span{border-top-right-radius:3px;border-bottom-right-radius:3px}

		
		.item label{
			display: block;
			cursor: pointer;
			border-buttom: solid 2pc #aaa;
		}
		
		
		
		.item ul{
			width: 100%;
			list-style: none;
			overflow: hidden;
			max-height: 0;
			transition: all .3s linear
			
		}
		
		.item input{
		display: none;
		}
		
		.item ul li a:hover{
			background-color: #e5e5e5;
		}
		
		.item ul li a{
		text-align: center;
		line-height:35px;
		
		
		width: 100%;
		height: 35px;
		
		
		display: block;
		text-decoration: none;
		background-color: #fafafa;
		color: #333;
		border-buttom: solid 2px #aaa;
		
		
		
		}
		
		<!-- Configurações da caixa de Ordens de serviço -->
		
		.os label{
			display: block;
			cursor: pointer;
			border-buttom: solid 2pc #aaa;
		}
		
		.os ul{
			height: auto;
			max-height: 200px;
			tranform: all ;
		}
		
		.os input{
			display: none;
		}
		
		.os ul li a:hover{
			background-color: #e5e5e5;
		}
		
		.os ul li a{
			text-align: center;
			line-height:35px;
			width: 100%;
			height: 35px;
			display: block;
			text-decoration: none;
			background-color: #fafafa;
			color: #333;
			border-buttom: solid 2px #aaa;
		}
		
		.os input:checked ~ ul{
			width: 100%;
			list-style: none;
			overflow: hidden;
			max-height: 0;
			transition: all .3s linear;
			
		}
		
		
		
		.item input:checked ~ ul{
		height: auto;
		max-height: 200px;
		tranform: all;
		}
		
		.sammy-wrap {
			border-radius: 6px;
			background-color: aliceblue;
			border: 2px dashed gray;
			max-width: 70%;
			padding: 1em;
			margin-bottom: .4em;
		}
		
		.sammy-nowrap-1 {
			border-radius: 6px;
			background-color: aliceblue;
			border: 2px dashed gray;
			max-width: 70%;
			padding: 1em;
			margin-bottom: .4em;
			white-space: nowrap;
		}
		
		.sammy-nowrap-2 {
			border-radius: 6px;
			background-color: aliceblue;
			border: 2px dashed gray;
			max-width: 70%;
			padding: 1em;
			margin-bottom: .4em;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
		}
		
		.editar
		{ 
			background-color: #ebf328;
			height: 27px;
			border: none;
			outline: 0;
			cursor: pointer;
			width: 85px;
			margin: 0 auto;
			text-align: center;
			font-weight: bold;
			border-radius: 12px;
		}
		
		.encaminhar
		{ 
			background-color: #43e20e;
			height: 27px;
			border: none;
			outline: 0;
			cursor: pointer;
			width: 60px;
			margin: 0 auto;
			text-align: center;
			font-weight: bold;
			border-radius: 12px;
		}
		
		.excluir
		{ 
			background-color:#f43528;
			height: 27px;
			border: none;
			outline: 0;
			cursor: pointer;
			width: 60px;
			margin: 0 auto;
			text-align: center;
			font-weight: bold;
			border-radius: 12px;
		}
		
</style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-start me-auto">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="search-box"> <a class="nav-link waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                    class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-end">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile d-flex no-block dropdown m-t-20">
                                <div class="user-pic"><img src="assets/images/users/1.jpg" alt="users"
                                        class="rounded-circle" width="40" /></div>
                                <div class="user-content hide-menu m-l-10">
                                    <a href="#" class="" id="Userdd" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h5 class="m-b-0 user-name font-medium"><?php echo$nome;?> <i
                                                class="fa fa-angle-down"></i></h5>
                                        <span class="op-5 user-email">  <?php echo $_SESSION['usuario']; ?></span>
                                    </a>
                                    
									<div class="dropdown-menu dropdown-menu-end" aria-labelledby="Userdd">
                                       <!-- <a class="dropdown-item" href="javascript:void(0)"><i
                                                class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                        <a class="dropdown-item" href="javascript:void(0)"><i
                                                class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                                        <a class="dropdown-item" href="javascript:void(0)"><i
                                                class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0)"><i
                                                class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                        <div class="dropdown-divider"></div> -->
                                        <a class="dropdown-item" href="logout.php"><i
                                                class="fa fa-power-off m-r-5 m-l-5"></i> Sair </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li> <br>
                        
                        <!-- User Profile-->
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="painel.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu"> Painel Principal </span></a></li> <label> </label>
                        
						
						 <!-- <li class="sidebar-item"> 
							<a class="sidebar-link waves-effect waves-dark sidebar-link" href="eventos.php" aria-expanded="false">
								<i class="mdi mdi-border-all"></i>
								<span class="hide-menu">Eventos</span>
							</a>
						</li> -->
						
						<li class="sidebar-item item">
								<input type="checkbox" id="check1">
								<label for="check1"> 
									<a class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
									<i class="mdi mdi-border-all"></i>
									<span class="hide-menu">Eventos</span> </a>
								</label> 
								<ul>
									<li> <a href="inserir_evento.php"> Inserir Eventos </a> </li>
									<li> <a href="visualizar_eventos.php"> Visualizar Eventos </a> </li>
								</ul> 
						</li>
									
						
						
						
						<li class="sidebar-item item"> 
							<input type="checkbox" id="check2">
							<label for="check2"> 
								<a class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
									<i class="mdi mdi-file"></i>
									<span class="hide-menu"> Ordem de Serviço </span>
								</a>
							</label>
							
							<ul>
								<li> <a href="os_notebook.php"> Notebook </a> </li>
								<li> <a href="os_pc.php"> PC </a> </li>
								<li> <a href="os_macbook.php"> Macbook </a> </li>
								<li> <a href="os_imac.php"> iMac </a> </li>
							</ul> 
							
                        </li>
						
						<li class="sidebar-item os"> 
							<input type="checkbox" id="check3">
							<label for="check3"> 
								<a class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
									<i class="mdi mdi-account-network"></i>
									<span class="hide-menu"> Gerencia </span>
								</a>
							</label>
							
							<ul>
								<li> <a href="pendentes.php"> Orçamentos Pendentes </a> </li>
								<li> <a href=""> <b> Ordens de Serviço </b> </a> </li>
								<li> <a href="gerenciar_usuarios.php"> Gerenciar Usuarios </a> </li>
							</ul> 
							
                        </li>
						
						
						
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">Ordens de Serviço</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Gerência</li>
                                    <li class="breadcrumb-item active" aria-current="page">Ordens de Serviço</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="text-end upgrade-btn">
                            <a href="https://www.wrappixel.com/templates/xtremeadmin/" class="btn btn-danger text-white"
                                target="_blank">Upgrade to Pro</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
             
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- title -->
                                <div class="d-md-flex">
                                    <div>
                                        <h4 class="card-title">Ordens de Serviço</h4>
                                        <h5 class="card-subtitle">Visão geral dos serviços</h5>
                                    </div>
                                   <div class="ms-auto">
                                        <!-- <div class="dl">
											<form name="organizador" action="cadastrar.php" method="POST">
												<select name='options' class="form-select shadow-none" onchange="this.form.submit()">
													<option value="0">Monthly</option>
													<option value="1">Daily</option>
													<option value="2">Weekly</option>
													<option value="3">Yearly</option>
												</select>
											</form>
                                        </div> -->
                                    </div>
                                </div>
								
                                <!-- title -->
                            </div>
                            <div class="table-responsive">
                                <table width='100%' >
								
                                    <thead>
                                        <tr class="bg-light" align='center'>
                                            <th class="border-top-0">OS</th>
											<th class="border-top-0">Nome</th>
                                            <th class="border-top-0">Equipamento</th>		
											<th class="border-top-0">Estado</th>	
											<th class="border-top-0">Telefone</th>
											<th class="border-top-0">Valor</th>											
											<th class="border-top-0">Ações</th>
											
                                        </tr>
                                    </thead>
									
									
									<tbody>
										
									<?php
									
									
									// Verificar se está sendo passado na URL a página atual, se não atribui 1
									$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
									
									
									//Verificar a pagina anterior e posterior
									$pagina_anterior = $pagina - 1;
									$pagina_posterior = $pagina + 1;
									
									// Define a quantidade de registros por páginas
									$quantidade_pagina = 4;			
									
									$ordens_servico = "SELECT * FROM os";
									$resultado_os = mysqli_query($conexao, $ordens_servico);
									
									// contar o total de registros
									$total_registros = mysqli_num_rows($resultado_os);
									
									// calcular o número páginas necessárias para apresentar os registros
									$num_paginas = ceil($total_registros/$quantidade_pagina);
									
									//calcular o início da visualização
									$inicio = ($quantidade_pagina * $pagina) - $quantidade_pagina;
									
									
									$ordens_servico = "SELECT * FROM os order by os desc limit $inicio, $quantidade_pagina";
									$resultado_os = mysqli_query($conexao, $ordens_servico);
									while($exibir = mysqli_fetch_assoc($resultado_os))
									{
										
										echo"<tr align='center'>";
										
											echo"<td>";
												echo" ".$exibir['os'];	
											echo"</td>";
										
											echo"<td>";
													echo" <div class='m-r-10'> ";
														echo" ".$exibir['nome'];	
													echo"</div>";
											echo"</td>";
										
											echo"<td>";
												echo" ".$exibir['tipo'];	
											echo"</td>";
											
											$os = $exibir['os'];
											$telefone = $exibir['telefone'];
											$tipo = $exibir['tipo'];
											$estado = $exibir['estado'];
											$valor_final = $exibir['valor_final'];
											
											
											
											echo"<td>";
												echo$estado;
											echo"</td>";
											
											echo"<td>";
												echo$telefone;
											echo"</td>";
											
											
											
											echo"<td>";
												echo$valor_final;
											echo"</td>";
											
											echo"<td>";
											
											
												echo"<table>";
													echo"<tr>";
														echo"<td>";
															echo"<form action='cadastrar.php' method='POST'>";	
																echo'<input type="hidden" name="tipo" value="excluir">';
																
																echo'<input type="hidden" name="os"';
																echo"value='$os'>";
																
																echo'<input type="hidden" name="equipamento"';
																echo"value='$tipo'>";
																
																echo" <input class='excluir' type='submit' name='excluir' value='Excluir'>";
															echo"</form>";
														echo"</td>";

														echo"<td>";
															echo"<form action='visualizar_os.php' method='POST'>";	
																
																echo'<input type="hidden" name="os"';
																echo"value='$os'>";
																
																echo'<input type="hidden" name="equipamento"';
																echo"value='$tipo'>";
																
																echo" <input class='editar' type='submit' name='encaminhar' value='Visualizar'>";
															echo"</form>";
														echo"</td>";
														
														if($estado == 'finalizado') {
														
														echo"<td>";
															echo"<form action='cadastrar.php' method='POST'>";	
																echo'<input type="hidden" name="tipo" value="abrir_os">';
																
																echo'<input type="hidden" name="os"';
																echo"value='$os'>";
																
																echo" <input class='encaminhar' type='submit' name='abrir' value='Abrir'>";
															echo"</form>";
														echo"</td>";
														}
														
													echo"</tr>";	
												echo"</table>";								
											echo"</td>";
											
											
										echo"</tr>";
									}
									?>	
									
                                    </tbody>
									
                                </table> 
                            </div>
                        </div>
						<table align="center">
								<tr>
									<td align='center'>
										<nav>
											<ul class="pagination">
												<li>			
													<?php
														if($pagina_anterior != 0){ ?>
															<a href="ordens_servico.php?pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
																<span aria-hidden="true">&laquo;</span>
															</a>
													<?php }else{ ?>
														<span aria-hidden="true">&laquo;</span>
													<?php }  ?>
												</li>
												
												<?php 
													for($i = 1; $i < $num_paginas + 1; $i++)
													{ 
														if($i == $pagina)
														{ 
															echo"<li>";
																echo"<a href=ordens_servico.php?pagina=$i>";
																	echo"<b>";
																		echo $i;
																	echo"</b>";
																echo"</a>";
															echo"</li>";		
														}
														else
														{
															echo"<li>";
																echo"<a href=ordens_servico.php?pagina=$i>";
																	echo $i;
																echo"</a>";
															echo"</li>";	
														}		
													} 
												?>
									
												<li>
													<?php
														if($pagina_posterior <= $num_paginas){ ?>
															<a href="ordens_servico.php?pagina=<?php echo $pagina_posterior; ?>" aria-label="Previous">
																<span aria-hidden="true">&raquo;</span>
															</a>
														<?php }else{ ?>
															<span aria-hidden="true">&raquo;</span>
													<?php }  ?>
												</li>
											</ul>
										</nav>
									</td>
								</tr>
							</table>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                Todos os direitos reservados. Designer e Desenvolvimento. <a
                    href="https://www.wrappixel.com">Xtreme</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="dist/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>