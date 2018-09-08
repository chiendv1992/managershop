@extends('admin.master')
@section('content')
		<div id="page-wrapper">
				<div class="graphs">

					<div class="row">
						<div class="col-md-10"><h3 class="blank1">Banner</h3> </div>
						<div class="col-md-2 social_icons-left"><h4 ><a class="alert alert-primary" href="{{url('banner/create')}}">Thêm Banner</a></h4></div>
					</div>


					 <div class="xs tabls">
                    @if(session('success'))
                     <div class="alert alert-success">
                          {{session('success')}}
                     </div>                       
                     @endif 
						<div class="panel panel-primary" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
							<div class="panel-body no-padding" style="display: block;">
								<table class="table table-striped  table-bordered" align="center">
									<thead>
										<tr class="success">
											<th>STT</th>
											<th>Image</th>
											<th>Xóa</th>
											<th>Sửa</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$stt=1;
										 ?>
										@foreach($banner as $bn)
											<tr>
												<td>{{$stt++}}</td>
												<td><img src="{{asset('upload/images/banner/')}}/{{$bn->image}}" width="200px"></td>
												<td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="delete/{{$bn->id}}" onclick="xacnhanxoa()"> Delete</a></td>
                                				<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="edit/{{$bn->id}}">Edit</a></td>
											</tr>
										@endforeach
									</tbody>
								</table>
							{{ $banner->links() }}
							</div>

						</div>
						
					</div>
				</div>
			</div>
		</div>
@endsection