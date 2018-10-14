
@extends('/common.common')
	@section('body')

	<!-- start banner_y -->
		<div class="banner_y center">
			<div class="nav">				
				<ul>
					@foreach($cate as $k => $v)
						<li>
							<a href="">{{$v['cat_name']}}</a>
							<div class="pop">

								<div class="left fl">
									@foreach($model as $key => $val)
									@if($key < 6)
										<div>
											<div class="xuangou_left fl">
												<a href="">
													<div class="img fl"><img src="/miui/image/{{$val['goods_img']}}" with="50" height="50"></div>
													<span class="fl" style="width:100px;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;">{{$val['goods_name']}}</span>
													<div class="clear"></div>
												</a>
											</div>
											<div class="xuangou_right fr"><a href="/goods/xiangqing" target="_blank">选购</a></div>
											<div class="clear"></div>
										</div>
									@endif
									@endforeach
								</div>

								<div class="ctn fl">
									@foreach($model as $key => $val)
									@if($key >= 6 && $key < 12)
										<div>
											<div class="xuangou_left fl">
												<a href="">
													<div class="img fl"><img src="/miui/image/{{$val['goods_img']}}" with="50" height="50"></div>
													<span class="fl" style="width:100px;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;">{{$val['goods_name']}}</span>
													<div class="clear"></div>
												</a>
											</div>
											<div class="xuangou_right fr"><a href="">选购</a></div>
											<div class="clear"></div>
										</div>
									@endif
									@endforeach
								</div>

								<div class="right fl">
									@foreach($model as $key => $val)
									@if($key >=12)
										<div>
											<div class="xuangou_left fl">
												<a href="">
													<div class="img fl"><img src="/miui/image/{{$val['goods_img']}}" with="50" height="50"></div>
													<span class="fl" style="width:100px;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;">{{$val['goods_name']}}</span>
													<div class="clear"></div>
												</a>
											</div>
											<div class="xuangou_right fr"><a href="">选购</a></div>
											<div class="clear"></div>
										</div>
									@endif
									@endforeach
								</div>
								
							</div>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
		<script type="text/javascript" src="/public/js/jquery.min.js"></script>

		<div class="sub_banner center">
			<div class="sidebar fl">
				<div class="fl"><a href=""><img src="/miui/image/hjh_01.gif"></a></div>
				<div class="fl"><a href=""><img src="/miui/image/hjh_02.gif"></a></div>
				<div class="fl"><a href=""><img src="/miui/image/hjh_03.gif"></a></div>
				<div class="fl"><a href=""><img src="/miui/image/hjh_04.gif"></a></div>
				<div class="fl"><a href=""><img src="/miui/image/hjh_05.gif"></a></div>
				<div class="fl"><a href=""><img src="/miui/image/hjh_06.gif"></a></div>
				<div class="clear"></div>
			</div>
			<div class="datu fl"><a href=""><img src="/miui/image/hongmi4x.png" alt=""></a></div>
			<div class="datu fl"><a href=""><img src="/miui/image/xiaomi5.jpg" alt=""></a></div>
			<div class="datu fr"><a href=""><img src="/miui/image/pinghengche.jpg" alt=""></a></div>
			<div class="clear"></div>


		</div>
	<!-- end banner -->
	<div class="tlinks">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>

	<!-- start danpin -->
		<div class="danpin center">
			
			<div class="biaoti center">小米明星单品</div>
			<div class="main center">
				<div class="mingxing fl">
					<div class="sub_mingxing"><a href=""><img src="/miui/image/pinpai1.png" alt=""></a></div>
					<div class="pinpai"><a href="">小米MIX</a></div>
					<div class="youhui">5月9日-21日享花呗12期分期免息</div>
					<div class="jiage">3499元起</div>
				</div>
				<div class="mingxing fl">
					<div class="sub_mingxing"><a href=""><img src="/miui/image/pinpai2.png" alt=""></a></div>
					<div class="pinpai"><a href="">小米5s</a></div>
					<div class="youhui">5月9日-10日，下单立减200元</div>
					<div class="jiage">1999元</div>
				</div>
				<div class="mingxing fl">
					<div class="sub_mingxing"><a href=""><img src="/miui/image/pinpai3.png" alt=""></a></div>
					<div class="pinpai"><a href="">小米手机5 64GB</a></div>
					<div class="youhui">5月9日-10日，下单立减100元</div>
					<div class="jiage">1799元</div>
				</div>
				<div class="mingxing fl"> 	
					<div class="sub_mingxing"><a href=""><img src="/miui/image/pinpai4.png" alt=""></a></div>
					<div class="pinpai"><a href="">小米电视3s 55英寸</a></div>
					<div class="youhui">5月9日，下单立减200元</div>
					<div class="jiage">3999元</div>
				</div>
				<div class="mingxing fl">
					<div class="sub_mingxing"><a href=""><img src="/miui/image/pinpai5.png" alt=""></a></div>
					<div class="pinpai"><a href="">小米笔记本</a></div>
					<div class="youhui">更轻更薄，像杂志一样随身携带</div>
					<div class="jiage">3599元起</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="peijian w">
			<div class="biaoti center">配件</div>
			<div class="main center">
				<div class="content">
					<div class="remen fl"><a href=""><img src="/miui/image/peijian1.jpg"></a>
					</div>
					<div class="remen fl">
						<div class="xinpin"><span>新品</span></div>
						<div class="tu"><a href=""><img src="/miui/image/peijian2.jpg"></a></div>
						<div class="miaoshu"><a href="">小米6 硅胶保护套</a></div>
						<div class="jiage">49元</div>
						<div class="pingjia">372人评价</div>
						<div class="piao">
							<a href="">
								<span>发货速度很快！很配小米6！</span>
								<span>来至于mi狼牙的评价</span>
							</a>
						</div>
					</div>
					<div class="remen fl">
						<div class="xinpin"><span style="background:#fff"></span></div>
						<div class="tu"><a href=""><img src="/miui/image/peijian3.jpg"></a></div>
						<div class="miaoshu"><a href="">小米手机4c 小米4c 智能</a></div>
						<div class="jiage">29元</div>
						<div class="pingjia">372人评价</div>
					</div>
					<div class="remen fl">
						<div class="xinpin"><span style="background:red">享6折</span></div>
						<div class="tu"><a href=""><img src="/miui/image/peijian4.jpg"></a></div>
						<div class="miaoshu"><a href="">红米NOTE 4X 红米note4X</a></div>
						<div class="jiage">19元</div>
						<div class="pingjia">372人评价</div>
						<div class="piao">
							<a href="">
								<span>发货速度很快！很配小米6！</span>
								<span>来至于mi狼牙的评价</span>
							</a>
						</div>
					</div>
					<div class="remen fl">
						<div class="xinpin"><span style="background:#fff"></span></div>
						<div class="tu"><a href=""><img src="/miui/image/peijian5.jpg"></a></div>
						<div class="miaoshu"><a href="">小米支架式自拍杆</a></div>
						<div class="jiage">89元</div>
						<div class="pingjia">372人评价</div>
						<div class="piao">
							<a href="">
								<span>发货速度很快！很配小米6！</span>
								<span>来至于mi狼牙的评价</span>
							</a>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="content">
					<div class="remen fl"><a href=""><img src="/miui/image/peijian6.png"></a>
					</div>
					<div class="remen fl">
						<div class="xinpin"><span style="background:#fff"></span></div>
						<div class="tu"><a href=""><img src="/miui/image/peijian7.jpg"></a></div>
						<div class="miaoshu"><a href="">小米指环支架</a></div>
						<div class="jiage">19元</div>
						<div class="pingjia">372人评价</div>
						<div class="piao">
							<a href="">
								<span>发货速度很快！很配小米6！</span>
								<span>来至于mi狼牙的评价</span>
							</a>
						</div>
					</div>
					<div class="remen fl">
						<div class="xinpin"><span style="background:#fff"></span></div>
						<div class="tu"><a href=""><img src="/miui/image/peijian8.jpg"></a></div>
						<div class="miaoshu"><a href="">米家随身风扇</a></div>
						<div class="jiage">19.9元</div>
						<div class="pingjia">372人评价</div>
					</div>
					<div class="remen fl">
						<div class="xinpin"><span style="background:#fff"></span></div>
						<div class="tu"><a href=""><img src="/miui/image/peijian9.jpg"></a></div>
						<div class="miaoshu"><a href="">红米4X 高透软胶保护套</a></div>
						<div class="jiage">59元</div>
						<div class="pingjia">775人评价</div>
					</div>
					<div class="remenlast fr">
						<div class="hongmi"><a href=""><img src="/miui/image/hongmin4.png" alt=""></a></div>
						<div class="liulangengduo"><a href=""><img src="/miui/image/liulangengduo.png" alt=""></a></div>					
					</div>
					<div class="clear"></div>
				</div>				
			</div>
		</div>
	@endsection