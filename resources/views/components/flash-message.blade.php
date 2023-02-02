@if(session()->has('message'))
<div x-data="{ open: true}" x-init="setTimeout(() => open = false, 1500)" x-show="open" class="fixed top-0 left-1/2 transform-translate-x-1/2 bg-black text-white px-30 py-3">
{{session('message')}}
</div>
@endif



{{-- 
{{-- @if (session('success'))
<div>
<script class="fixed top-0 left-1/2 transform-translate-x-1/2 bg-black text-white px-30 py-3">
    Swal.fire({
        icon: 'success',
        title: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 1500
    })
</script>
</div> 
@endif --}}