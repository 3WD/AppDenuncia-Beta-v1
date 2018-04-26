<?php
/**
 * @author			odix.com.br - v 1.0 - mar/2017
 * @description 	registro de denúncias (anonima e identificada)
 * @params
		aut 		autenticação do WS, aut=YXBwLWNyZnJz - base64_encode('app-crfrs')
		act			ação de execução do WS (iden, anon)
 */

header('Content-Type: application/json');

if (isset($_REQUEST['aut']) && $_REQUEST['aut']=='YXBwLWNyZnJz') 
{
	//pega os parâmetros
	if (isset($_REQUEST['act']) && !empty($_REQUEST['act']) )
	{
		$act = strtolower($_REQUEST['act']);
		$json = array();

		//require_once('../../inc/inc.autoload.php');

		switch ($act) 
		{
			
			case 'iden':
				//pegar os parametros enviados
				//tratar os valores
				//registrar no BD
				//ajustar a saída para JSON
				$json['iden'] = array('success'=>0, 'failure'=>1);
			break;



			case 'anon':
				//pegar os parametros enviados
				//tratar os valores
				//registrar no BD
				//ajustar a saída para JSON
				$json['anon'] = array('success'=>0, 'failure'=>1);
			break;



			case 'options':
				$msg = '
				arquivo: http://farmasis.com.br/ws/app/denuncia.php
				parametro obrigatorio de autenticacao: aut=YXBwLWNyZnJz
				parametro obrigatorio de acao: act=...
					opcoes de valores para "act" (e outros params):
						=iden 
							&cpf=123123123123 (obrigatorio)
							&npf=Nome-Pessoa (obrigatorio)
							$ema=Email-Pessoa (obrigatorio)
							$fon=Fone-Pessoa (obrigatorio)
							&ipf=99998 (opcional - busca do BD CRF)
							&ipj=99999 (opcional - busca do BD CRF)
							&npj=Nome-Empresa (obrigatorio)
							&epj=Endereco-Empresa (obrigatorio)
							&lat=30.12323423 (latitude - opcional)
							&lon=51.23423423 (longitude - opcional)
							&txt=Texto-Denuncia (obrigatorio)

						=anon 
							&ipj=99999 (opcional - busca do BD CRF)
							&npj=Nome-Empresa (obrigatorio)
							&epj=Endereco-Empresa (obrigatorio)
							&lat=30.12323423 (latitude - opcional)
							&lon=51.23423423 (longitude - opcional)
							&txt=Texto-Denuncia (obrigatorio)
				';
				echo $msg;
				break;

			default:
				die('Invalid action (act)');
				break;
			//-----------------
		}
		
		//out
		echo json_encode($json);
	}
	else 
	{
		die('The "act" parameter should be sent!');
	}
}
else 
{
	die('WS authentication failure!'); 
}
?>