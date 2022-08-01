<div id="breadcrumb-container">
    <div class="container-fluid">
        <div class="breadcrmb-wrap hidden-xs">
            <div class="row">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a rel="follow" href="{{ route('home.index') }}">Home</a> </li>
                        <li class="breadcrumb-item"><a rel="follow"
                                href="{{ isset($category) ? route('categories.index') : route('stores.index') }} ">
                                {{ isset($category) ? 'Categorie ' : 'Lista Negozi ' }} </a> >  
                        </li>
                        
                        <script type="application/ld+json">
                            {
                              "@context": "https://schema.org/", 
                              "@type": "BreadcrumbList", 
                              "itemListElement": [
                              {
                                "@type": "ListItem", 
                                "position": 1, 
                                "name": "Home",
                                "item": "{{ route('home.index') }}" 
                              },
                              {
                                "@type": "ListItem", 
                                "position": 2, 
                                "name": "{{ isset($category) ? 'categorie' : 'negozi' }}",
                                "item": "{{ isset($category) ? route('categories.index') : route('stores.index') }}"
                              }
                              ]
                            }
                        </script>
                        
                        <li class="breadcrumb-item active"><b>{{ $category->name?? $store->name }}</b> - 
                        {{ \Carbon\Carbon::parse($category->updated_at?? $store->updated_at)->translatedFormat('d') . ' ' . ucfirst( \Carbon\Carbon::parse($category->updated_at?? $store->updated_at)->translatedFormat('M Y') ) }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>