<?php
/**
 * Menu Items
 * All Project Menu
 * @category  Menu List
 */

class Menu{
	
	
			public static $navbartopleft = array(
		array(
			'path' => 'home', 
			'label' => 'Painel Geral', 
			'icon' => ''
		),
		
		array(
			'path' => 'casos', 
			'label' => 'Lista de Casos', 
			'icon' => '','submenu' => array(
		array(
			'path' => 'casos', 
			'label' => 'Totais', 
			'icon' => ''
		),
		
		array(
			'path' => 'casos?casos_inicio_sintomas=&casos_data_coleta_exame=&casos_data_obito=&casos_resultado%5B%5D=SUSPEITO', 
			'label' => 'Suspeitos', 
			'icon' => ''
		),
		
		array(
			'path' => 'casos?casos_inicio_sintomas=&casos_data_coleta_exame=&casos_data_obito=&casos_resultado%5B%5D=NEGATIVO', 
			'label' => 'Descartados', 
			'icon' => ''
		),
		
		array(
			'path' => 'casos?casos_inicio_sintomas=&casos_data_coleta_exame=&casos_data_obito=&casos_resultado%5B%5D=POSITIVO', 
			'label' => 'Confirmados', 
			'icon' => ''
		),
		
		array(
			'path' => 'casos?casos_inicio_sintomas=&casos_data_coleta_exame=&casos_data_obito=&casos_caso_ativo%5B%5D=N&casos_resultado%5B%5D=POSITIVO', 
			'label' => 'Recuperados', 
			'icon' => ''
		),
		
		array(
			'path' => 'casos?casos_inicio_sintomas=&casos_data_coleta_exame=&casos_data_obito=&casos_caso_ativo%5B%5D=S', 
			'label' => 'Ativos', 
			'icon' => ''
		),
		
		array(
			'path' => 'casos?casos_inicio_sintomas=&casos_data_coleta_exame=&casos_data_obito=&casos_internado%5B%5D=S', 
			'label' => 'Internados', 
			'icon' => ''
		),
		
		array(
			'path' => 'casos?casos_inicio_sintomas=&casos_data_coleta_exame=&casos_data_obito=&casos_obito=SIM', 
			'label' => 'Óbitos', 
			'icon' => ''
		)
	)
		),
		
		array(
			'path' => 'casos/add', 
			'label' => 'Adicionar Novo Caso', 
			'icon' => ''
		)
	);
		
	
	
			public static $status_exame = array(
		array(
			"value" => "COLETADO", 
			"label" => "Coletado", 
		),
		array(
			"value" => "NÃO COLETADO", 
			"label" => "Não Coletado", 
		),);
		
			public static $internado = array(
		array(
			"value" => "S", 
			"label" => "Sim", 
		),
		array(
			"value" => "N", 
			"label" => "Não", 
		),);
		
			public static $resultado = array(
		array(
			"value" => "POSITIVO", 
			"label" => "Positivo", 
		),
		array(
			"value" => "NEGATIVO", 
			"label" => "Negativo", 
		),
		array(
			"value" => "SUSPEITO", 
			"label" => "Suspeito", 
		),);
		
			public static $obito = array(
		array(
			"value" => "SIM", 
			"label" => "Sim", 
		),);
		
}