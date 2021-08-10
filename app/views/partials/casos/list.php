<?php
$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data From Controller
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Casos</h4>
                </div>
                <div class="col-sm-3 ">
                    <a  class="btn btn btn-primary my-1" href="<?php print_link("casos/add") ?>">
                        <i class="material-icons">add</i>                               
                        Adicionar novo 
                    </a>
                </div>
                <div class="col-sm-4 ">
                    <form  class="search" action="<?php print_link('casos'); ?>" method="get">
                        <div class="input-group">
                            <input value="<?php echo get_value('search'); ?>" class="form-control" type="text" name="search"  placeholder="Pesquisa" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12 comp-grid">
                        <form method="get" action="<?php print_link($current_page) ?>" class="form filter-form">
                            <h1 >Filtrar Dados</h1>
                            <div id="Comp-2-Accordion-Group" role="tablist" class="accordion-group">
                                <div class="card">
                                    <div class="card-header accordion-header" data-toggle="collapse" data-target="#Accordion-2-Page1" role="tab">
                                        Clique para abrir opções de filtros <span class="expand text-muted">+</span>
                                    </div>
                                    <div id="Accordion-2-Page1" class="collapse " data-parent="#Comp-2-Accordion-Group">
                                        <div class="card mb-3">
                                            <div class="card-header h4 h4">Filtrar por Inicio dos Sintomas</div>
                                            <div class="p-2">
                                                <input class="form-control datepicker"  value="<?php echo $this->set_field_value('casos_inicio_sintomas') ?>" type="datetime"  name="casos_inicio_sintomas" placeholder="Selecione 2 dias para definir um período" data-enable-time="" data-date-format="Y-m-d" data-alt-format="M j, Y" data-inline="false" data-no-calendar="false" data-mode="range" />
                                                </div>
                                            </div>
                                            <div class="card mb-3">
                                                <div class="card-header h4 h4">Filtrar por Data da Coleta</div>
                                                <div class="p-2">
                                                    <input class="form-control datepicker"  value="<?php echo $this->set_field_value('casos_data_coleta_exame') ?>" type="datetime"  name="casos_data_coleta_exame" placeholder="Selecione 2 dias para definir um período" data-enable-time="" data-date-format="Y-m-d" data-alt-format="M j, Y" data-inline="false" data-no-calendar="false" data-mode="range" />
                                                    </div>
                                                </div>
                                                <div class="card mb-3">
                                                    <div class="card-header h4 h4">Filtrar por Data do Óbito</div>
                                                    <div class="p-2">
                                                        <input class="form-control datepicker"  value="<?php echo $this->set_field_value('casos_data_obito') ?>" type="datetime"  name="casos_data_obito" placeholder="Selecione 2 dias para definir um período" data-enable-time="" data-date-format="Y-m-d" data-alt-format="M j, Y" data-inline="false" data-no-calendar="false" data-mode="range" />
                                                        </div>
                                                    </div>
                                                    <div class="card mb-3">
                                                        <div class="card-header h4 h4">Caso Ativo?</div>
                                                        <div class="p-2">
                                                            <?php
                                                            $casos_caso_ativo_options = Menu :: $internado;
                                                            if(!empty($casos_caso_ativo_options)){
                                                            foreach($casos_caso_ativo_options as $option){
                                                            $value = $option['value'];
                                                            $label = $option['label'];
                                                            //check if current option is checked option
                                                            $checked = $this->set_field_checked('casos_caso_ativo', $value);
                                                            ?>
                                                            <label class="custom-control custom-checkbox custom-control-inline option-btn">
                                                                <input id="" class="custom-control-input" value="<?php echo $value ?>" <?php echo $checked ?> type="checkbox" name="casos_caso_ativo[]" />
                                                                    <span class="custom-control-label"><?php echo $label ?></span>
                                                                </label>
                                                                <?php
                                                                }
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="card mb-3">
                                                            <div class="card-header h4 h4">Filtrar por Status do Exame</div>
                                                            <div class="p-2">
                                                                <?php 
                                                                $casos_status_exame_options = $comp_model -> casos_casosstatus_exame_option_list();
                                                                if(!empty($casos_status_exame_options)){
                                                                $ci = 0;
                                                                foreach($casos_status_exame_options as $option){
                                                                $ci++;
                                                                $value = (!empty($option['value']) ? $option['value'] : null);
                                                                $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                $checked = $this->set_field_checked('casos_status_exame', $value);
                                                                ?>
                                                                <label class="custom-control custom-checkbox custom-control-inline">
                                                                    <input id="" class="custom-control-input" <?php echo $checked; ?> value="<?php echo $value; ?>" type="checkbox" name="casos_status_exame[]"  />
                                                                        <span class="custom-control-label"><?php echo $label; ?></span>
                                                                    </label>
                                                                    <?php
                                                                    }
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <div class="card mb-3">
                                                                <div class="card-header h4 h4">Filtrar por Resultado do Exame</div>
                                                                <div class="p-2">
                                                                    <?php 
                                                                    $casos_resultado_options = $comp_model -> casos_casosresultado_option_list();
                                                                    if(!empty($casos_resultado_options)){
                                                                    $ci = 0;
                                                                    foreach($casos_resultado_options as $option){
                                                                    $ci++;
                                                                    $value = (!empty($option['value']) ? $option['value'] : null);
                                                                    $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                    $checked = $this->set_field_checked('casos_resultado', $value);
                                                                    ?>
                                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                                        <input id="" class="custom-control-input" <?php echo $checked; ?> value="<?php echo $value; ?>" type="checkbox" name="casos_resultado[]"  />
                                                                            <span class="custom-control-label"><?php echo $label; ?></span>
                                                                        </label>
                                                                        <?php
                                                                        }
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div class="card mb-3">
                                                                    <div class="card-header h4 h4">Filtrar por Tipo de Exame</div>
                                                                    <div class="p-2">
                                                                        <?php 
                                                                        $casos_tipo_exame_options = $comp_model -> casos_casostipo_exame_option_list();
                                                                        if(!empty($casos_tipo_exame_options)){
                                                                        $ci = 0;
                                                                        foreach($casos_tipo_exame_options as $option){
                                                                        $ci++;
                                                                        $value = (!empty($option['value']) ? $option['value'] : null);
                                                                        $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                        $checked = $this->set_field_checked('casos_tipo_exame', $value);
                                                                        ?>
                                                                        <label class="custom-control custom-checkbox custom-control-inline">
                                                                            <input id="" class="custom-control-input" <?php echo $checked; ?> value="<?php echo $value; ?>" type="checkbox" name="casos_tipo_exame[]"  />
                                                                                <span class="custom-control-label"><?php echo $label; ?></span>
                                                                            </label>
                                                                            <?php
                                                                            }
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card mb-3">
                                                                        <div class="card-header h4 h4">Filtrar por Internações</div>
                                                                        <div class="p-2">
                                                                            <?php
                                                                            $casos_internado_options = Menu :: $internado;
                                                                            if(!empty($casos_internado_options)){
                                                                            foreach($casos_internado_options as $option){
                                                                            $value = $option['value'];
                                                                            $label = $option['label'];
                                                                            //check if current option is checked option
                                                                            $checked = $this->set_field_checked('casos_internado', $value);
                                                                            ?>
                                                                            <label class="custom-control custom-checkbox custom-control-inline option-btn">
                                                                                <input id="" class="custom-control-input" value="<?php echo $value ?>" <?php echo $checked ?> type="checkbox" name="casos_internado[]" />
                                                                                    <span class="custom-control-label"><?php echo $label ?></span>
                                                                                </label>
                                                                                <?php
                                                                                }
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card mb-3">
                                                                            <div class="card-header h4 h4">Filtrar por falecidos</div>
                                                                            <div class="p-2">
                                                                                <?php
                                                                                $casos_obito_options = Menu :: $obito;
                                                                                if(!empty($casos_obito_options)){
                                                                                foreach($casos_obito_options as $option){
                                                                                $value = $option['value'];
                                                                                $label = $option['label'];
                                                                                //check if current option is checked option
                                                                                $checked = $this->set_field_checked('casos_obito', $value);
                                                                                ?>
                                                                                <label class="custom-control custom-radio custom-control-inline">
                                                                                    <input id="" class="custom-control-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio" name="casos_obito"  />
                                                                                        <span class="custom-control-label"><?php echo $label ?></span>
                                                                                    </label>
                                                                                    <?php
                                                                                    }
                                                                                    }
                                                                                    ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="card mb-3">
                                                                                <div class="card-header h4 h4">Filtrar por Origem</div>
                                                                                <div class="p-2">
                                                                                    <?php 
                                                                                    $casos_origem_options = $comp_model -> casos_casosorigem_option_list();
                                                                                    if(!empty($casos_origem_options)){
                                                                                    $ci = 0;
                                                                                    foreach($casos_origem_options as $option){
                                                                                    $ci++;
                                                                                    $value = (!empty($option['value']) ? $option['value'] : null);
                                                                                    $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                                    $checked = $this->set_field_checked('casos_origem', $value);
                                                                                    ?>
                                                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                                                        <input id="" class="custom-control-input" <?php echo $checked; ?> value="<?php echo $value; ?>" type="checkbox" name="casos_origem[]"  />
                                                                                            <span class="custom-control-label"><?php echo $label; ?></span>
                                                                                        </label>
                                                                                        <?php
                                                                                        }
                                                                                        }
                                                                                        ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="">
                                                                        <!-- Page bread crumbs components-->
                                                                        <?php
                                                                        if(!empty($field_name) || !empty($_GET['search'])){
                                                                        ?>
                                                                        <hr class="sm d-block d-sm-none" />
                                                                        <nav class="page-header-breadcrumbs mt-2" aria-label="breadcrumb">
                                                                            <ul class="breadcrumb m-0 p-1">
                                                                                <?php
                                                                                if(!empty($field_name)){
                                                                                ?>
                                                                                <li class="breadcrumb-item">
                                                                                    <a class="text-decoration-none" href="<?php print_link('casos'); ?>">
                                                                                        <i class="material-icons">arrow_back</i>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="breadcrumb-item">
                                                                                    <?php echo (get_value("tag") ? get_value("tag")  :  make_readable($field_name)); ?>
                                                                                </li>
                                                                                <li  class="breadcrumb-item active text-capitalize font-weight-bold">
                                                                                    <?php echo (get_value("label") ? get_value("label")  :  make_readable(urldecode($field_value))); ?>
                                                                                </li>
                                                                                <?php 
                                                                                }   
                                                                                ?>
                                                                                <?php
                                                                                if(get_value("search")){
                                                                                ?>
                                                                                <li class="breadcrumb-item">
                                                                                    <a class="text-decoration-none" href="<?php print_link('casos'); ?>">
                                                                                        <i class="material-icons">arrow_back</i>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="breadcrumb-item text-capitalize">
                                                                                    Pesquisa
                                                                                </li>
                                                                                <li  class="breadcrumb-item active text-capitalize font-weight-bold"><?php echo get_value("search"); ?></li>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </ul>
                                                                        </nav>
                                                                        <!--End of Page bread crumbs components-->
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                    <hr />
                                                                    <div class="form-group text-center">
                                                                        <button class="btn btn-primary">Filter</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                }
                                                ?>
                                                <div  class="">
                                                    <div class="container-fluid">
                                                        <div class="row ">
                                                            <div class="col-md-12 comp-grid">
                                                                <form method="get" action="<?php print_link($current_page) ?>" class="form filter-form">
                                                                    <?php $this :: display_page_errors(); ?>
                                                                    <div class="filter-tags mb-2">
                                                                        <?php
                                                                        if(!empty($_GET['casos_inicio_sintomas'])){
                                                                        ?>
                                                                        <div class="filter-chip card bg-light">
                                                                            <b>Casos Inicio Sintomas :</b> 
                                                                            <?php
                                                                            $date_val = get_value('casos_inicio_sintomas');
                                                                            $formated_date = "";
                                                                            if(str_contains('-to-', $date_val)){
                                                                            //if value is a range date
                                                                            $vals = explode('-to-' , str_replace(' ' , '' , $date_val));
                                                                            $startdate = $vals[0];
                                                                            $enddate = $vals[1];
                                                                            $formated_date = format_date($startdate, 'jS F, Y') . ' <span class="text-muted">&#10148;</span> ' . format_date($enddate, 'jS F, Y');
                                                                            }
                                                                            elseif(str_contains(',', $date_val)){
                                                                            //multi date values
                                                                            $vals = explode(',' , str_replace(' ' , '' , $date_val));
                                                                            $formated_arrs = array_map(function($date){return format_date($date, 'jS F, Y');}, $vals);
                                                                            $formated_date = implode(' <span class="text-info">&#11161;</span> ', $formated_arrs);
                                                                            }
                                                                            else{
                                                                            $formated_date = format_date($date_val, 'jS F, Y');
                                                                            }
                                                                            echo  $formated_date;
                                                                            $remove_link = unset_get_value('casos_inicio_sintomas', $this->route->page_url);
                                                                            ?>
                                                                            <a href="<?php print_link($remove_link); ?>" class="close-btn">
                                                                                &times;
                                                                            </a>
                                                                        </div>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                        <?php
                                                                        if(!empty($_GET['casos_data_coleta_exame'])){
                                                                        ?>
                                                                        <div class="filter-chip card bg-light">
                                                                            <b>Casos Data Coleta Exame :</b> 
                                                                            <?php
                                                                            $date_val = get_value('casos_data_coleta_exame');
                                                                            $formated_date = "";
                                                                            if(str_contains('-to-', $date_val)){
                                                                            //if value is a range date
                                                                            $vals = explode('-to-' , str_replace(' ' , '' , $date_val));
                                                                            $startdate = $vals[0];
                                                                            $enddate = $vals[1];
                                                                            $formated_date = format_date($startdate, 'jS F, Y') . ' <span class="text-muted">&#10148;</span> ' . format_date($enddate, 'jS F, Y');
                                                                            }
                                                                            elseif(str_contains(',', $date_val)){
                                                                            //multi date values
                                                                            $vals = explode(',' , str_replace(' ' , '' , $date_val));
                                                                            $formated_arrs = array_map(function($date){return format_date($date, 'jS F, Y');}, $vals);
                                                                            $formated_date = implode(' <span class="text-info">&#11161;</span> ', $formated_arrs);
                                                                            }
                                                                            else{
                                                                            $formated_date = format_date($date_val, 'jS F, Y');
                                                                            }
                                                                            echo  $formated_date;
                                                                            $remove_link = unset_get_value('casos_data_coleta_exame', $this->route->page_url);
                                                                            ?>
                                                                            <a href="<?php print_link($remove_link); ?>" class="close-btn">
                                                                                &times;
                                                                            </a>
                                                                        </div>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                        <?php
                                                                        if(!empty($_GET['casos_data_obito'])){
                                                                        ?>
                                                                        <div class="filter-chip card bg-light">
                                                                            <b>Casos Data Obito :</b> 
                                                                            <?php
                                                                            $date_val = get_value('casos_data_obito');
                                                                            $formated_date = "";
                                                                            if(str_contains('-to-', $date_val)){
                                                                            //if value is a range date
                                                                            $vals = explode('-to-' , str_replace(' ' , '' , $date_val));
                                                                            $startdate = $vals[0];
                                                                            $enddate = $vals[1];
                                                                            $formated_date = format_date($startdate, 'jS F, Y') . ' <span class="text-muted">&#10148;</span> ' . format_date($enddate, 'jS F, Y');
                                                                            }
                                                                            elseif(str_contains(',', $date_val)){
                                                                            //multi date values
                                                                            $vals = explode(',' , str_replace(' ' , '' , $date_val));
                                                                            $formated_arrs = array_map(function($date){return format_date($date, 'jS F, Y');}, $vals);
                                                                            $formated_date = implode(' <span class="text-info">&#11161;</span> ', $formated_arrs);
                                                                            }
                                                                            else{
                                                                            $formated_date = format_date($date_val, 'jS F, Y');
                                                                            }
                                                                            echo  $formated_date;
                                                                            $remove_link = unset_get_value('casos_data_obito', $this->route->page_url);
                                                                            ?>
                                                                            <a href="<?php print_link($remove_link); ?>" class="close-btn">
                                                                                &times;
                                                                            </a>
                                                                        </div>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                        <?php
                                                                        if(!empty(get_value('casos_caso_ativo'))){
                                                                        ?>
                                                                        <div class="filter-chip card bg-light">
                                                                            <b>Casos Caso Ativo :</b> 
                                                                            <?php 
                                                                            if(get_value('casos_caso_ativolabel')){
                                                                            echo get_value('casos_caso_ativolabel');
                                                                            }
                                                                            else{
                                                                            echo get_value('casos_caso_ativo');
                                                                            }
                                                                            $remove_link = unset_get_value('casos_caso_ativo', $this->route->page_url);
                                                                            ?>
                                                                            <a href="<?php print_link($remove_link); ?>" class="close-btn">
                                                                                &times;
                                                                            </a>
                                                                        </div>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                        <?php
                                                                        if(!empty(get_value('casos_status_exame'))){
                                                                        ?>
                                                                        <div class="filter-chip card bg-light">
                                                                            <b>Casos Status Exame :</b> 
                                                                            <?php 
                                                                            if(get_value('casos_status_examelabel')){
                                                                            echo get_value('casos_status_examelabel');
                                                                            }
                                                                            else{
                                                                            echo get_value('casos_status_exame');
                                                                            }
                                                                            $remove_link = unset_get_value('casos_status_exame', $this->route->page_url);
                                                                            ?>
                                                                            <a href="<?php print_link($remove_link); ?>" class="close-btn">
                                                                                &times;
                                                                            </a>
                                                                        </div>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                        <?php
                                                                        if(!empty(get_value('casos_resultado'))){
                                                                        ?>
                                                                        <div class="filter-chip card bg-light">
                                                                            <b>Casos Resultado :</b> 
                                                                            <?php 
                                                                            if(get_value('casos_resultadolabel')){
                                                                            echo get_value('casos_resultadolabel');
                                                                            }
                                                                            else{
                                                                            echo get_value('casos_resultado');
                                                                            }
                                                                            $remove_link = unset_get_value('casos_resultado', $this->route->page_url);
                                                                            ?>
                                                                            <a href="<?php print_link($remove_link); ?>" class="close-btn">
                                                                                &times;
                                                                            </a>
                                                                        </div>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                        <?php
                                                                        if(!empty(get_value('casos_tipo_exame'))){
                                                                        ?>
                                                                        <div class="filter-chip card bg-light">
                                                                            <b>Casos Tipo Exame :</b> 
                                                                            <?php 
                                                                            if(get_value('casos_tipo_examelabel')){
                                                                            echo get_value('casos_tipo_examelabel');
                                                                            }
                                                                            else{
                                                                            echo get_value('casos_tipo_exame');
                                                                            }
                                                                            $remove_link = unset_get_value('casos_tipo_exame', $this->route->page_url);
                                                                            ?>
                                                                            <a href="<?php print_link($remove_link); ?>" class="close-btn">
                                                                                &times;
                                                                            </a>
                                                                        </div>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                        <?php
                                                                        if(!empty(get_value('casos_internado'))){
                                                                        ?>
                                                                        <div class="filter-chip card bg-light">
                                                                            <b>Casos Internado :</b> 
                                                                            <?php 
                                                                            if(get_value('casos_internadolabel')){
                                                                            echo get_value('casos_internadolabel');
                                                                            }
                                                                            else{
                                                                            echo get_value('casos_internado');
                                                                            }
                                                                            $remove_link = unset_get_value('casos_internado', $this->route->page_url);
                                                                            ?>
                                                                            <a href="<?php print_link($remove_link); ?>" class="close-btn">
                                                                                &times;
                                                                            </a>
                                                                        </div>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                        <?php
                                                                        if(!empty(get_value('casos_obito'))){
                                                                        ?>
                                                                        <div class="filter-chip card bg-light">
                                                                            <b>Casos Obito :</b> 
                                                                            <?php 
                                                                            if(get_value('casos_obitolabel')){
                                                                            echo get_value('casos_obitolabel');
                                                                            }
                                                                            else{
                                                                            echo get_value('casos_obito');
                                                                            }
                                                                            $remove_link = unset_get_value('casos_obito', $this->route->page_url);
                                                                            ?>
                                                                            <a href="<?php print_link($remove_link); ?>" class="close-btn">
                                                                                &times;
                                                                            </a>
                                                                        </div>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                        <?php
                                                                        if(!empty(get_value('casos_origem'))){
                                                                        ?>
                                                                        <div class="filter-chip card bg-light">
                                                                            <b>Casos Origem :</b> 
                                                                            <?php 
                                                                            if(get_value('casos_origemlabel')){
                                                                            echo get_value('casos_origemlabel');
                                                                            }
                                                                            else{
                                                                            echo get_value('casos_origem');
                                                                            }
                                                                            $remove_link = unset_get_value('casos_origem', $this->route->page_url);
                                                                            ?>
                                                                            <a href="<?php print_link($remove_link); ?>" class="close-btn">
                                                                                &times;
                                                                            </a>
                                                                        </div>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                    <div  class=" animated fadeIn page-content">
                                                                        <div id="casos-list-records">
                                                                            <div id="page-report-body" class="table-responsive">
                                                                                <table class="table table-hover table-striped table-sm text-left">
                                                                                    <thead class="table-header bg-light">
                                                                                        <tr>
                                                                                            <th class="td-sno">#</th>
                                                                                            <th  class="td-nome_paciente"> Nome Paciente</th>
                                                                                            <th  <?php echo (get_value('orderby')=='inicio_sintomas' ? 'class="sortedby td-inicio_sintomas"' : null); ?>>
                                                                                                <?php Html :: get_field_order_link('inicio_sintomas', "Inicio Sintomas"); ?>
                                                                                            </th>
                                                                                            <th  <?php echo (get_value('orderby')=='data_coleta_exame' ? 'class="sortedby td-data_coleta_exame"' : null); ?>>
                                                                                                <?php Html :: get_field_order_link('data_coleta_exame', "Data Coleta Exame"); ?>
                                                                                            </th>
                                                                                            <th  class="td-resultado"> Resultado</th>
                                                                                            <th class="td-btn"></th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <?php
                                                                                    if(!empty($records)){
                                                                                    ?>
                                                                                    <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
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
                                                                                                        <a class="dropdown-item" href="<?php print_link("casos/edit/$rec_id"); ?>">
                                                                                                            <i class="material-icons">edit</i> Editar
                                                                                                        </a>
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <?php 
                                                                                        }
                                                                                        ?>
                                                                                        <!--endrecord-->
                                                                                    </tbody>
                                                                                    <tbody class="search-data" id="search-data-<?php echo $page_element_id; ?>"></tbody>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                </table>
                                                                                <?php 
                                                                                if(empty($records)){
                                                                                ?>
                                                                                <h4 class="bg-light text-center border-top text-muted animated bounce  p-3">
                                                                                    <i class="material-icons">block</i> Nenhum Registro Encontrado
                                                                                </h4>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                            <?php
                                                                            if( $show_footer && !empty($records)){
                                                                            ?>
                                                                            <div class=" border-top mt-2">
                                                                                <div class="row justify-content-center">    
                                                                                    <div class="col-md-auto justify-content-center">    
                                                                                        <div class="p-3 d-flex justify-content-between">    
                                                                                            <div class="dropup export-btn-holder mx-1">
                                                                                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                                    <i class="material-icons">save</i> Exportar
                                                                                                </button>
                                                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                                                    <?php $export_print_link = $this->set_current_page_link(array('format' => 'print')); ?>
                                                                                                    <a class="dropdown-item export-link-btn" data-format="print" href="<?php print_link($export_print_link); ?>" target="_blank">
                                                                                                        <img src="<?php print_link('assets/images/print.png') ?>" class="mr-2" /> PRINT
                                                                                                        </a>
                                                                                                        <?php $export_pdf_link = $this->set_current_page_link(array('format' => 'pdf')); ?>
                                                                                                        <a class="dropdown-item export-link-btn" data-format="pdf" href="<?php print_link($export_pdf_link); ?>" target="_blank">
                                                                                                            <img src="<?php print_link('assets/images/pdf.png') ?>" class="mr-2" /> PDF
                                                                                                            </a>
                                                                                                            <?php $export_word_link = $this->set_current_page_link(array('format' => 'word')); ?>
                                                                                                            <a class="dropdown-item export-link-btn" data-format="word" href="<?php print_link($export_word_link); ?>" target="_blank">
                                                                                                                <img src="<?php print_link('assets/images/doc.png') ?>" class="mr-2" /> WORD
                                                                                                                </a>
                                                                                                                <?php $export_csv_link = $this->set_current_page_link(array('format' => 'csv')); ?>
                                                                                                                <a class="dropdown-item export-link-btn" data-format="csv" href="<?php print_link($export_csv_link); ?>" target="_blank">
                                                                                                                    <img src="<?php print_link('assets/images/csv.png') ?>" class="mr-2" /> CSV
                                                                                                                    </a>
                                                                                                                    <?php $export_excel_link = $this->set_current_page_link(array('format' => 'excel')); ?>
                                                                                                                    <a class="dropdown-item export-link-btn" data-format="excel" href="<?php print_link($export_excel_link); ?>" target="_blank">
                                                                                                                        <img src="<?php print_link('assets/images/xsl.png') ?>" class="mr-2" /> EXCEL
                                                                                                                        </a>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col">   
                                                                                                            <?php
                                                                                                            if($show_pagination == true){
                                                                                                            $pager = new Pagination($total_records, $record_count);
                                                                                                            $pager->route = $this->route;
                                                                                                            $pager->show_page_count = true;
                                                                                                            $pager->show_record_count = true;
                                                                                                            $pager->show_page_limit =true;
                                                                                                            $pager->limit_count = $this->limit_count;
                                                                                                            $pager->show_page_number_list = true;
                                                                                                            $pager->pager_link_range=5;
                                                                                                            $pager->render();
                                                                                                            }
                                                                                                            ?>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <?php
                                                                                                }
                                                                                                ?>
                                                                                            </div>
                                                                                        </div>
                                                                                        <hr />
                                                                                        <div class="form-group text-center">
                                                                                            <button class="btn btn-primary">Filter</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </section>
