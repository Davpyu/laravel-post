@if (Session::has('gagal'))
<div class="bg-red-600 w-full p-4 rounded" id="alert">
    <p class="text-white text-sm font-semibold text-left">{{ Session::get('gagal') }}</p>
</div>
@endif
@if (Session::has('success'))
<div class="bg-green-600 w-full p-4 rounded" id="alert">
    <p class="text-white text-sm font-semibold">{{ Session::get('success') }}</p>
</div>
@endif

@if (Session::has('gagal') || Session::has('success'))
<script src="/js/alert.js"></script>
@endif