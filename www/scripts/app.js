// ******* JS do Phonegap ********

var app = {
    // Application Constructor
    initialize: function() {
        this.bindEvents();
    },
    
    // Bind Event Listeners
    //
    // Bind any events that are required on startup. Common events are:
    // 'load', 'deviceready', 'offline', and 'online'.
    bindEvents: function() {
        document.addEventListener('deviceready', this.onDeviceReady, false);
    },
    
    // deviceready Event Handler
    //
    // The scope of 'this' is the event. In order to call the 'receivedEvent'
    // function, we must explicitly call 'app.receivedEvent(...);'
    onDeviceReady: function() {
        navigator.geolocation.getCurrentPosition(app.onSuccess, app.onError);
    },

    onSuccess: function(position) {
    	var latitude = position.coords.latitude;
    	var longitude = position.coords.longitude;
    	
    	var latlng = new google.maps.LatLng(latitude, longitude);
    	
    	var mapOptions = {
    		center: latlng,
    		zoom: 16,
    		mapTypeId: google.maps.MapTypeId.ROADMAP
    	};

    	var map = new google.maps.Map(document.getElementById('mapa'), mapOptions);

    	var marker = new google.maps.Marker({
    		position: latlng,
    		map: map,
    		title: 'Estou Aqui'
    	});
    },

    onError: function(error) {
    	alert('Cod: '+error.code+' | Msg: '+error.message);
    }, 

};