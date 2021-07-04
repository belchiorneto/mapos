<!DOCTYPE html>
<html>

<head>
    <title>Grafica Eusébio</title>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/blue.css" class="skin-color" />
</head>

<body style="background-color: transparent">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <?= $topo ?>
                    <div class="widget-title">
                        <h4 style="text-align: center; font-size: 1.1em; padding: 5px;">
                            <?= ucfirst($title) ?>
                        </h4>
                    </div>
                    <div class="widget_content nopadding">
                        <table width="100%" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="160" align="center" style="font-size: 15px">Data</th>
                                    <th width="160" align="center" style="font-size: 15px">Vendas</th>
                                    <th width="160" align="center" style="font-size: 15px">OS</th>
                                    <th width="160" align="center" style="font-size: 15px">Sub-total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $totalGeral = 0;
									
									foreach ($faturamento as $f) {
                                     	echo '<tr>';
                                        echo '<td align="center">'  . date('d/m/Y', strtotime($f['data'])) . '</td>';
                                        echo '<td>R$: ' . number_format($f['totalVendas'], 2, ',', '.') . '</td>';
                                        echo '<td>R$: ' . number_format($f['totalOs'], 2, ',', '.') . '</td>';
                                        echo '<td align="center">R$: ' . number_format($f['totalVendas'] + $f['totalOs'], 2, ',', '.') . '</td>';
                                        $totalGeral += $f['totalVendas'] + $f['totalOs'];
										echo '</tr>';
                                    }
                                ?>
                                <tr>
                                    <td colspan="2"></td>
                                    <td align="right"><b>TOTAL: </b></td>
                                    <td align="center"><b>R$: 
									<?php echo 
									number_format($totalGeral, 2, ',', '.'); ?></b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <h5 style="text-align: right; font-size: 0.8em; padding: 5px;">
                    Data do Relatório: <?php echo date('d/m/Y'); ?>
                </h5>
            </div>
        </div>
    </div>
</body>

</html>
