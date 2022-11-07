<?php 
$dates = date('Y-m-d');
$yy=substr($dates,0,4);
 $sql_pie = "SELECT product_name, count(product_id) FROM order_details,products,orders 
 WHERE order_details.order_id=orders.id and order_details.id and products.id=order_details.product_id group by product_id";
 $res_c = $conn->query($sql_pie);
 
 $sql_bar = "SELECT category_name , COUNT(repair.category_id) as cid FROM repair,category_repair WHERE repair_id and repair.category_id=category_repair.category_id GROUP by repair.category_id;";
 $res_bar = $conn->query($sql_bar);

 if (!$res_bar) {
    die('<p><strong style="color:#FF0000">!! Invalid query:</strong> ' . $mysqli->error.'</p>');
 }

 $sql_bar2 = "SELECT DATE_FORMAT(repair_date, '%M'),COUNT(repair_id) FROM repair WHERE substr(repair_date,1,4)='$yy' GROUP BY DATE_FORMAT(repair_date, '%m%') ASC";
 $res_bar2 = $conn->query($sql_bar2);

 if (!$res_bar2) {
    die('<p><strong style="color:#FF0000">!! Invalid query:</strong> ' . $mysqli->error.'</p>');
 }

    $tyear = date('Y');
	$ttotal=array();
	for ($tmonth = 1; $tmonth <= 12; $tmonth ++){
		$sql="select *, COUNT(repair_id) as ttotal from repair where month(repair_date)='$tmonth' and year(repair_date)='$tyear'";
		$tquery=$conn->query($sql);
		$trow=$tquery->fetch_array();

		$ttotal[]=$trow['ttotal'];
	}

	$ttjan = $ttotal[0];
	$ttfeb = $ttotal[1];
	$ttmar = $ttotal[2];
	$ttapr = $ttotal[3];
	$ttmay = $ttotal[4];
	$ttjun = $ttotal[5];
	$ttjul = $ttotal[6];
	$ttaug = $ttotal[7];
	$ttsep = $ttotal[8];
	$ttoct = $ttotal[9];
	$ttnov = $ttotal[10];
	$ttdec = $ttotal[11];

    $year = date('Y')-1;
	$total=array();
	for ($month = 1; $month <= 12; $month ++){
		$sql="select *, COUNT(repair_id) as total from repair where month(repair_date)='$month' and year(repair_date)='$year'";
		$query=$conn->query($sql);
		$row=$query->fetch_array();

		$total[]=$row['total'];
	}

	$tjan = $total[0];
	$tfeb = $total[1];
	$tmar = $total[2];
	$tapr = $total[3];
	$tmay = $total[4];
	$tjun = $total[5];
	$tjul = $total[6];
	$taug = $total[7];
	$tsep = $total[8];
	$toct = $total[9];
	$tnov = $total[10];
	$tdec = $total[11];

	$pyear = date('Y')-2;
	$pnum=array();

	for ($pmonth = 1; $pmonth <= 12; $pmonth ++){
		$sqlp="select *, COUNT(repair_id) as ptotal from repair where month(repair_date)='$pmonth' and year(repair_date)='$pyear'";
		$pquery=$conn->query($sqlp);
		$prow=$pquery->fetch_array();

		$ptotal[]=$prow['ptotal'];
	}
	
	$pjan = $ptotal[0];
	$pfeb = $ptotal[1];
	$pmar = $ptotal[2];
	$papr = $ptotal[3];
	$pmay = $ptotal[4];
	$pjun = $ptotal[5];
	$pjul = $ptotal[6];
	$paug = $ptotal[7];
	$psep = $ptotal[8];
	$poct = $ptotal[9];
	$pnov = $ptotal[10];
	$pdec = $ptotal[11];

