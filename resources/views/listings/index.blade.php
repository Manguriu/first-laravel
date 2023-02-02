<x-layout>

@include ('partials._upper')
@include("partials._search")
{{-- <a
    href="/listings/create"
    class="absolute top-1/3 left-10 bg-laravel text-white py-2 px-5"
    >Post Job</a
> --}}



<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
{{--show each listing--}}
@unless (count($listings) ==0)

@foreach ($listings as $listing)

<x-listing-card  :listing="$listing"/>

@endforeach

@else
<p>No listings found</p>
@endunless

</div>
<div class="mt-6 p-4">
    {{$listings -> links()}}
</div>

</x-layout>