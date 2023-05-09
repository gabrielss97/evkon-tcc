
/**
 * Google API Javascript
 * https://developers.google.com/maps/documentation/embed/get-started
 * 
 * Script para selecionar localização, obter a cordenada e add em input html para salvar no banco de dados
 */

// Latitude e longitude selecionada
var lat_lng_selecionada = {}

function initialize() {

    // Marcadores
    var markers = [];

    var mapOptions = {
        center: new google.maps.LatLng(-34.397, 150.644), // Add cordenada aleatória
        zoom: 17,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("map_canvas"),
        mapOptions);

    // Add market para teste
    var ponto = new google.maps.LatLng(-34.397, 150.644);
    var marker = new google.maps.Marker({
        position: ponto, //seta posição
        map: map, //Objeto mapa
        title: "Hello World!" //string que será exibida quando passar o mouse no marker
        //icon: caminho_da_imagem
    });

    // Obter minha localização e add no mapa
    infoWindow = new google.maps.InfoWindow();
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                };

                console.log(pos, 'xx')

                // Se tiver uma cordenada padrão informada, usa ela, se não vai utilizar a cordadana atual da visitante
                if (typeof lat_long_padrao !== "undefined") {
                    // console.log(lat_long_padrao)
                    pos = {
                        lat: parseFloat(lat_long_padrao.lat),
                        lng: parseFloat(lat_long_padrao.lng),
                    };
                    // console.log('ddddd', pos)

                    var pontoPadrao = new google.maps.LatLng(pos);
                    var markerPadrao = new google.maps.Marker({
                        position: pontoPadrao, //seta posição
                        map: map, //Objeto mapa
                        title: "Local Selecionado" //string que será exibida quando passar o mouse no marker
                        //icon: caminho_da_imagem
                    });

                    markers.push(markerPadrao);


                }
                infoWindow.setPosition(pos);

                // infoWindow.setContent("Localização");
                // infoWindow.open(map);
                map.setCenter(pos);
            },
            () => {
                handleLocationError(true, infoWindow, map.getCenter());
            }
        );
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(
            browserHasGeolocation ?
                "Error: The Geolocation service failed." :
                "Error: Your browser doesn't support geolocation."
        );
        infoWindow.open(map);
    }


    // ==========================


    // obtendo long e lat com o click no mapa
    
    map.addListener("click", (mapsMouseEvent) => {

        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }

        // Pegar a loc
        infoWindow.close();

        infoWindow = new google.maps.InfoWindow({
            position: mapsMouseEvent.latLng,
        });
        let lonLat = null
        infoWindow.setContent(
            lonLat = JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
        );

        // console.log(lonLat)

        // Add ponto selecionado
        lat_lng_selecionada = JSON.parse(lonLat)

        var ponto = new google.maps.LatLng(JSON.parse(lonLat));
        var marker = new google.maps.Marker({
            position: ponto, //seta posição
            map: map, //Objeto mapa
            title: "Local Selecionado" //string que será exibida quando passar o mouse no marker
            //icon: caminho_da_imagem
        });

        setMapOnAll(null); // Com o valor 'null' vai remover todas as marcações

        // Add o marker seleciondo no array
        markers.push(marker);

        // Add jons das cordenadas no input
        let resultado = {
            'lat': `${lat_lng_selecionada.lat}`,
            'lng': `${lat_lng_selecionada.lng}`,
        }
        document.querySelector('#local_lat_lng').value = JSON.stringify(resultado)

        // `http://maps.google.com/maps?q=${lat_lng_selecionada.lat},${lat_lng_selecionada.lng}&t=k&z=16&output=embed`
        // document.querySelector('#map-iframe').src =
        //     `http://maps.google.com/maps?q=${lat_lng_selecionada.lat},${lat_lng_selecionada.lng}&t=k&z=16&output=embed`

    });


}

// Executar a função ao carregar
window.onload = initialize();


