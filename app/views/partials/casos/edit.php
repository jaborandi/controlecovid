<?php
$comp_model = new SharedController;
$page_element_id = "edit-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="edit"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h2 class="record-title">Editar Casos</h2>
                    <h4>Complemente ou altere dados que não constavam antes</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-7 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="bg-light p-3 animated fadeIn page-content">
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-horizontal needs-validation" action="<?php print_link("casos/edit/$page_id/?csrf_token=$csrf_token"); ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="nome_paciente">Nome Paciente <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-nome_paciente"  value="<?php  echo $data['nome_paciente']; ?>" type="text" placeholder="Nome Completo"  required="" name="nome_paciente"  class="form-control " />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="telefone">Telefone </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input id="ctrl-telefone"  value="<?php  echo $data['telefone']; ?>" type="text" placeholder="Telefone ou Celular"  name="telefone"  class="form-control " />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="status_exame">Status Exame </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <select  id="ctrl-status_exame" name="status_exame"  placeholder="Selecione um valor ..."    class="custom-select" >
                                                            <option value="">Selecione um valor ...</option>
                                                            <?php
                                                            $status_exame_options = Menu :: $status_exame;
                                                            $field_value = $data['status_exame'];
                                                            if(!empty($status_exame_options)){
                                                            foreach($status_exame_options as $option){
                                                            $value = $option['value'];
                                                            $label = $option['label'];
                                                            $selected = ( $value == $field_value ? 'selected' : null );
                                                            ?>
                                                            <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                                <?php echo $label ?>
                                                            </option>                                   
                                                            <?php
                                                            }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="origem">Origem </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <input id="ctrl-origem"  value="<?php  echo $data['origem']; ?>" type="text" placeholder="Origem do Caso" list="origem_list"  name="origem"  class="form-control " />
                                                            <datalist id="origem_list">
                                                                <?php 
                                                                $origem_options = $comp_model -> casos_origem_option_list();
                                                                if(!empty($origem_options)){
                                                                foreach($origem_options as $option){
                                                                $value = (!empty($option['value']) ? $option['value'] : null);
                                                                $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                ?>
                                                                <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                                                                <?php
                                                                }
                                                                }
                                                                ?>
                                                            </datalist>
                                                        </div>
                                                        <small class="form-text">Comece a digitar para autompletar, se não houver na lista apenas escreva para adicionar</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="inicio_sintomas">Inicio Sintomas </label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="input-group">
                                                            <input id="ctrl-inicio_sintomas" class="form-control datepicker  datepicker"  value="<?php  echo $data['inicio_sintomas']; ?>" type="datetime" name="inicio_sintomas" placeholder="Selecione uma data" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="data_coleta_exame">Data Coleta Exame </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="input-group">
                                                                <input id="ctrl-data_coleta_exame" class="form-control datepicker  datepicker"  value="<?php  echo $data['data_coleta_exame']; ?>" type="datetime" name="data_coleta_exame" placeholder="Selecione uma data" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="local_coleta">Local Coleta </label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <input id="ctrl-local_coleta"  value="<?php  echo $data['local_coleta']; ?>" type="text" placeholder="Onde foi coletado o exame?" list="local_coleta_list"  name="local_coleta"  class="form-control " />
                                                                        <datalist id="local_coleta_list">
                                                                            <?php 
                                                                            $local_coleta_options = $comp_model -> casos_local_coleta_option_list();
                                                                            if(!empty($local_coleta_options)){
                                                                            foreach($local_coleta_options as $option){
                                                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                            ?>
                                                                            <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                                                                            <?php
                                                                            }
                                                                            }
                                                                            ?>
                                                                        </datalist>
                                                                    </div>
                                                                    <small class="form-text">Comece a digitar para autompletar, se não houver na lista apenas escreva para adicionar</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label" for="tipo_exame">Tipo Exame </label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="">
                                                                        <input id="ctrl-tipo_exame"  value="<?php  echo $data['tipo_exame']; ?>" type="text" placeholder="Qual o tipo de exame?" list="tipo_exame_list"  name="tipo_exame"  class="form-control " />
                                                                            <datalist id="tipo_exame_list">
                                                                                <?php 
                                                                                $tipo_exame_options = $comp_model -> casos_tipo_exame_option_list();
                                                                                if(!empty($tipo_exame_options)){
                                                                                foreach($tipo_exame_options as $option){
                                                                                $value = (!empty($option['value']) ? $option['value'] : null);
                                                                                $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                                ?>
                                                                                <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                                                                                <?php
                                                                                }
                                                                                }
                                                                                ?>
                                                                            </datalist>
                                                                        </div>
                                                                        <small class="form-text">Comece a digitar para autompletar, se não houver na lista apenas escreva para adicionar</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label" for="internado">Internado </label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="">
                                                                            <select  id="ctrl-internado" name="internado"  placeholder="Selecione um valor ..."    class="custom-select" >
                                                                                <option value="">Selecione um valor ...</option>
                                                                                <?php
                                                                                $internado_options = Menu :: $internado;
                                                                                $field_value = $data['internado'];
                                                                                if(!empty($internado_options)){
                                                                                foreach($internado_options as $option){
                                                                                $value = $option['value'];
                                                                                $label = $option['label'];
                                                                                $selected = ( $value == $field_value ? 'selected' : null );
                                                                                ?>
                                                                                <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                                                    <?php echo $label ?>
                                                                                </option>                                   
                                                                                <?php
                                                                                }
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label" for="resultado">Resultado </label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="">
                                                                            <select  id="ctrl-resultado" name="resultado"  placeholder="Selecione um valor ..."    class="custom-select" >
                                                                                <option value="">Selecione um valor ...</option>
                                                                                <?php
                                                                                $resultado_options = Menu :: $resultado;
                                                                                $field_value = $data['resultado'];
                                                                                if(!empty($resultado_options)){
                                                                                foreach($resultado_options as $option){
                                                                                $value = $option['value'];
                                                                                $label = $option['label'];
                                                                                $selected = ( $value == $field_value ? 'selected' : null );
                                                                                ?>
                                                                                <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                                                    <?php echo $label ?>
                                                                                </option>                                   
                                                                                <?php
                                                                                }
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label" for="caso_ativo">Caso Ativo </label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="">
                                                                            <select  id="ctrl-caso_ativo" name="caso_ativo"  placeholder="Selecione um valor ..."    class="custom-select" >
                                                                                <option value="">Selecione um valor ...</option>
                                                                                <?php
                                                                                $caso_ativo_options = Menu :: $internado;
                                                                                $field_value = $data['caso_ativo'];
                                                                                if(!empty($caso_ativo_options)){
                                                                                foreach($caso_ativo_options as $option){
                                                                                $value = $option['value'];
                                                                                $label = $option['label'];
                                                                                $selected = ( $value == $field_value ? 'selected' : null );
                                                                                ?>
                                                                                <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                                                    <?php echo $label ?>
                                                                                </option>                                   
                                                                                <?php
                                                                                }
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label" for="data_descarte_caso">Data Descarte Caso </label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="input-group">
                                                                            <input id="ctrl-data_descarte_caso" class="form-control datepicker  datepicker"  value="<?php  echo $data['data_descarte_caso']; ?>" type="datetime" name="data_descarte_caso" placeholder="Selecione uma data" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <label class="control-label" for="data_encerramento_caso">Data Encerramento Caso </label>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <div class="input-group">
                                                                                <input id="ctrl-data_encerramento_caso" class="form-control datepicker  datepicker"  value="<?php  echo $data['data_encerramento_caso']; ?>" type="datetime" name="data_encerramento_caso" placeholder="Só preencha se o caso já estiver encerrado, para contar como recuperado" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                                                    <div class="input-group-append">
                                                                                        <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <label class="control-label" for="obito">Houve óbito? </label>
                                                                            </div>
                                                                            <div class="col-sm-8">
                                                                                <div class="">
                                                                                    <?php
                                                                                    $obito_options = Menu :: $obito;
                                                                                    $field_value = $data['obito'];
                                                                                    if(!empty($obito_options)){
                                                                                    foreach($obito_options as $option){
                                                                                    $value = $option['value'];
                                                                                    $label = $option['label'];
                                                                                    //check if value is among checked options
                                                                                    $checked = $this->check_form_field_checked($field_value, $value);
                                                                                    ?>
                                                                                    <label class="custom-control custom-checkbox custom-control-inline option-btn">
                                                                                        <input id="ctrl-obito" class="custom-control-input" value="<?php echo $value ?>" <?php echo $checked ?> type="checkbox"  name="obito[]" />
                                                                                            <span class="custom-control-label"><?php echo $label ?></span>
                                                                                        </label>
                                                                                        <?php
                                                                                        }
                                                                                        }
                                                                                        ?>
                                                                                    </div>
                                                                                    <small class="form-text">Marque aqui se esta pessoa faleceu</small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group ">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <label class="control-label" for="data_obito">Data Obito </label>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <div class="input-group">
                                                                                        <input id="ctrl-data_obito" class="form-control datepicker  datepicker"  value="<?php  echo $data['data_obito']; ?>" type="datetime" name="data_obito" placeholder="Selecione uma data" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                                                            <div class="input-group-append">
                                                                                                <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group ">
                                                                                <div class="row">
                                                                                    <div class="col-sm-4">
                                                                                        <label class="control-label" for="inserido_por">Inserido Por </label>
                                                                                    </div>
                                                                                    <div class="col-sm-8">
                                                                                        <div class="">
                                                                                            <input id="ctrl-inserido_por"  value="<?php  echo $data['inserido_por']; ?>" type="text" placeholder="Entrar  Inserido Por"  readonly name="inserido_por"  class="form-control " />
                                                                                            </div>
                                                                                            <small class="form-text">Apenas para controle - Não é possível alterar</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-ajax-status"></div>
                                                                            <div class="form-group text-center">
                                                                                <button class="btn btn-primary" type="submit">
                                                                                    Atualizar
                                                                                    <i class="material-icons">send</i>
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
