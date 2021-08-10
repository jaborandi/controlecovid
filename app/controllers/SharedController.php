<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * casos_origem_option_list Model Action
     * @return array
     */
	function casos_origem_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT origem AS value,origem AS label FROM casos ORDER BY origem ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * casos_local_coleta_option_list Model Action
     * @return array
     */
	function casos_local_coleta_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT local_coleta AS value,local_coleta AS label FROM casos ORDER BY local_coleta ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * casos_tipo_exame_option_list Model Action
     * @return array
     */
	function casos_tipo_exame_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT tipo_exame AS value,tipo_exame AS label FROM casos ORDER BY tipo_exame ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * usuario_login_value_exist Model Action
     * @return array
     */
	function usuario_login_value_exist($val){
		$db = $this->GetModel();
		$db->where("login", $val);
		$exist = $db->has("usuario");
		return $exist;
	}

	/**
     * usuario_email_value_exist Model Action
     * @return array
     */
	function usuario_email_value_exist($val){
		$db = $this->GetModel();
		$db->where("email", $val);
		$exist = $db->has("usuario");
		return $exist;
	}

	/**
     * casos_casosstatus_exame_option_list Model Action
     * @return array
     */
	function casos_casosstatus_exame_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT status_exame AS value,status_exame AS label FROM casos ORDER BY status_exame ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * casos_casosresultado_option_list Model Action
     * @return array
     */
	function casos_casosresultado_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT resultado AS value,resultado AS label FROM casos ORDER BY resultado ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * casos_casostipo_exame_option_list Model Action
     * @return array
     */
	function casos_casostipo_exame_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT tipo_exame AS value,tipo_exame AS label FROM casos";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * casos_casosorigem_option_list Model Action
     * @return array
     */
	function casos_casosorigem_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT origem AS value,resultado AS origem FROM casos WHERE origem!='' AND origem is not null";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * getcount_totaldenotificaes Model Action
     * @return Value
     */
	function getcount_totaldenotificaes(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM casos";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_casossuspeitos Model Action
     * @return Value
     */
	function getcount_casossuspeitos(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM casos WHERE  (resultado  ='suspeito' )";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_casosdescartados Model Action
     * @return Value
     */
	function getcount_casosdescartados(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM casos WHERE  (resultado  ='negativo' )";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_casosconfirmados Model Action
     * @return Value
     */
	function getcount_casosconfirmados(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM casos WHERE  (resultado  like '%positivo%' )";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_casosrecuperados Model Action
     * @return Value
     */
	function getcount_casosrecuperados(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM casos WHERE  (data_encerramento_caso  !='0000-00-00' )";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_casosativos Model Action
     * @return Value
     */
	function getcount_casosativos(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM casos WHERE  (caso_ativo  ='S' )";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_internados Model Action
     * @return Value
     */
	function getcount_internados(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM casos WHERE  (internado  ='S' )";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_bitos Model Action
     * @return Value
     */
	function getcount_bitos(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM casos WHERE obito='SIM'";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
	* barchart_casosconfirmadosnosmeses Model Action
	* @return array
	*/
	function barchart_casosconfirmadosnosmeses(){
		
		$db = $this->GetModel();
		$chart_data = array(
			"labels"=> array(),
			"datasets"=> array(),
		);
		
		//set query result for dataset 1
		$sqltext = "SELECT COUNT(*) as 'Quantidade',
CONCAT(CASE MONTH(inicio_sintomas) WHEN 1 THEN 'Janeiro' WHEN 2 THEN 'Fevereiro' WHEN 3 THEN 'Março' WHEN 4 THEN 'Abril' WHEN 5 THEN 'Maio' WHEN 6 THEN 'Junho' WHEN 7 THEN 'Julho' WHEN 8 THEN 'Agosto' WHEN 9 THEN 'Setembro' WHEN 10 THEN 'Outubro' WHEN 11 THEN 'Novembro' ELSE 'Dezembro' END, '/', CONVERT(YEAR(inicio_sintomas), VARCHAR(4))) AS 'Mês'
from casos
where resultado like '%POSITIVO%'
AND inicio_sintomas is not null
AND inicio_sintomas != ''
group by CONCAT(CASE MONTH(inicio_sintomas) WHEN 1 THEN 'Janeiro' WHEN 2 THEN 'Fevereiro' WHEN 3 THEN 'Março' WHEN 4 THEN 'Abril' WHEN 5 THEN 'Maio' WHEN 6 THEN 'Junho' WHEN 7 THEN 'Julho' WHEN 8 THEN 'Agosto' WHEN 9 THEN 'Setembro' WHEN 10 THEN 'Outubro' WHEN 11 THEN 'Novembro' ELSE 'Dezembro' END, '/', CONVERT(YEAR(inicio_sintomas), VARCHAR(4)))
order by inicio_sintomas asc";
		$queryparams = null;
		$dataset1 = $db->rawQuery($sqltext, $queryparams);
		$dataset_data =  array_column($dataset1, 'Quantidade');
		$dataset_labels =  array_column($dataset1, 'Mês');
		$chart_data["labels"] = array_unique(array_merge($chart_data["labels"], $dataset_labels));
		$chart_data["datasets"][] = $dataset_data;

		return $chart_data;
	}

	/**
	* piechart_tiposdeexamesrealizados Model Action
	* @return array
	*/
	function piechart_tiposdeexamesrealizados(){
		
		$db = $this->GetModel();
		$chart_data = array(
			"labels"=> array(),
			"datasets"=> array(),
		);
		
		//set query result for dataset 1
		$sqltext = "SELECT COUNT(*) as 'Quantidade', tipo_exame as 'Tipo' from casos
where tipo_exame not in ('','-')
group by tipo_exame
";
		$queryparams = null;
		$dataset1 = $db->rawQuery($sqltext, $queryparams);
		$dataset_data =  array_column($dataset1, 'Quantidade');
		$dataset_labels =  array_column($dataset1, 'Tipo');
		$chart_data["labels"] = array_unique(array_merge($chart_data["labels"], $dataset_labels));
		$chart_data["datasets"][] = $dataset_data;

		return $chart_data;
	}

	/**
     * getcount_porcentagemdecura Model Action
     * @return Value
     */
	function getcount_porcentagemdecura(){
		$db = $this->GetModel();
		$sqltext = "SELECT round((SELECT COUNT(*) AS num FROM casos WHERE  (data_encerramento_caso  !='0000-00-00')) / (SELECT COUNT(*) AS totais FROM casos WHERE  (resultado  like '%positivo%' ) AND (caso_ativo!='S' OR caso_ativo is null)) * 100,2) AS num";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_porcentagemdebitos Model Action
     * @return Value
     */
	function getcount_porcentagemdebitos(){
		$db = $this->GetModel();
		$sqltext = "SELECT round((SELECT COUNT(*) AS num FROM casos WHERE  (obito='SIM')) / (SELECT COUNT(*) AS totais FROM casos WHERE  (resultado  like '%positivo%' ) AND (caso_ativo!='S' OR caso_ativo is null)) * 100,2) AS num";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

}
