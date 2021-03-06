<div class="row text-center">
  <h2>Vote pour ta liste préféré</h2>
  <?php $i = rand(0,2); ?>
  <div class="col-md-4"><?php echo $this->Html->image(($i%3).'.png', array('class' => 'img-circle','width'=>'100px','url' => array('controller' => 'Votes', 'action' => 'voter', (($i)%3 + 1)))); ?></div>
  <div class="col-md-4"><?php echo $this->Html->image((($i+1)%3).'.png', array('class' => 'img-circle','width'=>'100px','url' => array('controller' => 'Votes', 'action' => 'voter', (($i+1)%3) + 1))); ?></div>
  <div class="col-md-4"><?php echo $this->Html->image((($i+2)%3).'.png', array('class' => 'img-circle','width'=>'100px','url' => array('controller' => 'Votes', 'action' => 'voter', (($i+2)%3) + 1))); ?></div>
</div>

<div class="row" id="resultat">
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
                name: 'Sex Plistols',
                color: '#ffff30',
              <?php echo 'data: [';
                echo '[1394920800000,0],';
                $somme = 0;
                foreach ($liste1 as $vote) {
                  echo '[';
                  echo (date('U',strtotime($vote['votes']['date']))+3600)*1000;
                  echo ',';
                  $somme += $vote[0]['c'];
                  echo $somme;
                  echo '],';
                }
                echo ']';
                ?>

            }, {
                name: 'La Mentaliste',
                color: '#A123B9',
                <?php echo 'data: [';
                echo '[1394920800000,0],';
                $somme = 0;
                  foreach ($liste2 as $vote) {

                    echo '[';
                    echo (date('U',strtotime($vote['votes']['date']))+3600)*1000;
                    echo ',';
                    $somme += $vote[0]['c'];
                    echo $somme;
                    echo '],';
                  }
                  echo ']';
                  ?>
            }, {
                name: 'La Dolce Lista',
                color: '#f49ac1',
                <?php echo 'data: [';
                 echo '[1394920800000,0],';
                 $somme = 0;
                  foreach ($liste3 as $vote) {

                    echo '[';
                    echo (date('U',strtotime($vote['votes']['date']))+3600)*1000;
                    echo ',';
                    $somme += $vote[0]['c'];
                    echo $somme;
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

<script type="text/javascript">
$(function () {
        $('#votes').highcharts({
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
                name: 'Sex Plistols',
                color: '#ffff30',
              <?php echo 'data: [';
                echo '[1394920800000,0],';
                $somme = 0;
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
                name: 'La Mentaliste',
                color: '#A123B9',
                <?php echo 'data: [';
                echo '[1394920800000,0],';
                $somme = 0;
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
                name: 'La Dolce Lista',
                color: '#f49ac1',
                <?php echo 'data: [';
                 echo '[1394920800000,0],';
                 $somme = 0;
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
<div id="votes" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

</div>
