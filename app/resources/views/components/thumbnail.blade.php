@php

if($type === 'shops'){
  $path = 'storage/shops/';
}
if($type === 'images'){
  $path = 'storage/images/';
}

@endphp

<div>
  @if (empty($filename))
    <img src="{{ asset('images/no_image.jpg') }}">
  @else
    <img src="{{ asset($path . $filename) }}">
  @endif
</div>