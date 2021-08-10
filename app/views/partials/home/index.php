<?php 
$page_id = null;
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
?>
<div>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <h2 >Resumo Geral</h2>
                </div>
                <div class="col-md-5 comp-grid">
                    <?php $rec_count = $comp_model->getcount_totaldenotificaes();  ?>
                    <a class="animated zoomIn record-count card bg-light text-dark"  href="<?php print_link("casos/") ?>">
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Total de notificações</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                    <?php $rec_count = $comp_model->getcount_casossuspeitos();  ?>
                    <a class="animated zoomIn record-count card bg-light text-dark"  href="<?php print_link("casos?casos_inicio_sintomas=&casos_data_coleta_exame=&casos_data_obito=&casos_resultado%5B%5D=SUSPEITO") ?>">
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Casos Suspeitos</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                    <?php $rec_count = $comp_model->getcount_casosdescartados();  ?>
                    <a class="animated zoomIn record-count card bg-light text-dark"  href="<?php print_link("casos?casos_inicio_sintomas=&casos_data_coleta_exame=&casos_data_obito=&casos_resultado%5B%5D=NEGATIVO") ?>">
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Casos Descartados</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                    <?php $rec_count = $comp_model->getcount_casosconfirmados();  ?>
                    <a class="animated zoomIn record-count card bg-light text-dark"  href="<?php print_link("casos?casos_inicio_sintomas=&casos_data_coleta_exame=&casos_data_obito=&casos_resultado%5B%5D=POSITIVO") ?>">
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Casos Confirmados</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                    <?php $rec_count = $comp_model->getcount_casosrecuperados();  ?>
                    <a class="animated zoomIn record-count card bg-light text-dark"  href="<?php print_link("casos?casos_inicio_sintomas=&casos_data_coleta_exame=&casos_data_obito=&casos_caso_ativo%5B%5D=N&casos_resultado%5B%5D=POSITIVO") ?>">
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Casos Recuperados</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                    <?php $rec_count = $comp_model->getcount_casosativos();  ?>
                    <a class="animated zoomIn record-count card bg-light text-dark"  href="<?php print_link("casos?casos_inicio_sintomas=&casos_data_coleta_exame=&casos_data_obito=&casos_caso_ativo%5B%5D=S") ?>">
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Casos Ativos</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                    <?php $rec_count = $comp_model->getcount_internados();  ?>
                    <a class="animated zoomIn record-count card bg-light text-dark"  href="<?php print_link("casos?casos_inicio_sintomas=&casos_data_coleta_exame=&casos_data_obito=&casos_internado%5B%5D=S") ?>">
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Internados</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                    <?php $rec_count = $comp_model->getcount_bitos();  ?>
                    <a class="animated zoomIn record-count card bg-light text-dark"  href="<?php print_link("casos?casos_inicio_sintomas=&casos_data_coleta_exame=&casos_data_obito=&casos_obito=SIM") ?>">
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Óbitos</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-5 comp-grid">
                    <h2 >Clique em um dos cards ao lado para ver quem são as pessoas incluídas na contagem.<br><br><br><br>Ou clique no botão abaixo para adicionar um novo:<br><br></h2>
                        <a  class="btn btn-primary" href="<?php print_link("casos/add") ?>">
                            <i class="material-icons mi-xlg">exposure_plus_1</i>                                
                            Adicionar Novo Caso 
                        </a>
                    </div>
                    <div class="col-md-12 comp-grid">
                        <h4 ></h4>
                        <div class=""><br><br><br><br></div><h1 >Panorama dos casos</h1>
                            <div class="card card-body">
                                <?php 
                                $chartdata = $comp_model->barchart_casosconfirmadosnosmeses();
                                ?>
                                <div>
                                    <h4>Casos Confirmados nos meses</h4>
                                    <small class="text-muted"></small>
                                </div>
                                <hr />
                                <canvas id="barchart_casosconfirmadosnosmeses"></canvas>
                                <script>
                                    $(function (){
                                    var chartData = {
                                    labels : <?php echo json_encode($chartdata['labels']); ?>,
                                    datasets : [
                                    {
                                    label: 'Quantidade de Casos',
                                    backgroundColor:'rgba(0 , 255 , 64, 0.5)',
                                    type:'bar',
                                    borderWidth:5,
                                    data : <?php echo json_encode($chartdata['datasets'][0]); ?>,
                                    }
                                    ]
                                    }
                                    var ctx = document.getElementById('barchart_casosconfirmadosnosmeses');
                                    var chart = new Chart(ctx, {
                                    type:'bar',
                                    data: chartData,
                                    options: {
                                    scaleStartValue: 0,
                                    responsive: true,
                                    scales: {
                                    xAxes: [{
                                    ticks:{display: true},
                                    gridLines:{display: true},
                                    categoryPercentage: 1.0,
                                    barPercentage: 0.8,
                                    scaleLabel: {
                                    display: true,
                                    labelString: "Mês"
                                    },
                                    }],
                                    yAxes: [{
                                    ticks: {
                                    beginAtZero: true,
                                    display: true
                                    },
                                    scaleLabel: {
                                    display: true,
                                    labelString: "Quantidade"
                                    }
                                    }]
                                    },
                                    }
                                    ,
                                    })});
                                </script>
                            </div>
                            <div class="card card-body">
                                <?php 
                                $chartdata = $comp_model->piechart_tiposdeexamesrealizados();
                                ?>
                                <div>
                                    <h4>Tipos de Exames Realizados</h4>
                                    <small class="text-muted">Divisão dos numeros de cordo com o tipo de exame</small>
                                </div>
                                <hr />
                                <canvas id="piechart_tiposdeexamesrealizados"></canvas>
                                <script>
                                    $(function (){
                                    var chartData = {
                                    labels : <?php echo json_encode($chartdata['labels']); ?>,
                                    datasets : [
                                    {
                                    label: 'Dataset 1',
                                    borderColor:'rgba(128 , 255 , 0, 0.7)',
                                    backgroundColor:'<?php echo random_color(0,9); ?>',
                                    borderWidth:5,
                                    data : <?php echo json_encode($chartdata['datasets'][0]); ?>,
                                    }
                                    ]
                                    }
                                    var ctx = document.getElementById('piechart_tiposdeexamesrealizados');
                                    var chart = new Chart(ctx, {
                                    type:'pie',
                                    data: chartData,
                                    options: {
                                    responsive: true,
                                    scales: {
                                    yAxes: [{
                                    ticks:{display: false},
                                    gridLines:{display: false},
                                    scaleLabel: {
                                    display: true,
                                    labelString: ""
                                    }
                                    }],
                                    xAxes: [{
                                    ticks:{display: false},
                                    gridLines:{display: false},
                                    scaleLabel: {
                                    display: true,
                                    labelString: ""
                                    }
                                    }],
                                    },
                                    }
                                    ,
                                    })});
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
