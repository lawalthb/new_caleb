@extends('layouts.app')

@section('title')
{{ trans('media_lang.panel_title') }}
@endsection
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('ev-assets/backend/plugins/bower_components/gallery/css/animated-masonry-gallery.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('ev-assets/backend/plugins/bower_components/fancybox/ekko-lightbox.min.css') }}"/>
 
  <!-- page start-->
  <section class="panel">
      <header class="panel-heading">
          {{ trans('media_lang.panel_title') }}
      </header>
      @if(Auth::user()->permission('add_media'))
      <a class="btn btn-success" data-toggle="modal" href="{{ url('gallery/create_gallery') }}" style="margin:5px">
          {{ trans('media_lang.add_class') }}
      </a>
      @endif
      <div class="panel-body">

                      <!-- /.row -->
      <div class="row">
        <div class="col-md-12">
          <div class="">
            <div id="gallery">
              <div id="gallery-header">
                <div id="gallery-header-center">
                  <div id="gallery-header-center-left">
                    <div class="gallery-header-center-right-links" id="filter-all">All</div>
                  </div>
                </div>
              </div>
              <div id="gallery-content">
                  <div id="gallery-content-center"> 
                    @if ( !$galleries->count() )
                      There is none till now.
                      @else
                    @foreach( $galleries as $gallery )
                    <a href="{{ asset('ev-assets/uploads/gallery/'.$gallery->url) }}" data-toggle="lightbox" data-gallery="multiimages" data-title="Image title will be apear here">
                      <img src="{{ asset('ev-assets/uploads/gallery/'.$gallery->url) }}" alt="{{ $gallery->title }}" class="all studio"/> 
                    </a> 
                    @endforeach
                    {!! $galleries->render() !!}
                    @endif
                  </div>
              </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <!-- .row -->
    </div>
</section>



@endsection