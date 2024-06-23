@props(['testimonios'])

<div class="container  px-5 pt-28 mx-auto flex flex-wrap border-t-2 border-zinc-900">
    <div class="flex flex-col text-center w-full mb-10">
        <h2
            class="sm:text-4xl text-2xl font-medium title-font underline decoration-orange-600 decoration-4 underline-offset-8 text-slate-200">
            Testimonios</h2>
    </div>
</div>

<!-- Component: Testimonial slider -->
<!-- Start Testimonial -->
<section class="">
    <div class="mx-auto max-w-[1340px] px-4 py-12 sm:px-6 lg:me-0 lg:py-16 lg:pe-0 lg:ps-8 xl:py-24">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3 lg:items-center lg:gap-16">
            <div class="max-w-xl text-center ltr:sm:text-left rtl:sm:text-right">
                <h2 class="text-3xl font-bold tracking-tight text-orange-500 sm:text-4xl">
                    "Mira lo que dicen nuestros clientes..."
                </h2>

                <p class="mt-4 text-slate-200">
                    No solo confíes en lo que nosotros decimos, descubre por ti mismo la experiencia de nuestros
                    clientes satisfechos y sus historias de éxito !!!
                </p>

                <div class="hidden lg:mt-8 lg:flex lg:gap-4">
                    <button aria-label="Previous slide" id="keen-slider-previous-desktop"
                        class="rounded-full border border-white p-3 text-white transition hover:bg-orange-600 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5 rtl:rotate-180">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </button>

                    <button aria-label="Next slide" id="keen-slider-next-desktop"
                        class="rounded-full border border-white p-3 text-white transition hover:bg-orange-600 hover:text-white">
                        <svg class="size-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="-mx-6 lg:col-span-2 lg:mx-0">
                <div id="keen-slider" class="keen-slider">

                    @forelse ($testimonios as $row)
                    <div class=" keen-slider__slide ">
                        <blockquote class="rounded-lg bg-gray-50 p-6 shadow-sm sm:p-8">
                            <div class="flex items-center gap-4">
                                <img alt=""
                                    src="{{ $row->imagen?  asset('clientes'.'/'.$row->imagen) : asset('clientes'.'/'.'nonUser.png') }}"
                                    class="size-14 rounded-full object-cover" />
    
                                <div>
                                    <div class=" flex flex-col justify-center text-green-500">
                                        <p class="text-2xl font-bold text-rose-600 sm:text-3xl">{{$row->cargo_testimonio}}</p>
                                        &mdash; {{$row->nombre_testimonio}}
                                    </div>
    
                                    {{-- <p class="mt-0.5 text-lg font-medium text-gray-900">Paul Starr</p> --}}
                                </div>
                            </div>
    
                            <p class="mt-4 text-gray-700">
                                {{$row->testimonio}}
                            </p>
                        </blockquote>
                    </div>
                    @empty
                    <div>sin datos</div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="mt-8 flex justify-center gap-4 lg:hidden">
            <button aria-label="Previous slide" id="keen-slider-previous"
                class="rounded-full border border-rose-600 p-4 text-rose-600 transition hover:bg-rose-600 hover:text-white">
                <svg class="size-5 -rotate-180 transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                </svg>
            </button>

            <button aria-label="Next slide" id="keen-slider-next"
                class="rounded-full border border-rose-600 p-4 text-rose-600 transition hover:bg-rose-600 hover:text-white">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                </svg>
            </button>
        </div>
    </div>
</section>

<link href="https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/keen-slider.min.css" rel="stylesheet" />

<script type="module">
    import KeenSlider from 'https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/+esm'
  
    const keenSlider = new KeenSlider(
      '#keen-slider',
      {
        loop: true,
        slides: {
          origin: 'center',
          perView: 1.25,
          spacing: 16,
        },
        breakpoints: {
          '(min-width: 1024px)': {
            slides: {
              origin: 'auto',
              perView: 1.5,
              spacing: 32,
            },
          },
        },
      },
      []
    )
  
    const keenSliderPrevious = document.getElementById('keen-slider-previous')
    const keenSliderNext = document.getElementById('keen-slider-next')
  
    const keenSliderPreviousDesktop = document.getElementById('keen-slider-previous-desktop')
    const keenSliderNextDesktop = document.getElementById('keen-slider-next-desktop')
  
    keenSliderPrevious.addEventListener('click', () => keenSlider.prev())
    keenSliderNext.addEventListener('click', () => keenSlider.next())
  
    keenSliderPreviousDesktop.addEventListener('click', () => keenSlider.prev())
    keenSliderNextDesktop.addEventListener('click', () => keenSlider.next())
</script>


<!-- End Testimonial -->