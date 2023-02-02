<div {{$attributes -> merge(['class' => 'bg-gray-50 border border-gray-200 rounded p-6'])}}>
   {{$slot}}  {{-- whatever is passed or wrapp the tags in will be here(the output)  --}}
</div>