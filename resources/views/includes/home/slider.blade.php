<div class="premium-slider" id="premium-slider-0" data-element="WPS" data-widget="premiumSlider">

  <div class="container">

    <div class="row">

      <div class="col">

        <div class="premium-slider__container" data-container>

            @foreach( $slider as $key => $slide )
            <a 
            class="premium-slider__item premium-slider--opacity-white" 
            style="background-image: url({{ asset("storage/" . $slide->slide) }})" 
            data-slide-index="{{$key}}" 
            href="{{ $slide->link }}">
                
                @if( $slide->store ) 
                <div class="premium-slider__logo">
                    <img 
                    data-normal="{{$slide->store->getStoreImage()}}?width=100&amp;height=100" 
                    alt="{{$slide->store->image ? $slide->store->image->alt : ''}}" 
                    title="{{$slide->store->image ? $slide->store->image->title : ''}}" 
                    class="premium-slider__img" 
                    height="110" 
                    width="110" 
                    src="" />
                </div>
                @endif

              <div class="col-md-8">

                <h3 class="premium-slider__headline">{{ $slide->title }}</h3>

                <br>

                <h3 class="premium-slider__content">{{ $slide->excerpt }}</h3>

              </div>

            </a>
            
            @endforeach

        </div>


        <style>
            .slider-icon {
                position: absolute;
                font-weight: 300;
                top: 50%;
                left: 50%;
                width: auto;
                margin: 0;
                color: #fff;
                font-size: 40px;
                transform: translate(-50%,-50%);
            }
            .icon-right { transform: translate(-50%,-50%) rotate(180deg); }
        </style>
        
        <div class="premium-slider__arrow premium-slider__arrow--left" data-arrow-prev>
            
          <span class="slider-icon icon-right">&#10095;</span>
          
        </div>

        <div class="premium-slider__arrow premium-slider__arrow--right" data-arrow-next>

          <span class="slider-icon">&#10095;</span>

        </div>

        <ul class="premium-slider__indicator-list">

            @for($i = 0; $i < $slider_count; $i++)
                <li class="premium-slider__indicator-item {{ $i==0?'premium-slider__indicator-item--active':'' }}" data-indicator-dot>
                    <span></span>
                </li>
            @endfor

        </ul>

      </div>

    </div>

      <div class="row">

        <div class="col">

            <ul class="premium-slider__links">

                <li class="premium-slider__link">

                  <a href="{{ $slider_link_1_link }}" target="_blank">{{ $slider_link_1_title }}</a>

                </li>

                <li class="premium-slider__link">

                  <a href="{{ $slider_link_2_link }}" target="_blank">{{ $slider_link_2_title }}</a>

                </li>

                <li class="premium-slider__link">

                    <a href="{{ $slider_link_3_link }}" target="_blank">{{ $slider_link_3_title }}</a>

                </li>
            </ul>

        </div>

      </div>

  </div>

</div>