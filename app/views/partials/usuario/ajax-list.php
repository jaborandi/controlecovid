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
    <th class=" td-checkbox">
        <label class="custom-control custom-checkbox custom-control-inline">
            <input class="optioncheck custom-control-input" name="optioncheck[]" value="<?php echo $data['id'] ?>" type="checkbox" />
                <span class="custom-control-label"></span>
            </label>
        </th>
        <th class="td-sno"><?php echo $counter; ?></th>
        <td class="td-id"><a href="<?php print_link("usuario/view/$data[id]") ?>"><?php echo $data['id']; ?></a></td>
        <td class="td-login">
            <span  data-value="<?php echo $data['login']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("usuario/editfield/" . urlencode($data['id'])); ?>" 
                data-name="login" 
                data-title="Digite um login" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" >
                <?php echo $data['login']; ?> 
            </span>
        </td>
        <td class="td-email"><a href="<?php print_link("mailto:$data[email]") ?>"><?php echo $data['email']; ?></a></td>
        <td class="td-foto"><?php Html :: page_img($data['foto'],50,50,1); ?></td>
        <th class="td-btn">
            <a class="btn btn-sm btn-success has-tooltip" title="Ver registro" href="<?php print_link("usuario/view/$rec_id"); ?>">
                <i class="material-icons">visibility</i> Visão
            </a>
            <a class="btn btn-sm btn-info has-tooltip" title="Editar este registro" href="<?php print_link("usuario/edit/$rec_id"); ?>">
                <i class="material-icons">edit</i> Editar
            </a>
            <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Excluir este registro" href="<?php print_link("usuario/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Tem certeza de que deseja excluir este registro?" data-display-style="modal">
                <i class="material-icons">clear</i>
                Excluir
            </a>
        </th>
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
    