@extends('layouts.front.master')

@section('title', $seo_title)

@section('seo_title', $seo_title)
@section('description', $seo_description)

@section('bootstrap')
    
    <link href="{{ asset('assets/css/topcoupons/critical_bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/topcoupons/non_critical_bootstrap.css') }}" rel="preload" as="style" onload='this.onload=null;this.rel="stylesheet"'>
    <noscript><link href="{{ asset('assets/css/topcoupons/non_critical_bootstrap.css') }}" rel="stylesheet" type="text/css"></noscript>
    
@endsection

@section('custom_style')

    <link href="{{ asset('assets/css/topcoupons/critical_style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/topcoupons/non_critical_style.css') }}" rel="preload" as="style" onload='this.onload=null;this.rel="stylesheet"'>
    <noscript><link href="{{ asset('assets/css/topcoupons/non_critical_style.css') }}" rel="stylesheet" type="text/css"></noscript>
    
    <link href="{{ asset('assets/css/topcoupons/critical_overrite.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/topcoupons/non_critical_overrite.css') }}" rel="preload" as="style" onload='this.onload=null;this.rel="stylesheet"'>
    <noscript><link href="{{ asset('assets/css/topcoupons/non_critical_overrite.css') }}" rel="stylesheet" type="text/css"></noscript>
    
    <link href="{{ asset('assets/css/media_query/coupons-list.css') }}" rel="preload" as="style" onload='this.onload=null;this.rel="stylesheet"'>
    <noscript><link rel="stylesheet" href="{{ asset('assets/css/media_query/coupons-list.css') }}"></noscript>
    
@endsection


@section('content')

<section class="results">
   <div class="container">
      <div class="row">
         
         <div class="col-sm-4 m-t-20 sidebar">
            @include('includes.coupons.expiresoon_left_sidebar')
         </div>

         <div class="col-sm-8 m-t-20">
            
            @include('includes.coupons.expiring_soon_featured')

            @include('includes.coupons.expiring_soon_last_added_coupons')
            
            @if( $expired_soon_coupons_featured->count() == 0 && $expired_soon_coupons_with_setted_by_admin->count() == 0 )
               <p class='lead text-muted'>There are no coupons to show</p>
            @endif
            
         </div>

         <div class="col-sm-4 m-t-20 mob-sidebar">
            @include('includes.coupons.expiresoon_left_sidebar')
         </div>
         
      </div>
   </div>
</section>
         
@endsection