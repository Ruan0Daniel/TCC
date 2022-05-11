<?php 

	include('verificar_login.php'); 
	include('conexao.php'); // Arquivo PHP com as informações de conexão ao banco de dados
	$login = $_SESSION['usuario'];
	
	$id= isset($_POST['id']) ? $_POST['id'] : "";
	
	$query = "select * from eventos where id = '$id'";
	$resultado = mysqli_query($conexao, $query);
	while($exibir = mysqli_fetch_assoc($resultado))
	{
		$data = $exibir['data'];
		$hora = $exibir['hora'];
		$evento = $exibir['evento'];
	}

	$query= "SELECT * FROM usuarios where login='$login'";
	$resultado = mysqli_query($conexao, $query);
	while($exibir = mysqli_fetch_assoc($resultado))
	{
		$nome = $exibir['nome'];
		$nivel = $exibir['nivel'];
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
    <title>Editar Eventos</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtreme-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
		.item label{
			display: block;
			cursor: pointer;
			border-buttom: solid 2pc #aaa;
		}
		
		.item ul{
			height: auto;
			max-height: 200px;
			tranform: all;
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
		
		.item input:checked ~ ul{
			width: 100%;
			list-style: none;
			overflow: hidden;
			max-height: 0;
			transition: all .3s linear
		}
		
		
		<!-- Configurações da caixa de Ordens de serviço -->
		
		.os label{
			display: block;
			cursor: pointer;
			border-buttom: solid 2pc #aaa;
		}
		
		.os ul{
			width: 100%;
			list-style: none;
			overflow: hidden;
			max-height: 0;
			transition: all .3s linear;
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
			height: auto;
			max-height: 200px;
			tranform: all ;
			
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
                        <!--<li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                    class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                    </ul>-->
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-end">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <!--<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i>
                                    My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i>
                                    My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i>
                                    Inbox</a>
                            </ul>
                        </li>-->
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
                                        <span class="op-5 user-email"><?php echo $_SESSION['usuario']; ?></span>
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
                                        <div class="dropdown-divider"></div>-->
                                        <a class="dropdown-item" href="logout.php"><i
                                                class="fa fa-power-off m-r-5 m-l-5"></i> Sair</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li> <br>
                        
                        <!-- User Profile-->
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="painel.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Painel Principal</span></a></li> <label> </label>
						</li>
						
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
							
								
						
						<li class="sidebar-item os"> 
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


						
						<?php if($nivel == 0) {  ?> 
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
								<li> <a href="ordens_servico.php"> Ordens de Serviço </a> </li>
								<li> <a href="gerenciar_usuarios.php"> Gerenciar Usuarios </a> </li>
							</ul> 
							
                        </li> <?php } ?>
									
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
                        <h4 class="page-title">Editar Evento</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Eventos</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Visualizar Eventos</li>
									<li class="breadcrumb-item active" aria-current="page">Editar Evento</li>
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
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">  <!-- bloco de abertura -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Editar um evento</h4>
                                <h6 class="card-subtitle"> Edite os campos que deseja modificar e clique em salvar</h6> <br> <br>
                                
								<div align="center"> <!-- Formulário de Eventos -->
									
									<div align="left">
									
										<form method='POST' action='cadastrar.php'>
										
											<?php echo"<input type='hidden' name='id' value='$id'>";?>
											<input type='hidden' name='tipo' value='editar'>
											<input type='hidden' name='equipamento' value='evento'>
											<b> Data e Hora </b> 
											<hr>
					
											<table width=100%>
												<tr>
													<td width=15%>
														Data: <input type=text name=data value="<?php echo $data; ?>" style="width: 100px;">
													</td>

													<td>
														Hora: <input type=text name=hora value="<?php echo $hora; ?>" style="width: 65px;">
													</td>
												</tr>
											</table> <br><br>
				
											<b> Descrição do Evento </b> <hr> 
						
											
											<textarea rows=6 cols=50 name=evento> <?php echo $evento; ?> </textarea> <br> 
											<br>
					
											<hr> 
	
											<div align=center>
												<input type=submit value=Salvar>
												
											</div>	
										</form>
									</div>	
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
			
			
			
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
        </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                Todos os direitos reservados. Designer e Desenvolvimento. <a
                    href="https://www.nanochip.com.br/">Xtreme</a>.
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
</body>

</html>