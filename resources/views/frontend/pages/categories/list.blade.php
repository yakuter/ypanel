@extends('admin.layouts.master')

@section('content')

<div class="main-content">
	<div class="main-content-inner">

		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="{{ url('admin') }}">Anasayfa</a>
				</li>

				<li class="active">Tüm Kategoriler</li>
			</ul><!-- /.breadcrumb -->
		</div>
		
		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Kategoriler
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Tüm Kategoriler
					</small>
				</h1>
			</div><!-- /.page-header -->
					
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					
					@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif	
					
					@foreach (['danger', 'warning', 'success', 'info'] as $msg)
						@if(Session::has('alert-' . $msg))
					      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
						@endif
					@endforeach

					{{--
					@if (count($datas) > 0)
						<ul>
						@foreach ($datas as $data)
		            		@if ($data->parent_id == 0)
		            			 <li>{{ $data->name }}</li>
	            				@if (count($data->child_cat) > 0)
	            					<ul>
	            					@foreach ($data->child_cat as $child)
								        <li>{{ $child->name }}</li>
								    @endforeach	
	            					</ul>
	            				@endif
		            		@endif
	                	@endforeach
	                	</ul>
                	@endif
                	--}}
                	
                		

					<table id="simple-table" class="table  table-bordered table-hover">
						<thead>
							<tr>
								<th class="detail-col">ID</th>
								<th>Resim</th>
								<th>Kategori Adı</th>
								<th>Üst Kategori</th>
								<th>Bağlantı</th>
								<th>Ürün Sayısı</th>
								<th>İşlemler</th>
							</tr>
						</thead>

						<tbody>
						
						@if ( !$datas->count() )
						    <tr>
								<td colspan="5">Kategori bulunmamaktadır.</td>
							</tr>

						@else
						    @foreach( $datas as $data )
							<tr>
								<td>#{{ $data->id }}</td>
								<td>
								<img src="{{ url(session('site_upload').'/cats/'.$data->image) }}" width="40" height="40" />
								</td>
								<td>{{ $data->name }}</td>
								<td>
									@if ($data->parent_id != 0)
										{{ $data->parent_cat->name }}
									@endif
									
									</td>
								<td>{{ $data->permalink }}</td>
								<td>{{ App\Product::where('category_id', $data->id)->count() }}</td>
								<td>
									<div class="hidden-sm hidden-xs btn-group">
										
									<button class="btn btn-xs btn-success" onClick="location.href='{{ route('categories.show', $data->id) }}'">
											<i class="ace-icon fa fa-desktop bigger-120"></i>
										</button>

										<button class="btn btn-xs btn-info" onClick="location.href='{{ url('/admin/categories/'.$data->id.'/edit') }}'">
											<i class="ace-icon fa fa-pencil bigger-120"></i>
										</button>

										<button class="btn btn-xs btn-danger" onClick="location.href='{{ route('categories.delete', $data->id) }}'">
											<i class="ace-icon fa fa-trash-o bigger-120"></i>
										</button>
									</div>
								</td>
							</tr>
							@endforeach
							@endif
						</tbody>
					</table>

					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->

@endsection <!-- section "content" stop -->