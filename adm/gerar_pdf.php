<?php	
	include('conexao.php');
	$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB);
	
	// Recebimento do número da ordem de serviço para consulta
	$pdf= isset($_POST['pdf']) ? $_POST['pdf'] : "";
	$os= isset($_POST['os']) ? $_POST['os'] : "";
	$equipamento= isset($_POST['equipamento']) ? $_POST['equipamento'] : "";

	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	include("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();


	switch($pdf)
	{
		case 'termo_entrada':
			
			$query = "SELECT * FROM os where os='$os'";
			$resultado = mysqli_query($conexao, $query);
			while($exibir = mysqli_fetch_assoc($resultado))
			{	
				$nome = $exibir['nome'];
				$cpf = $exibir['cpf'];
			}
			
			switch($equipamento)
			{
				case 'notebook':
					$query = "SELECT * FROM os_notebook where os='$os'";
					$resultado = mysqli_query($conexao, $query);
					while($exibir = mysqli_fetch_assoc($resultado))
					{	
						$marca = $exibir['marca'];
						$modelo = $exibir['modelo'];
						$tipo = "Notebook"." ". $marca." ". $modelo;
						$problema = $exibir['problema'];
					}
					break;
				
				case 'pc':
					$query = "SELECT * FROM os_pc where os='$os'";
					$resultado = mysqli_query($conexao, $query);
					while($exibir = mysqli_fetch_assoc($resultado))
					{	
						$tipo = $exibir['equipamento'];
						$problema = $exibir['problema'];
					}
					break;
					
				case 'macbook':
					$query = "SELECT * FROM os_macbook where os='$os'";
					$resultado = mysqli_query($conexao, $query);
					while($exibir = mysqli_fetch_assoc($resultado))
					{	
						$macbook = $exibir['macbook'];
						$modelo = $exibir['modelo'];
						$tipo = "Macbook"." ". $macbook." ". $modelo;
						$problema = $exibir['problema'];
					}
					break;
					
				case 'imac':
					$query = "SELECT * FROM os_imac where os='$os'";
					$resultado = mysqli_query($conexao, $query);
					while($exibir = mysqli_fetch_assoc($resultado))
					{	
						$modelo = $exibir['modelo'];
						$tamanho = $exibir['tamanho'];
						$tipo="iMac ".$tamanho." ".$modelo;
						$problema = $exibir['problema'];
					}
					break;
			}
			
			
			$dompdf->load_html
			('
				<h2 style="text-align: center;"> Termo de Recebimento </h2> <br>
				
				<table width="100%" border="1">
					<tr>
						<table border="0" width="100%">
							<tr>
								<td width="50%"> <b>Cliente: </b>'.$nome.'</td>
								<td> <b>CPF: </b>'.$cpf.' </td>
							</tr> <br>
							
							<tr>
								<td width="50%"> <b>Equipamento: </b> '.$tipo.'</td>
								<td> <b>OS: </b>'.$os.' </td>
							</tr><br>
							
							<tr>
								<td> <b>Problema Relatado: </b> '.$problema.'</td>
							</tr>
						</table>
					</tr>
					
				</table> <br> <br>  <br> 
				
				<div align="center"> <b> Termo de Contrato </b> </div>
				<table width="100%" border="1">
					<tr>
						<table border="0" width="100%">
							<tr>
								<td> <br> 
									<b>1)</b> O tempo de avalição são de 5 dias úteis contados a partir do seguinte em que o equipamento foi deixado. 
								</td> 
							</tr><br>
							<tr>
								<td>  
									<b>2)</b> A empresa não se responsabiliza por aparelhos esquecidos na loja após 7 dias do diagnostico concluido.
								</td>
							</tr> <br>
							<tr>
								<td>  
									<b>3)</b> Equipamentos após serem recebidos pela empresa só poderão ser retirados pelo proprierário mediante a apresentação do CPF e este termo ou pessoa previamente autorizada pelo proprietário também mediante a apresentação do CPF.
								</td> 
							</tr> <br>
							
							<tr>
								<td>  
									<b>4)</b> Equipamentos que não tiverem orçamentos aprovados NÃO terá cobrança de taxa de diagnóstico.
								</td> 
							</tr> <br>
							
							<tr>
								<td>  
									<b>5)</b> A assistência funciona de segunda a sexta das 09:00 Am até 18:00 Pm e aos sábados das 08:00 Am até 12:00 Pm salvo feriados.
								</td> 
							</tr> <br>
							
							<tr>
								<td>  
									<b>6)</b> Orçamentos aprovados terão mais 3 dias úteis para realização do serviço exceto quando for necessário encomendar alguma peça onde o tempo começa a contar após todas as peças encomendadas estiverem sobre dominio da loja.
								</td> 
							</tr> <br>
							
							<tr>
								<td>  
									<b>7)</b> Todos os serviços realizados possuem 30 dias de garantia e peças novas possuem 6 meses de garantia.
								</td> 
							</tr> <br>
							
						</table>
					</tr>
				</table> <br> <br> <br>
				
				
				
				
				
				
				<table width="100%">
					<tr align="center">
						<td> __________________________________________ </td>
						
						<td> __________________________________________ </td>
					</tr>
					
					<tr align="center">
						<td> Assinatura do Cliente </td>
						
						<td> Assinatura da Recepção </td>
					</tr>
				</table> <br>
				
			');
			break;
		
		case 'orcamento':
			
			switch($equipamento)
			{
				case 'notebook':
					$query = "SELECT * FROM os where os='$os'";
					$resultado = mysqli_query($conexao, $query);
					while($exibir = mysqli_fetch_assoc($resultado))
					{	
						$nome = $exibir['nome'];
						$cpf = $exibir['cpf'];
						$valor_final= $exibir['valor_final'];
					}
					
					$query = "SELECT * FROM os_notebook where os='$os'";
					$resultado = mysqli_query($conexao, $query);
					while($exibir = mysqli_fetch_assoc($resultado))
					{	
						$marca= $exibir['marca'];
						$modelo= $exibir['modelo'];
						$processador= $exibir['processador'];
						$ram= $exibir['ram'];
						$hd= $exibir['hd'];
						$placa_video= $exibir['placa_video'];
						$tamanho_tela= $exibir['tamanho_tela'];
						$carregador= $exibir['carregador'];
						$problema= $exibir['problema'];
						$descricao_problema= $exibir['descricao_problema'];
						$descricao_orcamento= $exibir['descricao_orcamento'];
						$valor_orcamento= $exibir['valor_orcamento'];		
					}
					
					
					// Carrega seu HTML
					$dompdf->load_html
					('
						<table width="100%">
							<tr align="right">
								<td>
									 <b> OS:</b> '.$os.' 
 								</td>
							</tr>
						</table>
					
						<h2 style="text-align: center;"> Orçamento</h2> <hr> <br>
						
						<table width="100%">
							<tr>
								<td>
									<table border="1" width="100%">
										<tr align="center">
											<td> <b> Dados do Cliente </b> </td>	
										</tr>
										
										<tr>
											<td><b>Nome: </b> '.$nome.' </td>	
										</tr>
										
										<tr>
											<td> <b> CPF: </b> '.$cpf.' </td>	
										</tr>
									</table>
								</td>
								
								<td>
									<table border="1" width="100%">
										<tr align="center">
											<td> <b> Dados da Empresa </b> </td>	
										</tr>
										
										<tr>
											<td><b>Nome:</b> Nanochip Tecnologie </td>	
										</tr>
										
										<tr>
											<td><b>CNPJ:</b> 127.453.789.78-0001 </td>	
										</tr>
									</table>
								</td>
							</tr>
						</table> <br> <br>
						
						<table width="100%" border="1">
							<tr>
								<td align="center">
									<b>Configuração do Notebook </b>
								</td>
							</tr>
							
							<tr>
								<td>
									<b>Notebook: </b> '.$marca.' '.$modelo.'
								</td>
							</tr>
							
							<tr>
								<td>
									<b>Processador: </b> '. $processador.'
								</td>
							</tr>
							
							<tr>
								<td>
									<b>Memária RAM: </b> '. $ram.'
								</td>
							</tr>
							
							<tr>
								<td>
									<b>Armazenamento: </b> '. $hd.'
								</td>
							</tr>
							
							<tr>
								<td>
									<b>Placa de vídeo: </b> '. $placa_video.'
								</td>
							</tr>
							
							<tr>
								<td>
									<b>Tamanho da Tela: </b> '. $tamanho_tela.'
								</td>
							</tr>
							
						</table> <br> <br>
						
						<table width="100%"> 
							<tr >
								<td width="100%" valign="top">
									<table width="100%" border="1">
										<tr align="center">
											<td> <b> Problema Relatado </b> </td>
										</tr>
							
										<tr>
											<td> '.$problema.' </td>
										</tr>
									</table>
								</td>

								<td width="100%" valign="top">
									<table width="100%" border="1">
										<tr align="center">
											<td> <b> Problemas Encontrados </b> </td>
										</tr>
							
										<tr>
											<td> '.$descricao_problema.' </td>
										</tr>
									</table>
								</td>
							</tr>
						</table> <br> <br>
						
						<table width="100%" border="1"> 
							<tr >
								<td align="center">
									<b>Descrição do Orçamento</b>
								</td>
							</tr>
							
							<tr >
								<td>
									'.$descricao_orcamento.'
								</td>
							</tr>
						</table> <br> <br> <br>
						
						
						<table width="25%" border="1"> 	
							<tr >
								<td>
									<b>Valor Final: </b>R$ '.$valor_final.'
								</td>
							</tr>
						</table>	
					');
					
					break;
					
				case 'pc':
					$query = "SELECT * FROM os where os='$os'";
					$resultado = mysqli_query($conexao, $query);
					while($exibir = mysqli_fetch_assoc($resultado))
					{	
						$nome = $exibir['nome'];
						$cpf = $exibir['cpf'];
						$valor_final = $exibir['valor_final'];
					}
					
					$query = "SELECT * FROM os_pc where os='$os'";
					$resultado = mysqli_query($conexao, $query);
					while($exibir = mysqli_fetch_assoc($resultado))
					{	
						$placa_mae= $exibir['placa_mae'];
						$processador= $exibir['processador'];
						$ram= $exibir['ram'];
						$hd= $exibir['hd'];
						$placa_video= $exibir['placa_video'];
						$fonte= $exibir['fonte'];
						$gabinete= $exibir['gabinete'];
						$acessorios= $exibir['acessorios'];
						$problema= $exibir['problema'];
						$descricao_problema= $exibir['descricao_problema'];
						$descricao_orcamento= $exibir['descricao_orcamento'];
						$valor_orcamento= $exibir['valor_orcamento'];			
					}
					
					
					// Carrega seu HTML
					$dompdf->load_html
					('
						<table width="100%">
							<tr align="right">
								<td>
									 <b> OS:</b> '.$os.' 
 								</td>
							</tr>
						</table>
					
						<h2 style="text-align: center;"> Orçamento</h2> <hr> <br>
						
						<table width="100%">
							<tr>
								<td>
									<table border="1" width="100%">
										<tr align="center">
											<td> <b> Dados do Cliente </b> </td>	
										</tr>
										
										<tr>
											<td><b>Nome: </b> '.$nome.' </td>	
										</tr>
										
										<tr>
											<td> <b> CPF: </b> '.$cpf.' </td>	
										</tr>
									</table>
								</td>
								
								<td>
									<table border="1" width="100%">
										<tr align="center">
											<td> <b> Dados da Empresa </b> </td>	
										</tr>
										
										<tr>
											<td><b>Nome:</b> Nanochip Tecnologie </td>	
										</tr>
										
										<tr>
											<td><b>CNPJ:</b> 127.453.789.78-0001 </td>	
										</tr>
									</table>
								</td>
							</tr>
						</table> <br> <br>
						
						<table width="100%" border="1">
							<tr>
								<td align="center">
									<b>Configuração do PC </b>
								</td>
							</tr>
							
							<tr>
								<td>
									<b>Placa Mãe: </b> '. $placa_mae.'
								</td>
							</tr>
							
							<tr>
								<td>
									<b>Processador: </b> '. $processador.'
								</td>
							</tr>
							
							<tr>
								<td>
									<b>Memária RAM: </b> '. $ram.'
								</td>
							</tr>
							
							<tr>
								<td>
									<b>Armazenamento: </b> '. $hd.'
								</td>
							</tr>
							
							<tr>
								<td>
									<b>Placa de vídeo: </b> '. $placa_video.'
								</td>
							</tr>
							
							<tr>
								<td>
									<b>Gabinete: </b> '. $gabinete.'
								</td>
							</tr>
							
							<tr>
								<td>
									<b>Fonte: </b> '. $fonte.'
								</td>
							</tr>
						</table> <br> <br>
						
						<table width="100%"> 
							<tr >
								<td width="100%" valign="top">
									<table width="100%" border="1">
										<tr align="center">
											<td> <b> Problema Relatado </b> </td>
										</tr>
							
										<tr>
											<td> '.$problema.' </td>
										</tr>
									</table>
								</td>

								<td width="100%" valign="top">
									<table width="100%" border="1">
										<tr align="center">
											<td> <b> Problemas Encontrados </b> </td>
										</tr>
							
										<tr>
											<td> '.$descricao_problema.' </td>
										</tr>
									</table>
								</td>
							</tr>
						</table> <br> <br>
						
						<table width="100%" border="1"> 
							<tr >
								<td align="center">
									<b>Descrição do Orçamento</b>
								</td>
							</tr>
							
							<tr >
								<td>
									'.$descricao_orcamento.'
								</td>
							</tr>
						</table> <br> <br> <br>
						
						
						<table width="25%" border="1"> 	
							<tr >
								<td>
									<b>Valor Final: </b>R$ '.$valor_final.'
								</td>
							</tr>
						</table>	
					');
					
					break;
					
				case 'macbook':
					$query = "SELECT * FROM os where os='$os'";
					$resultado = mysqli_query($conexao, $query);
					while($exibir = mysqli_fetch_assoc($resultado))
					{	
						$nome = $exibir['nome'];
						$cpf = $exibir['cpf'];
						$valor_final= $exibir['valor_final'];
					}
					
					$query = "SELECT * FROM os_macbook where os='$os'";
					$resultado = mysqli_query($conexao, $query);
					while($exibir = mysqli_fetch_assoc($resultado))
					{	
						$macbook= $exibir['macbook'];
						$modelo= $exibir['modelo'];
						$ano= $exibir['ano'];
						$emc= $exibir['emc'];
						$processador= $exibir['processador'];
						$ram= $exibir['ram'];;
						$placa_video= $exibir['placa_video'];
						$hd= $exibir['hd'];
						$carregador= $exibir['carregador'];
						$tamanho_tela= $exibir['tamanho_tela'];
						$problema= $exibir['problema'];
						$descricao_problema= $exibir['descricao_problema'];
						$descricao_orcamento= $exibir['descricao_orcamento'];
						$valor_orcamento= $exibir['valor_orcamento'];
					}
					
					
					// Carrega seu HTML
					$dompdf->load_html
					('
						<table width="100%">
							<tr align="right">
								<td>
									 <b> OS:</b> '.$os.' 
 								</td>
							</tr>
						</table>
						
						<h2 style="text-align: center;"> Orçamento </h2> <hr> <br>
						
						<table width="100%">
							<tr>
								<td>
									<table border="1" width="100%">
										<tr align="center">
											<td> <b> Dados do Cliente </b> </td>	
										</tr>
										
										<tr>
											<td><b>Nome: </b> '.$nome.' </td>	
										</tr>
										
										<tr>
											<td> <b> CPF: </b> '.$cpf.' </td>	
										</tr>
									</table>
								</td>
								
								<td>
									<table border="1" width="100%">
										<tr align="center">
											<td> <b> Dados da Empresa </b> </td>	
										</tr>
										
										<tr>
											<td><b>Nome:</b> Nanochip Tecnologie </td>	
										</tr>
										
										<tr>
											<td><b>CNPJ:</b> 127.453.789.78-0001 </td>	
										</tr>
									</table>
								</td>
							</tr>
						</table> <br> <br>
						
						<table width="100%" border="1">
							<tr>
								<td align="center">
									<b>Configuração do Macbook </b>
								</td>
							</tr>
							
							<tr>
								<td>
									<b>Macbook: </b> '.$macbook.' '.$ano.' 
								</td>
							</tr>
							
							<tr>
								<td>
									<b>EMC: </b> '.$emc.' 
								</td>
							</tr>
							
							<tr>
								<td>
									<b>Processador: </b> '. $processador.'
								</td>
							</tr>
							
							<tr>
								<td>
									<b>Memária RAM: </b> '. $ram.'
								</td>
							</tr>
							
							<tr>
								<td>
									<b>Armazenamento: </b> '. $hd.'
								</td>
							</tr>
							
							<tr>
								<td>
									<b>Placa de vídeo: </b> '. $placa_video.'
								</td>
							</tr>
							
							<tr>
								<td>
									<b>Tamanho da Tela: </b> '. $tamanho_tela.'
								</td>
							</tr>				
						</table> <br> <br>
						
						<table width="100%"> 
							<tr >
								<td width="100%" valign="top">
									<table width="100%" border="1">
										<tr align="center">
											<td> <b> Problema Relatado </b> </td>
										</tr>
							
										<tr>
											<td> '.$problema.' </td>
										</tr>
									</table>
								</td>

								<td width="100%" valign="top">
									<table width="100%" border="1">
										<tr align="center">
											<td> <b> Problemas Encontrados </b> </td>
										</tr>
							
										<tr>
											<td> '.$descricao_problema.' </td>
										</tr>
									</table>
								</td>
							</tr>
						</table> <br> <br>
						
						<table width="100%" border="1"> 
							<tr >
								<td align="center">
									<b>Descrição do Orçamento</b>
								</td>
							</tr>
							
							<tr >
								<td>
									'.$descricao_orcamento.'
								</td>
							</tr>
						</table> <br> <br> <br>
						
						
						<table width="25%" border="1"> 	
							<tr >
								<td>
									<b>Valor Final: </b>R$ '.$valor_final.'
								</td>
							</tr>
						</table>	
					');
					break;
				
				case 'imac':
					$query = "SELECT * FROM os where os='$os'";
					$resultado = mysqli_query($conexao, $query);
					while($exibir = mysqli_fetch_assoc($resultado))
					{	
						$nome = $exibir['nome'];
						$cpf = $exibir['cpf'];
						$valor_final= $exibir['valor_final'];
					}
					
					$query = "SELECT * FROM os_imac where os='$os'";
					$resultado = mysqli_query($conexao, $query);
					while($exibir = mysqli_fetch_assoc($resultado))
					{	
						$modelo= $exibir['modelo'];
						$ano= $exibir['ano'];
						$tamanho= $exibir['tamanho'];
						$emc= $exibir['emc'];
						$processador= $exibir['processador'];
						$ram= $exibir['ram'];
						$placa_video= $exibir['placa_video'];
						$hd= $exibir['hd'];
						$problema= $exibir['problema'];
						$descricao_problema= $exibir['descricao_problema'];
						$descricao_orcamento= $exibir['descricao_orcamento'];
						$valor_orcamento= $exibir['valor_orcamento'];
					}
					
					
					// Carrega seu HTML
					$dompdf->load_html
					('
						<table width="100%">
							<tr align="right">
								<td>
									 <b> OS:</b> '.$os.' 
 								</td>
							</tr>
						</table>
						
						<h2 style="text-align: center;"> Orçamento </h2> <hr> <br>
						
						<table width="100%">
							<tr>
								<td>
									<table border="1" width="100%">
										<tr align="center">
											<td> <b> Dados do Cliente </b> </td>	
										</tr>
										
										<tr>
											<td><b>Nome: </b> '.$nome.' </td>	
										</tr>
										
										<tr>
											<td> <b> CPF: </b> '.$cpf.' </td>	
										</tr>
									</table>
								</td>
								
								<td>
									<table border="1" width="100%">
										<tr align="center">
											<td> <b> Dados da Empresa </b> </td>	
										</tr>
										
										<tr>
											<td><b>Nome:</b> Nanochip Tecnologie </td>	
										</tr>
										
										<tr>
											<td><b>CNPJ:</b> 127.453.789.78-0001 </td>	
										</tr>
									</table>
								</td>
							</tr>
						</table> <br> <br>
						
						<table width="100%" border="1">
							<tr>
								<td align="center">
									<b>Configuração do iMac </b>
								</td>
							</tr>
							
							<tr>
								<td>
									<b>iMac: </b> '.$modelo.' '.$ano.' 
								</td>
							</tr>
							
							<tr>
								<td>
									<b>Tamanho: </b> '.$tamanho.' 
								</td>
							</tr>
							
							<tr>
								<td>
									<b>EMC: </b> '.$emc.' 
								</td>
							</tr>
							
							<tr>
								<td>
									<b>Processador: </b> '. $processador.'
								</td>
							</tr>
							
							<tr>
								<td>
									<b>Memária RAM: </b> '. $ram.'
								</td>
							</tr>
							
							<tr>
								<td>
									<b>Armazenamento: </b> '. $hd.'
								</td>
							</tr>
							
							<tr>
								<td>
									<b>Placa de vídeo: </b> '. $placa_video.'
								</td>
							</tr>
									
						</table> <br> <br>
						
						<table width="100%"> 
							<tr >
								<td width="100%" valign="top">
									<table width="100%" border="1">
										<tr align="center">
											<td> <b> Problema Relatado </b> </td>
										</tr>
							
										<tr>
											<td> '.$problema.' </td>
										</tr>
									</table>
								</td>

								<td width="100%" valign="top">
									<table width="100%" border="1">
										<tr align="center">
											<td> <b> Problemas Encontrados </b> </td>
										</tr>
							
										<tr>
											<td> '.$descricao_problema.' </td>
										</tr>
									</table>
								</td>
							</tr>
						</table> <br> <br>
						
						<table width="100%" border="1"> 
							<tr >
								<td align="center">
									<b>Descrição do Orçamento</b>
								</td>
							</tr>
							
							<tr >
								<td>
									'.$descricao_orcamento.'
								</td>
							</tr>
						</table> <br> <br> <br>
						
						
						<table width="25%" border="1"> 	
							<tr >
								<td>
									<b>Valor Final: </b>R$ '.$valor_final.'
								</td>
							</tr>
						</table>	
					');
				
				
					break;	
			}
						
			break;
			
		
		case 'termo_saida':
			$query = "SELECT * FROM os where os='$os'";
			$resultado = mysqli_query($conexao, $query);
			while($exibir = mysqli_fetch_assoc($resultado))
			{	
				$nome = $exibir['nome'];
				$cpf = $exibir['cpf'];
				$valor_final = $exibir['valor_final'];
			}
			
			switch($equipamento)
			{
				case 'notebook':
					$query = "SELECT * FROM os_notebook where os='$os'";
					$resultado = mysqli_query($conexao, $query);
					while($exibir = mysqli_fetch_assoc($resultado))
					{	
						$marca = $exibir['marca'];
						$modelo = $exibir['modelo'];
						$tipo = "Notebook"." ". $marca." ". $modelo;
						$problema = $exibir['problema'];
						$descricao_problema = $exibir['descricao_orcamento'];
						$status = $exibir['status'];
					}
					break;
				
				case 'pc':
					$query = "SELECT * FROM os_pc where os='$os'";
					$resultado = mysqli_query($conexao, $query);
					while($exibir = mysqli_fetch_assoc($resultado))
					{	
						$tipo = $exibir['equipamento'];
						$problema = $exibir['problema'];
						$descricao_problema = $exibir['descricao_orcamento'];
						$status = $exibir['status'];
					}
					break;
					
				case 'macbook':
					$query = "SELECT * FROM os_macbook where os='$os'";
					$resultado = mysqli_query($conexao, $query);
					while($exibir = mysqli_fetch_assoc($resultado))
					{	
						$macbook = $exibir['macbook'];
						$modelo = $exibir['modelo'];
						$tipo = "Macbook"." ". $macbook." ". $modelo;
						$problema = $exibir['problema'];
						$descricao_problema = $exibir['descricao_orcamento'];
						$status = $exibir['status'];
					}
					break;
					
				case 'imac':
					$query = "SELECT * FROM os_imac where os='$os'";
					$resultado = mysqli_query($conexao, $query);
					while($exibir = mysqli_fetch_assoc($resultado))
					{	
						$modelo = $exibir['modelo'];
						$tamanho = $exibir['tamanho'];
						$tipo="iMac ".$tamanho." ".$modelo;
						$problema = $exibir['problema'];
						$descricao_problema = $exibir['descricao_orcamento'];
						$status = $exibir['status'];
					}
					break;
			}
			
			
			$dompdf->load_html
			('
				<h2 style="text-align: center;"> Termo de Retirada </h2> <br>
				
				<table width="100%" border="1">
					<tr>
						<table border="0" width="100%">
							<tr>
								<td width="50%"> <b>Cliente: </b>'.$nome.'</td>
								<td> <b>CPF: </b>'.$cpf.' </td>
							</tr> <br>
							
							<tr>
								<td width="50%"> <b>Equipamento: </b> '.$tipo.'</td>
								<td> <b>OS: </b>'.$os.' </td>
							</tr><br>
							
							<tr>
								<td> <b>Problema Relatado: </b> '.$problema.'</td>
							</tr>
						</table>
					</tr>
					
				</table> <br> <br>  <br> 
				
				<div align="center"> <b> Termo de Contrato </b> </div>
				<table width="100%" border="1">
					<tr>
						<table border="0" width="100%">
							<tr>
								<td> <br> 
									Declaro estar ciente dos serviços realizados assim como estar retirando o aparelho nas mesmas condições em que foi deixado. 
								</td> 
							</tr><br>

							
						</table>
					</tr>
					
				</table> <br> <br> <br>
				
				<div align="center"> <b> Descrição do Orçamento</b> </div>
				<table width="100%" border="1">
					<tr>
						<table border="0" width="100%">
							<tr>
								<td> <br> 
									 '.$descricao_problema.'
								</td> 
							</tr><br>
						</table>
					</tr>
					
				</table> <br> <br>
				
				<b> Status do Serviço:</b>  '.$status.' pelo cliente. <br>
				<b> Valor do Serviço:</b> R$: '.$valor_final.'. <br> <br> <br> <br> <br> <br> <br> <br>
				
				
				
				
				
				
				<table width="100%">
					<tr align="center">
						<td> __________________________________________ </td>
						
						<td> __________________________________________ </td>
					</tr>
					
					<tr align="center">
						<td> Assinatura do Cliente </td>
						
						<td> Assinatura da Recepção </td>
					</tr>
				</table> <br>
				
			');
			break;	
	}
	
			

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"Orçamento '$nome'.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
	
	
?>