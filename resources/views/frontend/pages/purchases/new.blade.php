@extends('admin.layouts.master')

@section('pagehead')
<link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-datepicker3.min.css') }}" />
@endsection


@section('pagefoot')
<script src="{{ URL::asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
	$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true
	})
	//show datepicker when clicking on the icon
	.next().on(ace.click_event, function(){
		$(this).prev().focus();
	});
</script>
@endsection


@section('content')
<div class="main-content">
	<div class="main-content-inner">
		
		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Alımlar
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Yeni Alım
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/alimlar') }}">
							{{ csrf_field() }}

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tarih</label>

							<div class="col-sm-3">
								<div class="input-group">
									<input name="tarih" class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" />
									<span class="input-group-addon">
										<i class="fa fa-calendar bigger-110"></i>
									</span>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-select-1"> Firma</label>

							<div class="col-sm-3">
								<select name="tedarikci" class="form-control" id="form-field-select-1">
									@if ( !$firmalar->count() )
								    	<option value="0">Firma bulunmamaktadır.</option>
								   	@else
								    	@foreach ( $firmalar as $firma )
								    	<option value="{{ $firma->id }}">{{ $firma->isim }}</option>
								    	@endforeach
								    @endif
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-select-1"> Ürün</label>

							<div class="col-sm-3">
								<select name="urun" class="form-control" id="form-field-select-1">
									@if ( !$urunler->count() )
								    	<option value="0">Ürün bulunmamaktadır.</option>
								   	@else
								    	@foreach ( $urunler as $urun )
								    	<option value="{{ $urun->id }}">{{ $urun->baslik }}</option>
								    	@endforeach
								    @endif
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Notlar </label>

							<div class="col-sm-4">
								<textarea name="not" rows="4" class="form-control" id="form-field-2" placeholder="Notlar"></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Alım Miktarı </label>

							<div class="col-sm-9">
								<input type="text" name="miktar" id="form-field-1" placeholder="Alım Miktarı" class="col-xs-10 col-sm-3 pull-left" />
							</div>

						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ölçü Birimi </label>

							<div class="col-sm-1">
								<select name="miktarolcu" class="form-control" id="form-field-select-1">
								    <option value="Kg">Kg</option>
								    <option value="Ton">Ton</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Fiyat </label>

							<div class="col-sm-9">
								<input type="text" name="fiyat" id="form-field-1" placeholder="Fiyat" class="col-xs-10 col-sm-3" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Fiyat Birimi</label>

							<div class="col-sm-1">
								<select name="fiyatolcu" class="form-control" id="form-field-select-1">
								    <option value="TL">TL</option>
								    <option value="DOLAR">DOLAR</option>
								    <option value="EURO">EURO</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-select-1"> Personel</label>

							<div class="col-sm-2">
								<select name="personel" class="form-control" id="form-field-select-1">
									@if ( !$kullanicilar->count() )
								    	<option value="0">Personel bulunmamaktadır.</option>
								   	@else
								    	@foreach ( $kullanicilar as $kullanici )
								    	<option value="{{ $kullanici->id }}">{{ $kullanici->adsoyad }}</option>
								    	@endforeach
								    @endif
								</select>
							</div>
						</div>

						<div class="clearfix form-actions">
							<div class="col-md-offset-3 col-md-9">

								<button class="btn btn-purple" type="button" onClick="location.href='{{ url('/admin/alimlar') }}'">
									<i class="ace-icon fa fa-undo bigger-110"></i>
									Geri
								</button>

								&nbsp; &nbsp; &nbsp;

								<button class="btn btn-info" type="submit">
									<i class="ace-icon fa fa-check bigger-110"></i>
									Ekle
								</button>
							</div>
						</div>
					</form>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->

@endsection <!-- section "content" stop -->