    <!-- Hero -->
    <section
    class="relative h-72 bg-black
     flex flex-col justify-center align-center text-center space-y-4 mb-4"
>
    <div
        class="absolute top-0 left-0 w-full h-full opacity-20 bg-no-repeat bg-center"
        style="background-image: url('images/infinite-logo.png')"
    ></div>

    <div class="z-10">
        <h1 class="text-6xl font-bold uppercase text-white">
            Infinite<span class="text-laravel">Gigs</span>
        </h1>
        <p class="text-2xl text-gray-200 font-bold my-4">
            Find or post jobs & projects
        </p>
        <div>
            <a
                {{-- href="register.html" --}}
                href="/listings/create"
                class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-white hover:border-laravel"
                >List a Gig</a
            >
        </div>
    </div>
</section>