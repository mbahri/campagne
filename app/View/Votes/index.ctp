<div class="row">
  <h1>Page des résultats des votes</h1>

<script type="text/javascript">
$(function () {
        $('#container').highcharts({
          chart: {
                renderTo: 'tendance',
                type: 'spline'
            },
            title: {
                text: 'Votes'
            },
            subtitle: {
                text: 'Suivi des votes'
            },
            xAxis: {
                type: 'datetime'
            },
            yAxis: {
                title: {
                    text: 'Nombre de votes'
                },
                min: 0,
             },
            tooltip: {
                formatter: function() {
                        return ''+
                        Highcharts.dateFormat('%e. %b %Y, %H H', this.x) +': '+ this.y +' votants';
                }
            },
            plotOptions: {
                spline: {
                    lineWidth: 4,
                    states: {
                        hover: {
                            lineWidth: 5
                        }
                    },
                    marker: {
                        enabled: false,
                        states: {
                            hover: {
                                enabled: true,
                                symbol: 'circle',
                                radius: 5,
                                lineWidth: 1
                            }
                        }
                    },

                }
            },
            series: [{
                name: 'Listerique',
              <?php echo 'data: [';
                foreach ($liste1 as $vote) {
                  echo '[';
                  echo (date('U',strtotime($vote['votes']['date']))+3600)*1000;
                  echo ',';
                  echo $vote[0]['c'];
                  echo '],';
                }
                echo ']';
                ?>

            }, {
                name: 'Regliste',
                <?php echo 'data: [';
                  foreach ($liste2 as $vote) {
                    echo '[';
                    echo (date('U',strtotime($vote['votes']['date']))+3600)*1000;
                    echo ',';
                    echo $vote[0]['c'];
                    echo '],';
                  }
                  echo ']';
                  ?>
            }, {
                name: 'PBLL',
                <?php echo 'data: [';
                  foreach ($liste3 as $vote) {
                    echo '[';
                    echo (date('U',strtotime($vote['votes']['date']))+3600)*1000;
                    echo ',';
                    echo $vote[0]['c'];
                    echo '],';
                  }
                  echo ']';
                  ?>
            }],
            navigation: {
                menuItemStyle: {
                    fontSize: '10px'
                }
            }
        });
    });
</script>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>


</div>
<div class="row">
<p>Nombre de vote pour Listérique : <?php echo $liste_1; ?></p>
<p>Nombre de vote pour Régliste : <?php echo $liste_2;?></p>
<p>Nombre de vote pour Plus Belle la Liste : <?php echo $liste_3;?></p>
</div>




<div class="row">
  <h2>Vote pour ta liste préféré</h2>
  <div class="col-md-6 col-md-offset-3">
    <a href="<?php echo $this->Html->url(array('controller' => 'Votes','action' => 'voter',1)); ?>" role="button" class="btn btn-primary btn-block">Listérique</a>
    <a href="<?php echo $this->Html->url(array('controller' => 'Votes','action' => 'voter',2)); ?>" role="button" class="btn btn-primary btn-block">Régliste</a>
    <a href="<?php echo $this->Html->url(array('controller' => 'Votes','action' => 'voter',3)); ?>" role="button" class="btn btn-primary btn-block">Plus Belle la Liste</a>
  </div>
</div>