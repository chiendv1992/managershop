
@extends('admin.master')
@section('content')
		<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Thêm Danh Banner</h3> 
					<div class="xs tabls">
						<div class="panel panel-primary" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
							 <div class="col-lg-7" style="padding-bottom:120px">
	                        <form action="" method="POST" enctype="multipart/form-data">
	                        	{{csrf_field()}}
	                            <div class="form-group">
	                                <label>Image : </label><br>
	                                <img src="{{asset('/upload/images/banner/')}}/{{$banner->image}}" alt="" width="200px">
									<input type="hidden" name="img_curr" value="{{$banner->image}}">
									
	                            </div>
	                            <div class="form-group">
	                                <label>Status : </label>
	                                <select name="status" class="form-control">
	                                	<option value="1">Enable</option>
	                                	<option value="0">Disible</option>
	                                </select>
	                            </div> 
	                            <div class="form-group">
	                                <label>Image Khác : </label>
	                                <input type="file" name="image"  class="form-control">
	                            </div>
	                            
	                            <button type="submit" class="btn btn-primary">Sửa Banner</button>
	                            <button type="reset" class="btn btn-default">Reset</button>
	                        <form>
                    </div>

						</div>
						
					</div>
				</div>
			</div>
		</div>
@endsection