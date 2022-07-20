@extends('layouts.front.master')

@section('title', $contact_meta_title)

@section('seo_title', $contact_meta_title)
@section('description', $contact_meta_description)

@section('bootstrap')

    <link href="{{ asset('assets/css/stores/critical_bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link rel='preload' as='style' href="{{ asset('assets/css/stores/non_critical_bootstrap.css') }}" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="{{ asset('assets/css/stores/non_critical_bootstrap.css') }}" rel="stylesheet" type="text/css"></noscript>

@endsection

@section('custom_style')

    <link href="{{ asset('assets/css/stores/critical_style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/stores/non_critical_style.css') }}" rel="preload" as="style" onload='this.onload=null;this.rel="stylesheet"'>
    <noscript><link href="{{ asset('assets/css/stores/non_critical_style.css') }}" rel="stylesheet" type="text/css"></noscript>
    
    <link href="{{ asset('assets/css/stores/critical_overrite.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/stores/non_critical_overrite.css') }}" rel="preload" as="style" onload='this.onload=null;this.rel="stylesheet"'>
    <noscript><link href="{{ asset('assets/css/stores/non_critical_overrite.css') }}" rel="stylesheet" type="text/css"></noscript>
    
    <link href="{{ asset('assets/css/media_query/stores.css') }}" rel="preload" as="style" onload='this.onload=null;this.rel="stylesheet"'>
   <noscript><link href="{{ asset('assets/css/media_query/stores.css') }}" rel="stylesheet" type="text/css"></noscript>
   
    <style>
        .all-stores-message { margin-bottom: 0; margin-left: 10px; }
    </style>
@endsection

@section('content')

    <section id='contact' class="m-t-30">
        
        <div class='container'>
            <div class='row'>
                <h2>Contattaci compilando i seguenti campi.</h2>
                
                <p>
                    Vuoi saperne di più sulla nostra attività? 
                    hai bisogno di un coupon o ti piacerebbe risparmiare su un negozio o servizio online? scrivici per richiedere informazioni, 
                    chiarimenti o collaborazioni, saremo lieti di risponderti quanto prima!
                </p>
            </div>
            
            
            <div class="row m-b-30">
                
                <div class='col-md-3'></div>
                
                <div class='col-md-6'>
                
                    @if( \Session::has('success') )
                        <div class='alert alert-success'>{{ \Session::get('success') }}</div>
                    @endif
                    
                    <form class='m-t-30' autocomplete='off' method="POST" id="contact-form" action="{{ route('contact.store') }}">
                        @csrf
                        
                        <div class='form-group'>
                            <label for='name_input'>Name</label>
                            <input id='name_input' class='form-control' name='name' type='text' placeholder='Name'>
                            @error('name')
                                <p class='text-danger'>{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class='form-group'>
                            <label for='email_input'>Indirizzo Email</label>
                            <input id='email_input' class='form-control' name='email' type='email' placeholder='Enter email'>
                            
                            @error('email')
                                <p class='text-danger'>{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class='form-group'>
                            <label for='subject_input'>Oggetto</label>
                            <input id='subject_input' class='form-control' name='subject' type='text' placeholder='Subject'>
                            
                            @error('subject')
                                <p class='text-danger'>{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class='form-group'>
                            <label for='message_input'>Testo del messaggio</label>
                            <textarea rows='3' id='message' class='form-control' id='message_input' name='message'></textarea>
                            
                            @error('message')
                                <p class='text-danger'>{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <button type='submit' class='btn btn-danger'>Invio</button>
                    </form>
                    
                </div>
                <div class='col-md-3'></div>
            </div>
        </div>
        
    </section>

@endsection

@section('custom_scripts')
<script>

</script>
@endsection