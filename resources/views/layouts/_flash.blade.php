@if (Session::has('gagal'))
<p class="text-red-500 text-sm italic">{{ Session::get('gagal') }}</p>
@endif
@if (Session::has('success'))
<p class="text-green-500 text-sm italic">{{ Session::get('success') }}</p>
@endif