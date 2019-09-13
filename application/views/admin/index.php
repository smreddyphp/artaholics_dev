    <!-- Sidebar chat end-->
    <div class="content-wrapper">
        <!-- Container-fluid starts -->
        <!-- Main content starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="main-header">
                    <h4>Dashboard</h4>
                </div>
            </div>
            <!-- 4-blocks row start -->
            <div class="row m-b-30 dashboard-header">                
                <div class="col-lg-3 col-sm-6">
                    <div class="bg-facebook dashboard-facebook">
                        <div class="sales-facebook">
                            <img src="<?php echo base_url(); ?>assets/images/user.png">
                            <div class="f-right">
                            <h2 class="counter">
                                <?php 
                                $user_count = $this->db->get_where('users',array('auth_level'=>3))->num_rows();
                                echo $user_count;
                                ?></h2>
                            </div>
                        </div>
                        <div class="bg-dark-facebook">
                            <p class="week-sales">Users</p>
                          </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-sm-6">
                    <div class="bg-success dashboard-success">
                        <div class="sales-success">                        
                            <img src="<?php echo base_url(); ?>assets/images/Categories.png">
                            <div class="f-right">
                                <h2 class="counter">
                                    <?php 
                                $user_count = $this->db->get_where('users',array('auth_level'=>6))->num_rows();
                                echo $user_count;
                                ?></h2>
                            </div>
                        </div>
                       <div class="bg-dark-success">
                            <p class="week-sales">Artists</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-sm-6">
                    <div class="bg-warning dasboard-warning">
                        <div class="sales-warning">
                            <img src="<?php echo base_url(); ?>assets/images/Women.png">
                            <div class="f-right">
                            <h2 class="counter">
                                <?php 
                                $user_count = $this->db->get('orders')->num_rows();
                                echo $user_count;
                                ?></h2>
                            </div>
                        </div>
                        <div class="bg-dark-warning">
                            <p class="week-sales">Orders</p>
                          </div>
                    </div>
                </div>

                
                <div class="col-lg-3 col-sm-6">
                    <div class="dashboard-primary bg-primary">
                        <div class="sales-primary">                        
                            <img src="<?php echo base_url(); ?>assets/images/Kids.png">
                            <div class="f-right">
                                <h2 class="counter">
                                   <?php 
                                $user_count = $this->db->get('products')->num_rows();
                                echo $user_count;
                                ?></h2>
                            </div>
                        </div>
                       <div class="bg-dark-primary">
                            <p class="week-sales">Products</p>
                        </div>
                    </div>
                </div>
                         
            </div>
            <!-- <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div>
            </div>   <br>
            <div class="clearfix"></div>
              <div class="row">
                <div class="col-xl-6 col-lg-6">
                  <div id="container2" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                </div>
                <div class="col-xl-6 col-lg-6">
                  <div id="container3" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                </div>
            </div>   <br> -->  
        </div>
        <!-- Main content ends -->
        <!-- Container-fluid ends -->
    </div>
</div>
<script>
    Highcharts.chart('container', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Monthwise Registrations'
    },
    subtitle: {
        text: 'FULL DETAILS OF ALL USERS'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: ''
        },
        labels: {
            formatter: function () {
                return this.value;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'Users',
        marker: {
            symbol: 'square'
        },
        data: [<?php echo @$graph_users; ?>]
    }, {
        name: 'Products',

        marker: {
            symbol: 'triangle-down'
        },
        data: [<?php echo @$graph_vendor; ?>]   
    }]
});
</script>
<script>
Highcharts.chart('container2', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Requests accept and reject ratio'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Requests',
        colorByPoint: true,
        data: [{
            name: 'Total',
            y: <?php echo @$total_requests;?>,
            sliced: true,
            selected: true
        }, {
            name: 'Accepted',
            y: <?php echo @$accepted_requests;?>
        }, {
            name: 'Rejected',
            y: <?php echo @$rejected_request;?>
        }]
    }]
});
</script>
<script>
    Highcharts.chart('container3', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Total Orders by type'
    },
 
    xAxis: {
        type: 'Requests'
    },
    yAxis: {
        title: {
            text: 'Total Packages'
        }
    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    "series": [
        {
            "name": "Orders By Request Type",
            "colorByPoint": true,
            "data": [
                {
                    "name": "Single",
                    "y":  <?php echo $single; ?>
                },
                {
                    "name": "Package",
                    "y": <?php  echo $package; ?>
                }
            ]
        }
    ]
});
</script>
