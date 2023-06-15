@extends('layouts.front.app')
@section('description')
  Kost-Able, cari kos dan apartement makin mudah hanya di Kost-Able. aplikasi pencari kos di indonesia.
@endsection
@section('title')
  Selamat Datang di Kost-Able
@endsection

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Dasar Leaflet Js</title>

    <style>
        #peta { height: 680px; }
    </style>

    <!-- css leaflfet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>

   <!-- leafletjs -->
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
   <script src="geosearch/src/js/l.control.geosearch.js"></script>
	<script src="geosearch/src/js/l.geosearch.provider.google.js"></script>

   <!-- leaflet search -->
   <link rel="stylesheet" href="geosearch/src/css/l.geosearch.css" />	
   <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.css">
<script src="https://unpkg.com/leaflet-geosearch@3.1.0/dist/geosearch.umd.js"></script>


</head>
<body>
    <div id="peta"></div>

    <script>

    // you want to get it of the window global
    const providerOSM = new GeoSearch.OpenStreetMapProvider();

    //leaflet map
    var leafletMap = L.map('peta', {
    fullscreenControl: true,

    // OR
    fullscreenControl: {pseudoFullscreen: false // if true, fullscreen to page width and height
    },
    minZoom: 2
    }).setView([0,0], 2);

    L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors,  <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',  accessToken: 'your.mapbox.access.token' }).addTo(leafletMap);

    let theMarker = {};

leafletMap.on('click',function(e) {
    
});

const search = new GeoSearch.GeoSearchControl({
     provider: providerOSM,
     style: 'icon',
        searchLabel: 'Klik Pencarian Lokasi',
        });
        leafletMap.addControl(search);
        @foreach($allKamar as $kamar)
        
                L.marker([{{ $kamar->latitude }}, {{ $kamar->longitude }}])
                    .addTo(leafletMap)
                    .bindPopup(`Nama Kamar: {{ $kamar->nama_kamar }}<br>Harga: {{ $kamar->harga_kamar }}<br><a href="{{url('room', $kamar->slug)}}">
            <img class="card-img-top img-fluid" src="{{asset('storage/images/bg_foto/' .$kamar->bg_foto)}}" alt="Card image cap" style="max-height: 180px">
            </a>`);
            @endforeach
            
        </script>
    </body>
</html>




@endsection