?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0-rc"></script>
<script>
const ctx = document.getElementById('myChart').getContext('2d');
const plugin = {
  id: 'custom_canvas_background_color',
  beforeDraw: (chart) => {
    const ctx = chart.canvas.getContext('2d');
    ctx.save();
    ctx.globalCompositeOperation = 'destination-over';
    ctx.fillStyle = 'white';
    ctx.fillRect(0, 0, chart.width, chart.height);
    ctx.restore();
  }
};
const myChart = new Chart(ctx, {
    type: 'bar',
    plugins: [plugin],
    plugins: [ChartDataLabels],
    data: {
        labels  : ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
        datasets: [
        {
          label               : '2022',
          backgroundColor: [
            'rgb(271, 15, 64)'
          ],
          borderColor: [
            'rgb(271, 15, 64)',
          ],
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          
          data                : [ "<?php echo $ttjan; ?>",
                                  "<?php echo $ttfeb; ?>",
                                  "<?php echo $ttmar; ?>",
                                  "<?php echo $ttapr; ?>",
                                  "<?php echo $ttmay; ?>",
                                  "<?php echo $ttjun; ?>",
                                  "<?php echo $ttjul; ?>",
                                  "<?php echo $ttaug; ?>",
                                  "<?php echo $ttsep; ?>",
                                  "<?php echo $ttoct; ?>",
                                  "<?php echo $ttnov; ?>",
                                  "<?php echo $ttdec; ?>" 
                                ]
        },
        {
          label               : '2021',
          backgroundColor: [
            'rgb(255, 159, 64)'
          ],
          borderColor: [
            'rgb(255, 159, 64)',
          ],
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          
          data                : [ "<?php echo $tjan; ?>",
                                  "<?php echo $tfeb; ?>",
                                  "<?php echo $tmar; ?>",
                                  "<?php echo $tapr; ?>",
                                  "<?php echo $tmay; ?>",
                                  "<?php echo $tjun; ?>",
                                  "<?php echo $tjul; ?>",
                                  "<?php echo $taug; ?>",
                                  "<?php echo $tsep; ?>",
                                  "<?php echo $toct; ?>",
                                  "<?php echo $tnov; ?>",
                                  "<?php echo $tdec; ?>" 
                                ]
        },
        {
          label               : '2020',
          backgroundColor: [
            'rgb(75, 192, 192)'
          ],
          borderColor: [
            'rgb(75, 192, 192)'
          ],
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [ "<?php echo $pjan; ?>",
                                  "<?php echo $pfeb; ?>",
                                  "<?php echo $pmar; ?>",
                                  "<?php echo $papr; ?>",
                                  "<?php echo $pmay; ?>",
                                  "<?php echo $pjun; ?>",
                                  "<?php echo $pjul; ?>",
                                  "<?php echo $paug; ?>",
                                  "<?php echo $psep; ?>",
                                  "<?php echo $poct; ?>",
                                  "<?php echo $pnov; ?>",
                                  "<?php echo $pdec; ?>" 
                                ]
        }
      ]
    },
    options: {
      plugins: {
            datalabels: {
                display: true,
                align: 'end',
                anchor: 'end',
                labels: {
                value: {
                  color: 'black'
                }
              },
                formatter: function(value, index, values) {
                            if(value >0 ){
                                value = value.toString();
                                value = value.split(/(?=(?:...)*$)/);
                                value = value.join(',');
                                return value;
                            }else{
                                value = "";
                                return value;
                            }
                        }
                    }
             },
            title: {
                display: true,
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        callback: function (value) { if (value % 1 === 0) { return value; } }
                    }
                }]
            }
        }
})

;
</script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
$(function () {
    $('#barchart').highcharts({
        chart: {
            height: 250,
            backgroundColor: 'transparent',
            type: 'column'
        },
        colors: ['#FF6666'],
        title: {
            text: '<span class="label2"></span>' //ใส่ชื่อกราฟ
        },
/*        subtitle: {
            text: ''
        },*/
        xAxis: {
            
            categories: [
            <?php
                $c_field_bar = $res_bar->field_count-1;
                $c_bar=0; while($row_bar = $res_bar->fetch_array(MYSQLI_NUM)){ $c_bar++; ?>
            <?php if($c_bar>1){ ?>,<?php } 
                $data_bar[] = $row_bar[$c_field_bar]; 
            ?>
              '<?php echo htmlspecialchars(addslashes(str_replace("\t","",str_replace("\n","",str_replace("\r","",$row_bar[0]))))); ?>'
              <?php } ?>
            ],
            labels: {
            style: {
                color: 'black'
            }
        },
            crosshair: true
            
        },
        yAxis: {
            labels: {
        style: {
            color: 'black'
               }
            },
            min: 0,
            title: {
                text: 'จำนวน',
                style: {
            color: 'black'
               }
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat:  '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                          '<td style="padding:0"><b>{point.y:,.0f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0,
    dataLabels: {
     enabled: true,
     color: 'black'
    }
   }
        },
  credits: {
   enabled: false
  },
        series: [{
            name: '',
            data: [<?php echo join(',',$data_bar); ?>]
 
        }]
    });
});
</script>

<script type="text/javascript">
$(function () {
    $('#bar3chart').highcharts({
        chart: {
            height: 250,
            backgroundColor: 'transparent',
            type: 'column'
        },
        colors: ['#996699'],
        title: {
            text: '<span class="label2"></span>' //ใส่ชื่อกราฟ
        },
/*        subtitle: {
            text: ''
        },*/
        xAxis: {
            
            categories: [
            <?php
                $c_field_bar2 = $res_bar2->field_count-1;
                $c_bar2=0; while($row_bar2 = $res_bar2->fetch_array(MYSQLI_NUM)){ $c_bar2++; ?>
            <?php if($c_bar2>1){ ?>,<?php } 
                $data_bar2[] = $row_bar2[$c_field_bar2]; 
            ?>
              '<?php echo htmlspecialchars(addslashes(str_replace("\t","",str_replace("\n","",str_replace("\r","",$row_bar2[0]))))); ?>'
            <?php } ?>
            ],
            labels: {
            style: {
                color: 'black'
            }
        },
            crosshair: true
            
        },
        yAxis: {
            labels: {
        style: {
            color: 'black'
               }
            },
            min: 0,
            title: {
                text: 'จำนวน',
                style: {
            color: 'black'
               }
            }
        },
        
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0,
        dataLabels: {
        enabled: true,
        color: 'black'
        }
    }
            },
    credits: {
    enabled: false
    },
            series: [{
                name: '',
                data: [<?php echo join(',',$data_bar2); ?>]
    
            }]
        });
    });
    </script>