@extends('sistema.principal')
@section('contenido')
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-md-3">
            <div class="card p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="fa fa-usd f-s-40 color-primary"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2>{{$english_format_number=number_format($historicos->ganancias)}}</h2>
                        <p class="m-b-0">Ingresos Total</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2>{{$ventas->ventas}}</h2>
                        <p class="m-b-0">Ventas</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="fa fa-archive f-s-40 color-warning"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2>{{$productos->nProductos}}</h2>
                        <p class="m-b-0">Productos</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="fa fa-usd f-s-40 color-danger"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2>{{$english_format_number=number_format($productos->inversion)}}</h2>
                        <p class="m-b-0">Inventario Total($)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row bg-white m-l-0 m-r-0 box-shadow ">
        <!-- column -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <!-- <h4 class="card-title">Extra Area Chart</h4>
                    <div id="extra-area-chart"></div> -->
                    <h4 class="card-title">Productos mas Vendidos</h4>
                    <div id="main" style="width:100%; height:300px"></div>
                    @php
                        $i = 0;
                        foreach($graficas as $gra){
                            $count[$i] = $gra->cantidad;
                            $label[$i] = $gra->producto;

                            $i++;
                        }

                        $total = $count[0] + $count[1] + $count[2] + $count[3] + $count[4];
                        $p1 = $count[0] * 100 / $total;
                        $p2 = $count[1] * 100 / $total;
                        $p3 = $count[2] * 100 / $total;
                        $p4 = $count[3] * 100 / $total;
                        $p5 = $count[4] * 100 / $total;
                    @endphp
                </div>
            </div>
        </div>
        <!-- column -->

        <!-- column -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body browser">
                    <p class="f-w-600">{{$label[0]}} <span class="pull-right">{{sprintf('%.2f', $p1)}}%</span></p>
                    <div class="progress ">
                        <div role="progressbar" style="width: {{sprintf('%.2f', $p1)}}%; height:8px;" class="progress-bar bg-danger wow animated progress-animated"> <span class="sr-only">{{sprintf('%.2f', $p1)}}% Complete</span> </div>
                    </div>

                    <p class="m-t-30 f-w-600">{{$label[1]}}<span class="pull-right">{{sprintf('%.2f', $p2)}}%</span></p>
                    <div class="progress">
                        <div role="progressbar" style="width: {{sprintf('%.2f', $p2)}}%; height:8px;" class="progress-bar bg-info wow animated progress-animated"> <span class="sr-only">{{sprintf('%.2f', $p2)}}% Complete</span> </div>
                    </div>

                    <p class="m-t-30 f-w-600">{{$label[2]}}<span class="pull-right">{{sprintf('%.2f', $p3)}}%</span></p>
                    <div class="progress">
                        <div role="progressbar" style="width: {{sprintf('%.2f', $p3)}}%; height:8px;" class="progress-bar bg-success wow animated progress-animated"> <span class="sr-only">{{sprintf('%.2f', $p3)}}% Complete</span> </div>
                    </div>

                    <p class="m-t-30 f-w-600">{{$label[3]}}<span class="pull-right">{{sprintf('%.2f', $p4)}}%</span></p>
                    <div class="progress">
                        <div role="progressbar" style="width: {{sprintf('%.2f', $p4)}}%; height:8px;" class="progress-bar bg-warning wow animated progress-animated"> <span class="sr-only">{{sprintf('%.2f', $p4)}}% Complete</span> </div>
                    </div>

					<p class="m-t-30 f-w-600">{{$label[4]}}<span class="pull-right">{{sprintf('%.2f', $p5)}}%</span></p>
                    <div class="progress m-b-30">
                        <div role="progressbar" style="width: {{sprintf('%.2f', $p5)}}%; height:8px;" class="progress-bar bg-primary wow animated progress-animated"> <span class="sr-only">{{sprintf('%.2f', $p5)}}% Complete</span> </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
    </div>
    <div class="row">
		<div class="col-lg-3">
            <div class="card bg-dark">
                <div class="testimonial-widget-one p-17">
                    <div class="testimonial-widget-one owl-carousel owl-theme">
                        <div class="item">
                            <div class="testimonial-content">
                                <img class="testimonial-author-img" src="images/avatar/2.jpg" alt="" />
                                <div class="testimonial-author">John</div>
                                <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>

                                <div class="testimonial-text">
                                    <i class="fa fa-quote-left"></i>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .
                                    <i class="fa fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content">
                                <img class="testimonial-author-img" src="images/avatar/3.jpg" alt="" />
                                <div class="testimonial-author">Abraham</div>
                                <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>

                                <div class="testimonial-text">
                                    <i class="fa fa-quote-left"></i>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .
                                    <i class="fa fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content">
                                <img class="testimonial-author-img" src="images/avatar/1.jpg" alt="" />
                                <div class="testimonial-author">Lincoln</div>
                                <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>

                                <div class="testimonial-text">
                                    <i class="fa fa-quote-left"></i>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .
                                    <i class="fa fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content">
                                <img class="testimonial-author-img" src="images/avatar/4.jpg" alt="" />
                                <div class="testimonial-author">TYRION LANNISTER</div>
                                <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>

                                <div class="testimonial-text">
                                    <i class="fa fa-quote-left"></i>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .
                                    <i class="fa fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content">
                                <img class="testimonial-author-img" src="images/avatar/5.jpg" alt="" />
                                <div class="testimonial-author">TYRION LANNISTER</div>
                                <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>

                                <div class="testimonial-text">
                                    <i class="fa fa-quote-left"></i>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .
                                    <i class="fa fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content">
                                <img class="testimonial-author-img" src="images/avatar/6.jpg" alt="" />
                                <div class="testimonial-author">TYRION LANNISTER</div>
                                <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>

                                <div class="testimonial-text">
                                    <i class="fa fa-quote-left"></i>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .
                                    <i class="fa fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card">
                <div class="card-title">
                    <h4>Recent Orders </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Product</th>
                                    <th>quantity</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>
                                        <div class="round-img">
                                            <a href=""><img src="images/avatar/4.jpg" alt=""></a>
                                        </div>
                                    </td>
                                    <td>John Abraham</td>
                                    <td><span>iBook</span></td>
                                    <td><span>456 pcs</span></td>
                                    <td><span class="badge badge-success">Done</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="round-img">
                                            <a href=""><img src="images/avatar/2.jpg" alt=""></a>
                                        </div>
                                    </td>
                                    <td>John Abraham</td>
                                    <td><span>iPhone</span></td>
                                    <td><span>456 pcs</span></td>
                                    <td><span class="badge badge-success">Done</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="round-img">
                                            <a href=""><img src="images/avatar/3.jpg" alt=""></a>
                                        </div>
                                    </td>
                                    <td>John Abraham</td>
                                    <td><span>iMac</span></td>
                                    <td><span>456 pcs</span></td>
                                    <td><span class="badge badge-warning">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="round-img">
                                            <a href=""><img src="images/avatar/4.jpg" alt=""></a>
                                        </div>
                                    </td>
                                    <td>John Abraham</td>
                                    <td><span>iBook</span></td>
                                    <td><span>456 pcs</span></td>
                                    <td><span class="badge badge-success">Done</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
		<div class="col-lg-8">
			<div class="row">
			<div class="col-lg-6">
				<div class="card">
					<div class="card-title">
						<h4>Message </h4>
					</div>
					<div class="recent-comment">
						<div class="media">
							<div class="media-left">
								<a href="#"><img alt="..." src="images/avatar/1.jpg" class="media-object"></a>
							</div>
							<div class="media-body">
								<h4 class="media-heading">john doe</h4>
								<p>Cras sit amet nibh libero, in gravida nulla. </p>
								<p class="comment-date">October 21, 2018</p>
							</div>
						</div>
						<div class="media">
							<div class="media-left">
								<a href="#"><img alt="..." src="images/avatar/1.jpg" class="media-object"></a>
							</div>
							<div class="media-body">
								<h4 class="media-heading">john doe</h4>
								<p>Cras sit amet nibh libero, in gravida nulla. </p>
								<p class="comment-date">October 21, 2018</p>
							</div>
						</div>

						<div class="media">
							<div class="media-left">
								<a href="#"><img alt="..." src="images/avatar/1.jpg" class="media-object"></a>
							</div>
							<div class="media-body">
								<h4 class="media-heading">john doe</h4>
								<p>Cras sit amet nibh libero, in gravida nulla. </p>
								<p class="comment-date">October 21, 2018</p>
							</div>
						</div>

						<div class="media no-border">
							<div class="media-left">
								<a href="#"><img alt="..." src="images/avatar/1.jpg" class="media-object"></a>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Mr. Michael</h4>
								<p>Cras sit amet nibh libero, in gravida nulla. </p>
								<div class="comment-date">October 21, 2018</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /# card -->
			</div>
			<!-- /# column -->
			<div class="col-lg-6">
				<div class="card">
					<div class="card-body">
						<div class="year-calendar"></div>
					</div>
				</div>
			</div>
			</div>
		</div>

		<div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Todo</h4>
                    <div class="card-content">
                        <div class="todo-list">
                            <div class="tdl-holder">
                                <div class="tdl-content">
                                    <ul>
                                        <li>
                                            <label>
												<input type="checkbox"><i class="bg-primary"></i><span>Build an angular app</span>
												<a href='#' class="ti-close"></a>
											</label>
                                        </li>
                                        <li>
                                            <label>
												<input type="checkbox" checked><i class="bg-success"></i><span>Creating component page</span>
												<a href='#' class="ti-close"></a>
											</label>
                                        </li>
                                        <li>
                                            <label>
												<input type="checkbox" checked><i class="bg-warning"></i><span>Follow back those who follow you</span>
												<a href='#' class="ti-close"></a>
											</label>
                                        </li>
                                        <li>
                                            <label>
												<input type="checkbox" checked><i class="bg-danger"></i><span>Design One page theme</span>
												<a href='#' class="ti-close"></a>
											</label>
                                        </li>

                                        <li>
                                            <label>
												<input type="checkbox" checked><i class="bg-success"></i><span>Creating component page</span>
												<a href='#' class="ti-close"></a>
											</label>
                                        </li>
                                    </ul>
                                </div>
                                <input type="text" class="tdl-new form-control" placeholder="Type here">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Echart -->
    <script src="{{asset('js/lib/echart/echarts.js')}}"></script>
    <!-- <script src="{{asset('js/lib/echart/echarts-init.js')}}"></script>s -->
    <!-- <script src="{{asset('js/lib/echart/dashboard1-init.js')}}"></script> -->
    <script type="text/javascript">
        var chartDom = document.getElementById('main');
        // var myChart = echarts.init(chartDom, 'dark');
        var myChart = echarts.init(chartDom);
        var option;
        option = {
            tooltip: {
                trigger: 'axis',
                axisPointer: {
                    type: 'shadow'
                }
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            xAxis: [
                {
                    type: 'category',
                    data: ['{{$label[0]}}', '{{$label[1]}}', '{{$label[2]}}', '{{$label[3]}}', '{{$label[4]}}'],
                    axisTick: {
                        alignWithLabel: true
                    }
                }
            ],
            yAxis: [
                {
                    type: 'value'
                }
            ],
            series: [
                {
                    name: 'Cantidad',
                    type: 'bar',
                    barWidth: '60%',
                    data: [
                        {
                            value:{{$count[0]}},
                            itemStyle:{
                                color:'#FC6180'
                            } 
                        },
                        {
                            value:{{$count[1]}},
                            itemStyle:{
                                color:'#62D1F3'
                            }
                        },
                        {
                            value:{{$count[2]}},
                            itemStyle:{
                                color:'#26DAD2'
                            }
                        },
                        {
                            value:{{$count[3]}},
                            itemStyle:{
                                color:'#FFB64D'
                            }
                        },
                        {
                            value:{{$count[4]}},
                            itemStyle:{
                                color:'#4680FF'
                            }
                        }
                    ],
                    //color: ['#fc6180','#62D1F3','#26DAD2','#FFB64D','#26DAD2']
                }
            ]
        };

        /** DOUGHNUT BORDER RADIOS OPTION **/
        /*option = {
            tooltip: {
                trigger: 'item',
                formatter: '{a} <br/>{b} : {c} ({d}%)'
            },
            legend: {
                top: '5%',
                left: 'center'
            },
            series: [
                {
                    name: 'Campeonatos',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    center: ['50%', '50%'],
                    avoidLabelOverlap: false,
                    //height: 550,
                    top: '1%',
                    itemStyle: {
                        borderRadius: 0,
                        //borderColor: '#fff',
                        borderWidth: 2
                    },
                    label: {
                        show: false,
                        position: 'center'
                    },
                    emphasis: {
                        label: {
                        show: true,
                        fontSize: '25',
                        fontWeight: 'bold'
                        }
                    },
                    labelLine: {
                        show: false
                    },
                    data: [
                        { value: 13, name: 'America'},
                        { value: 12, name: 'Guadalajara' },
                        { value: 10, name: 'Toluca' },
                        { value: 9, name: 'Cruz Azul' },
                        { value: 8, name: 'Leon' },
                        { value: 7, name: 'UNAM' },
                        { value: 7, name: 'Tigres' }
                    ],
                    color: [
                    "rgba(240, 235, 154, 0.8)",
                    "rgba(255, 0, 0, 0.8)",
                    "rgba(213, 55, 65, 0.8)",
                    "rgba(0, 27, 91, 0.8)",
                    "rgba(23, 139, 59, 0.8)",
                    "rgba(203, 171, 87, 0.8)",
                    "rgba(251, 176, 52, 0.8)"
                    ]
                },
                {
                    name: 'Campeonatos',
                    type: 'pie',
                    radius: '50%',
                    center: ['50%', '50%'],
                    // height: 550,
                    top: '1%',
                    data: [
                        { value: 13, name: 'America'},
                        { value: 12, name: 'Guadalajara' },
                        { value: 10, name: 'Toluca' },
                        { value: 9, name: 'Cruz Azul' },
                        { value: 8, name: 'Leon' },
                        { value: 7, name: 'UNAM' },
                        { value: 7, name: 'Tigres' }
                    ],
                    color: [
                    "rgba(240, 235, 154, 0.8)",
                    "rgba(255, 0, 0, 0.8)",
                    "rgba(213, 55, 65, 0.8)",
                    "rgba(0, 27, 91, 0.8)",
                    "rgba(23, 139, 59, 0.8)",
                    "rgba(203, 171, 87, 0.8)",
                    "rgba(251, 176, 52, 0.8)"
                    ]
                },
                {
                    name: 'Campeonatos',
                    type: 'pie',
                    radius: [8, 250],
                    center: ['50%', '50%'],
                    roseType: 'area',
                    // height: 150,
                    top: '1%',
                    itemStyle: {
                        borderRadius: 8
                    },
                    data: [
                        { value: 13, name: 'America'},
                        { value: 12, name: 'Guadalajara' },
                        { value: 10, name: 'Toluca' },
                        { value: 9, name: 'Cruz Azul' },
                        { value: 8, name: 'Leon' },
                        { value: 7, name: 'UNAM' },
                        { value: 7, name: 'Tigres' }
                    ],
                    color: [
                    "rgba(240, 235, 154, 0.8)",
                    "rgba(255, 0, 0, 0.8)",
                    "rgba(213, 55, 65, 0.8)",
                    "rgba(0, 27, 91, 0.8)",
                    "rgba(23, 139, 59, 0.8)",
                    "rgba(203, 171, 87, 0.8)",
                    "rgba(251, 176, 52, 0.8)"
                    ]
                }
            ]
        };*/

        option && myChart.setOption(option);

    </script>
@stop