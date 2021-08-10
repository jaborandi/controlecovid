<?php 
/**
 * Casos Page Controller
 * @category  Controller
 */
class CasosController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "casos";
	}
	/**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
	function index($fieldname = null , $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$fields = array("id", 
			"nome_paciente", 
			"inicio_sintomas", 
			"data_coleta_exame", 
			"resultado");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				casos.id LIKE ? OR 
				casos.nome_paciente LIKE ? OR 
				casos.telefone LIKE ? OR 
				casos.status_exame LIKE ? OR 
				casos.origem LIKE ? OR 
				casos.inicio_sintomas LIKE ? OR 
				casos.data_coleta_exame LIKE ? OR 
				casos.local_coleta LIKE ? OR 
				casos.tipo_exame LIKE ? OR 
				casos.internado LIKE ? OR 
				casos.resultado LIKE ? OR 
				casos.caso_ativo LIKE ? OR 
				casos.data_descarte_caso LIKE ? OR 
				casos.data_obito LIKE ? OR 
				casos.data_encerramento_caso LIKE ? OR 
				casos.obito LIKE ? OR 
				casos.inserido_por LIKE ? OR 
				casos.date_created LIKE ? OR 
				casos.date_updated LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "casos/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("inicio_sintomas", "DESC");
		}
		if($fieldname){
			$db->where($fieldname , $fieldvalue); //filter by a single field name
		}
		if(!empty($request->casos_inicio_sintomas)){
			$vals = explode("-to-", str_replace(" ", "", $request->casos_inicio_sintomas));
			$startdate = $vals[0];
			$enddate = $vals[1];
			$db->where("casos.inicio_sintomas BETWEEN '$startdate' AND '$enddate'");
		}
		if(!empty($request->casos_data_coleta_exame)){
			$vals = explode("-to-", str_replace(" ", "", $request->casos_data_coleta_exame));
			$startdate = $vals[0];
			$enddate = $vals[1];
			$db->where("casos.data_coleta_exame BETWEEN '$startdate' AND '$enddate'");
		}
		if(!empty($request->casos_data_obito)){
			$vals = explode("-to-", str_replace(" ", "", $request->casos_data_obito));
			$startdate = $vals[0];
			$enddate = $vals[1];
			$db->where("casos.data_obito BETWEEN '$startdate' AND '$enddate'");
		}
		if(!empty($request->casos_caso_ativo)){
			$vals = $request->casos_caso_ativo;
			$db->where("casos.caso_ativo", $vals, "IN");
		}
		if(!empty($request->casos_status_exame)){
			$vals = $request->casos_status_exame;
			$db->where("casos.status_exame", $vals, "IN");
		}
		if(!empty($request->casos_resultado)){
			$vals = $request->casos_resultado;
			$db->where("casos.resultado", $vals, "IN");
		}
		if(!empty($request->casos_tipo_exame)){
			$vals = $request->casos_tipo_exame;
			$db->where("casos.tipo_exame", $vals, "IN");
		}
		if(!empty($request->casos_internado)){
			$vals = $request->casos_internado;
			$db->where("casos.internado", $vals, "IN");
		}
		if(!empty($request->casos_obito)){
			$val = $request->casos_obito;
			$db->where("casos.obito", $val , "=");
		}
		if(!empty($request->casos_origem)){
			$vals = $request->casos_origem;
			$db->where("casos.origem", $vals, "IN");
		}
		$tc = $db->withTotalCount();
		$records = $db->get($tablename, $pagination, $fields);
		$records_count = count($records);
		$total_records = intval($tc->totalCount);
		$page_limit = $pagination[1];
		$total_pages = ceil($total_records / $page_limit);
		if(	!empty($records)){
			foreach($records as &$record){
				$record['inicio_sintomas'] = format_date($record['inicio_sintomas'],'d/m/Y');
$record['data_coleta_exame'] = format_date($record['data_coleta_exame'],'d/m/Y');
			}
		}
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = $records_count;
		$data->total_records = $total_records;
		$data->total_page = $total_pages;
		if($db->getLastError()){
			$this->set_page_error();
		}
		$page_title = $this->view->page_title = "Casos";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("casos/list.php", $data); //render the full page
	}
	/**
     * View record detail 
	 * @param $rec_id (select record by table primary key) 
     * @param $value value (select record by value of field name(rec_id))
     * @return BaseView
     */
	function view($rec_id = null, $value = null){
		$request = $this->request;
		$db = $this->GetModel();
		$rec_id = $this->rec_id = urldecode($rec_id);
		$tablename = $this->tablename;
		$fields = array("id", 
			"nome_paciente", 
			"telefone", 
			"status_exame", 
			"origem", 
			"inicio_sintomas", 
			"data_coleta_exame", 
			"local_coleta", 
			"tipo_exame", 
			"internado", 
			"resultado", 
			"caso_ativo", 
			"data_descarte_caso", 
			"data_obito", 
			"data_encerramento_caso", 
			"obito", 
			"inserido_por", 
			"date_created", 
			"date_updated");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("casos.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$record['inicio_sintomas'] = format_date($record['inicio_sintomas'],'d/m/Y');
$record['data_coleta_exame'] = format_date($record['data_coleta_exame'],'d/m/Y');
$record['data_descarte_caso'] = format_date($record['data_descarte_caso'],'d/m/Y');
$record['data_obito'] = format_date($record['data_obito'],'d/m/Y');
$record['data_encerramento_caso'] = format_date($record['data_encerramento_caso'],'d/m/Y');
$record['date_created'] = format_date($record['date_created'],'d/m/Y H:i:s');
$record['date_updated'] = format_date($record['date_updated'],'d/m/Y H:i:s');
			$page_title = $this->view->page_title = "Detalhes";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		}
		else{
			if($db->getLastError()){
				$this->set_page_error();
			}
			else{
				$this->set_page_error("Registro não encontrado");
			}
		}
		return $this->render_view("casos/view.php", $record);
	}
	/**
     * Insert new record to the database table
	 * @param $formdata array() from $_POST
     * @return BaseView
     */
	function add($formdata = null){
		if($formdata){
			$db = $this->GetModel();
			$tablename = $this->tablename;
			$request = $this->request;
			//fillable fields
			$fields = $this->fields = array("nome_paciente","telefone","status_exame","origem","inicio_sintomas","data_coleta_exame","local_coleta","tipo_exame","internado","resultado","caso_ativo","data_descarte_caso","data_encerramento_caso","obito","data_obito","inserido_por");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'nome_paciente' => 'required',
			);
			$this->sanitize_array = array(
				'nome_paciente' => 'sanitize_string',
				'telefone' => 'sanitize_string',
				'status_exame' => 'sanitize_string',
				'origem' => 'sanitize_string',
				'inicio_sintomas' => 'sanitize_string',
				'data_coleta_exame' => 'sanitize_string',
				'local_coleta' => 'sanitize_string',
				'tipo_exame' => 'sanitize_string',
				'internado' => 'sanitize_string',
				'resultado' => 'sanitize_string',
				'caso_ativo' => 'sanitize_string',
				'data_descarte_caso' => 'sanitize_string',
				'data_encerramento_caso' => 'sanitize_string',
				'obito' => 'sanitize_string',
				'data_obito' => 'sanitize_string',
				'inserido_por' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['date_created'] = datetime_now();
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Registro adicionado com sucesso", "success");
					return	$this->redirect("casos");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Adicionar novo";
		$this->render_view("casos/add.php");
	}
	/**
     * Update table record with formdata
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function edit($rec_id = null, $formdata = null){
		$request = $this->request;
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		 //editable fields
		$fields = $this->fields = array("id","nome_paciente","telefone","status_exame","origem","inicio_sintomas","data_coleta_exame","local_coleta","tipo_exame","internado","resultado","caso_ativo","data_descarte_caso","data_encerramento_caso","obito","data_obito","inserido_por");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'nome_paciente' => 'required',
			);
			$this->sanitize_array = array(
				'nome_paciente' => 'sanitize_string',
				'telefone' => 'sanitize_string',
				'status_exame' => 'sanitize_string',
				'origem' => 'sanitize_string',
				'inicio_sintomas' => 'sanitize_string',
				'data_coleta_exame' => 'sanitize_string',
				'local_coleta' => 'sanitize_string',
				'tipo_exame' => 'sanitize_string',
				'internado' => 'sanitize_string',
				'resultado' => 'sanitize_string',
				'caso_ativo' => 'sanitize_string',
				'data_descarte_caso' => 'sanitize_string',
				'data_encerramento_caso' => 'sanitize_string',
				'obito' => 'sanitize_string',
				'data_obito' => 'sanitize_string',
				'inserido_por' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['date_updated'] = datetime_now();
			if($this->validated()){
				$db->where("casos.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Registro atualizado com sucesso", "success");
					return $this->redirect("casos");
				}
				else{
					if($db->getLastError()){
						$this->set_page_error();
					}
					elseif(!$numRows){
						//not an error, but no record was updated
						$page_error = "Nenhum registro atualizado";
						$this->set_page_error($page_error);
						$this->set_flash_msg($page_error, "warning");
						return	$this->redirect("casos");
					}
				}
			}
		}
		$db->where("casos.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Editar Casos";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("casos/edit.php", $data);
	}
	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
     * @return BaseView
     */
	function delete($rec_id = null){
		Csrf::cross_check();
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$this->rec_id = $rec_id;
		//form multiple delete, split record id separated by comma into array
		$arr_rec_id = array_map('trim', explode(",", $rec_id));
		$db->where("casos.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Registro excluído com sucesso", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("casos");
	}
}
