<?php
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
if (!empty($records)) {
?>
<!--record-->
<?php
$counter = 0;
foreach($records as $data){
$rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
$counter++;
?>
<tr>
    <th class="td-sno"><?php echo $counter; ?></th>
    <td class="td-nome_paciente"> <?php echo $data['nome_paciente']; ?></td>
    <td class="td-inicio_sintomas"> <?php echo $data['inicio_sintomas']; ?></td>
    <td class="td-data_coleta_exame"> <?php echo $data['data_coleta_exame']; ?></td>
    <td class="td-resultado"> <?php echo $data['resultado']; ?></td>
    <td class="page-list-action td-btn">
        <div class="dropdown" >
            <button data-toggle="dropdown" class="dropdown-toggle btn btn-primary btn-sm">
                <i class="material-icons">menu</i> 
            </button>
            <ul class="dropdown-menu">
                <a class="dropdown-item page-modal" href="<?php print_link("casos/view/$rec_id"); ?>">
                    <i class="material-icons">visibility</i> Detalhes 
                </a>
                <a class="dropdown-item page-modal" href="<?php print_link("casos/edit/$rec_id"); ?>">
                    <i class="material-icons">edit</i> Editar
                </a>
            </ul>
        </div>
    </td>
</tr>
<?php 
}
?>
<?php
} else {
?>
<td class="no-record-found col-12" colspan="100">
    <h4 class="text-muted text-center ">
        Nenhum Registro Encontrado
    </h4>
</td>
<?php
}
?>
