<html>
	<head>
		<title> Logs </title>
	</head>

	<body>
		<div align="center">
			<fieldset style="width: 50%">
				<h2> Inserir Evento </h2> <br>
				
				<div align="left">
					<b> Identificação </b> <br>
					<hr> 
					
					<form>	
						<table width=100%>
							<tr >
								<td width=37%>
									Ordem de Serviço: <input type=text name=placa style="width: 50px;">
								</td>

								<td>
									Equipamento: <input type=radio name=equipamento value=notebook> Notebook <input type=radio name=equipamento value=pc> PC
												 <input type=radio name=equipamento value=macbook> Macbook <input type=radio name=equipamento value=imac> iMac
								</td>
							</tr>
						</table> <br><br>

						<b> Data e Hora </b> <hr>
					
						<table width=100%>
							<tr >
								<td width=50%>
									Data: <input type=text name=placa">
								</td>

								<td>
									Hora: <input type=text name=placa">
								</td>
							</tr>
						</table> <br><br>
				
						<b> Descrição do Evento </b> <hr> 
						
						<div align=center> <textarea rows=6 cols=80 name=pq></textarea> <br> </div> <br>
					
						<hr> 
	
						<div align=center>
							<input type=submit value=Cadastrar>
							<input type=reset value=Resetar>
						</div>	
					</form>
				</div>	
			</fieldset>
		</div>
	</body>
</html>