<?php
$comp_model = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;
?>
<section class="page ajax-page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Prontuário</h4>
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
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="card animated fadeIn page-content">
                        <?php
                        $counter = 0;
                        if(!empty($data)){
                        $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <?php Html::ajaxpage_spinner(); ?>
                            <table class="table table-hover table-bordered table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-nome_paciente">
                                        <th class="title"> Nome Paciente: </th>
                                        <td class="value"> <?php echo $data['nome_paciente']; ?></td>
                                    </tr>
                                    <tr  class="td-telefone">
                                        <th class="title"> Telefone: </th>
                                        <td class="value"> <?php echo $data['telefone']; ?></td>
                                    </tr>
                                    <tr  class="td-status_exame">
                                        <th class="title"> Status Exame: </th>
                                        <td class="value"> <?php echo $data['status_exame']; ?></td>
                                    </tr>
                                    <tr  class="td-origem">
                                        <th class="title"> Origem: </th>
                                        <td class="value"> <?php echo $data['origem']; ?></td>
                                    </tr>
                                    <tr  class="td-inicio_sintomas">
                                        <th class="title"> Inicio Sintomas: </th>
                                        <td class="value"> <?php echo $data['inicio_sintomas']; ?></td>
                                    </tr>
                                    <tr  class="td-data_coleta_exame">
                                        <th class="title"> Data Coleta Exame: </th>
                                        <td class="value"> <?php echo $data['data_coleta_exame']; ?></td>
                                    </tr>
                                    <tr  class="td-local_coleta">
                                        <th class="title"> Local Coleta: </th>
                                        <td class="value"> <?php echo $data['local_coleta']; ?></td>
                                    </tr>
                                    <tr  class="td-tipo_exame">
                                        <th class="title"> Tipo Exame: </th>
                                        <td class="value"> <?php echo $data['tipo_exame']; ?></td>
                                    </tr>
                                    <tr  class="td-internado">
                                        <th class="title"> Internado: </th>
                                        <td class="value"> <?php echo $data['internado']; ?></td>
                                    </tr>
                                    <tr  class="td-resultado">
                                        <th class="title"> Resultado: </th>
                                        <td class="value"> <?php echo $data['resultado']; ?></td>
                                    </tr>
                                    <tr  class="td-caso_ativo">
                                        <th class="title"> Caso Ativo: </th>
                                        <td class="value"> <?php echo $data['caso_ativo']; ?></td>
                                    </tr>
                                    <tr  class="td-data_descarte_caso">
                                        <th class="title"> Data Descarte Caso: </th>
                                        <td class="value"> <?php echo $data['data_descarte_caso']; ?></td>
                                    </tr>
                                    <tr  class="td-data_obito">
                                        <th class="title"> Data Obito: </th>
                                        <td class="value"> <?php echo $data['data_obito']; ?></td>
                                    </tr>
                                    <tr  class="td-data_encerramento_caso">
                                        <th class="title"> Data Encerramento Caso: </th>
                                        <td class="value"> <?php echo $data['data_encerramento_caso']; ?></td>
                                    </tr>
                                    <tr  class="td-obito">
                                        <th class="title"> Houve Óbito?: </th>
                                        <td class="value"> <?php echo $data['obito']; ?></td>
                                    </tr>
                                    <tr  class="td-inserido_por">
                                        <th class="title"> Inserido Por: </th>
                                        <td class="value"> <?php echo $data['inserido_por']; ?></td>
                                    </tr>
                                    <tr  class="td-date_created">
                                        <th class="title"> Adicionado ao sistema em: </th>
                                        <td class="value"> <?php echo $data['date_created']; ?></td>
                                    </tr>
                                    <tr  class="td-date_updated">
                                        <th class="title"> Atualizado pela ultima vez em: </th>
                                        <td class="value"> <?php echo $data['date_updated']; ?></td>
                                    </tr>
                                </tbody>
                                <!-- Table Body End -->
                            </table>
                        </div>
                        <div class="p-3 d-flex">
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
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("casos/edit/$rec_id"); ?>">
                                                    <i class="material-icons">edit</i> Editar
                                                </a>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("casos/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Tem certeza de que deseja excluir este registro?" data-display-style="modal">
                                                    <i class="material-icons">clear</i> Excluir
                                                </a>
                                            </div>
                                            <?php
                                            }
                                            else{
                                            ?>
                                            <!-- Empty Record Message -->
                                            <div class="text-muted p-3">
                                                <i class="material-icons">block</i> Nenhum Registro Encontrado
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
