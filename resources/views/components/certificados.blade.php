@props(['certificados'])
<section class="text-gray-400 body-font">
    <div class=" px-5 py-24 mx-auto border-t-2 border-zinc-900">
        <div class="flex flex-col text-center w-full mb-20">
            <h2
                class="sm:text-4xl text-2xl font-medium title-font underline decoration-orange-500 decoration-4 underline-offset-8 text-slate-200">
                Certificados
            </h2>
        </div>

            <!-- Vertical Timeline #2 -->
            <div class="relative flex items-center h-auto  ">
                <div id="slider" class="w-full h-48 overflow-x-scroll scroll whitespace-nowrap scroll-smooth">

                    @forelse ($certificados as $row)
                    <img class="w-[220px]  inline-block p-2 cursor-pointer hover:scale-105 ease-in-out duration-300 "
                        src="https://images.unsplash.com/photo-1593104547489-5cfb3839a3b5?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxMTgwOTN8MHwxfHNlYXJjaHwyMXx8cGVyc29uJTIwfGVufDB8fHx8MTcxOTE3MDgxMnww&ixlib=rb-4.0.3&q=80&w=1080"
                    />

                    @empty
                    <div>no hay datos</div>
                    @endforelse
                </div>
            </div>

    </div>
</section>