/*! jquery-locationpicker - v0.1.13 - 2016-03-11 */

!function(a){function b(a,b){var c=new google.maps.Map(a,b),d=new google.maps.Marker({position:new google.maps.LatLng(54.19335,-3.92695),map:c,title:"Drag Me",draggable:b.draggable,icon:void 0!==b.markerIcon?b.markerIcon:void 0});return{map:c,marker:d,circle:null,location:d.position,radius:b.radius,locationName:b.locationName,addressComponents:{formatted_address:null,addressLine1:null,addressLine2:null,streetName:null,streetNumber:null,city:null,district:null,state:null,stateOrProvince:null},settings:b.settings,domContainer:a,geodecoder:new google.maps.Geocoder}}function c(a){return void 0!=d(a)}function d(b){return a(b).data("locationpicker")}function e(a,b){if(a){var c=i.locationFromLatLng(b.location);a.latitudeInput&&a.latitudeInput.val(c.latitude).change(),a.longitudeInput&&a.longitudeInput.val(c.longitude).change(),a.radiusInput&&a.radiusInput.val(b.radius).change(),a.locationNameInput&&a.locationNameInput.val(b.locationName).change()}}function f(b,c){if(b){if(b.radiusInput&&b.radiusInput.on("change",function(b){b.originalEvent&&(c.radius=a(this).val(),i.setPosition(c,c.location,function(a){a.settings.onchanged.apply(c.domContainer,[i.locationFromLatLng(a.location),a.radius,!1])}))}),b.locationNameInput&&c.settings.enableAutocomplete){var d=!1;c.autocomplete=new google.maps.places.Autocomplete(b.locationNameInput.get(0)),google.maps.event.addListener(c.autocomplete,"place_changed",function(){d=!1;var a=c.autocomplete.getPlace();return a.geometry?void i.setPosition(c,a.geometry.location,function(a){e(b,a),a.settings.onchanged.apply(c.domContainer,[i.locationFromLatLng(a.location),a.radius,!1])}):void c.settings.onlocationnotfound(a.name)}),c.settings.enableAutocompleteBlur&&(b.locationNameInput.on("change",function(a){a.originalEvent&&(d=!0)}),b.locationNameInput.on("blur",function(f){f.originalEvent&&setTimeout(function(){var f=a(b.locationNameInput).val();f.length>5&&d&&(d=!1,c.geodecoder.geocode({address:f},function(a,d){d==google.maps.GeocoderStatus.OK&&a&&a.length&&i.setPosition(c,a[0].geometry.location,function(a){e(b,a),a.settings.onchanged.apply(c.domContainer,[i.locationFromLatLng(a.location),a.radius,!1])})}))},1e3)}))}b.latitudeInput&&b.latitudeInput.on("change",function(b){b.originalEvent&&i.setPosition(c,new google.maps.LatLng(a(this).val(),c.location.lng()),function(a){a.settings.onchanged.apply(c.domContainer,[i.locationFromLatLng(a.location),a.radius,!1])})}),b.longitudeInput&&b.longitudeInput.on("change",function(b){b.originalEvent&&i.setPosition(c,new google.maps.LatLng(c.location.lat(),a(this).val()),function(a){a.settings.onchanged.apply(c.domContainer,[i.locationFromLatLng(a.location),a.radius,!1])})})}}function g(a){google.maps.event.trigger(a.map,"resize"),setTimeout(function(){a.map.setCenter(a.marker.position)},300)}function h(b,c,d){var e=a.extend({},a.fn.locationpicker.defaults,d),g=e.location.latitude,h=e.location.longitude,j=e.radius,k=b.settings.location.latitude,l=b.settings.location.longitude,m=b.settings.radius;(g!=k||h!=l||j!=m)&&(b.settings.location.latitude=g,b.settings.location.longitude=h,b.radius=j,i.setPosition(b,new google.maps.LatLng(b.settings.location.latitude,b.settings.location.longitude),function(a){f(b.settings.inputBinding,b),a.settings.oninitialized(c)}))}var i={drawCircle:function(b,c,d,e){return null!=b.circle&&b.circle.setMap(null),d>0?(d*=1,e=a.extend({strokeColor:"#0000FF",strokeOpacity:.35,strokeWeight:2,fillColor:"#0000FF",fillOpacity:.2},e),e.map=b.map,e.radius=d,e.center=c,b.circle=new google.maps.Circle(e),b.circle):null},setPosition:function(a,b,c){a.location=b,a.marker.setPosition(b),a.map.panTo(b),this.drawCircle(a,b,a.radius,{}),a.settings.enableReverseGeocode?a.geodecoder.geocode({latLng:a.location},function(b,d){d==google.maps.GeocoderStatus.OK&&b.length>0&&(a.locationName=b[0].formatted_address,a.addressComponents=i.address_component_from_google_geocode(b[0].address_components)),c&&c.call(this,a)}):c&&c.call(this,a)},locationFromLatLng:function(a){return{latitude:a.lat(),longitude:a.lng()}},address_component_from_google_geocode:function(a){for(var b={},c=a.length-1;c>=0;c--){var d=a[c];d.types.indexOf("postal_code")>=0?b.postalCode=d.short_name:d.types.indexOf("street_number")>=0?b.streetNumber=d.short_name:d.types.indexOf("route")>=0?b.streetName=d.short_name:d.types.indexOf("locality")>=0?b.city=d.short_name:d.types.indexOf("sublocality")>=0?b.district=d.short_name:d.types.indexOf("administrative_area_level_1")>=0?b.stateOrProvince=d.short_name:d.types.indexOf("country")>=0&&(b.country=d.short_name)}return b.addressLine1=[b.streetNumber,b.streetName].join(" ").trim(),b.addressLine2="",b}};a.fn.locationpicker=function(j,k){if("string"==typeof j){var l=this.get(0);if(!c(l))return;var m=d(l);switch(j){case"location":if(void 0==k){var n=i.locationFromLatLng(m.location);return n.radius=m.radius,n.name=m.locationName,n}k.radius&&(m.radius=k.radius),i.setPosition(m,new google.maps.LatLng(k.latitude,k.longitude),function(a){e(a.settings.inputBinding,a)});break;case"subscribe":if(void 0==k)return null;var o=k.event,p=k.callback;if(!o||!p)return console.error('LocationPicker: Invalid arguments for method "subscribe"'),null;google.maps.event.addListener(m.map,o,p);break;case"map":if(void 0==k){var q=i.locationFromLatLng(m.location);return q.formattedAddress=m.locationName,q.addressComponents=m.addressComponents,{map:m.map,marker:m.marker,location:q}}return null;case"autosize":return g(m),this}return null}return this.each(function(){var g=a(this);if(c(this))return void h(d(this),a(this),j);var k=a.extend({},a.fn.locationpicker.defaults,j),l=new b(this,{zoom:k.zoom,center:new google.maps.LatLng(k.location.latitude,k.location.longitude),mapTypeId:google.maps.MapTypeId.ROADMAP,mapTypeControl:!1,disableDoubleClickZoom:!1,scrollwheel:k.scrollwheel,streetViewControl:!1,radius:k.radius,locationName:k.locationName,settings:k,draggable:k.draggable,markerIcon:k.markerIcon});g.data("locationpicker",l),google.maps.event.addListener(l.marker,"dragend",function(){i.setPosition(l,l.marker.position,function(a){var b=i.locationFromLatLng(l.location);a.settings.onchanged.apply(l.domContainer,[b,a.radius,!0]),e(l.settings.inputBinding,l)})}),i.setPosition(l,new google.maps.LatLng(k.location.latitude,k.location.longitude),function(a){e(k.inputBinding,l),f(k.inputBinding,l),a.settings.oninitialized(g)})})},a.fn.locationpicker.defaults={location:{latitude:40.7324319,longitude:-73.82480777777776},locationName:"",radius:500,zoom:15,scrollwheel:!0,inputBinding:{latitudeInput:null,longitudeInput:null,radiusInput:null,locationNameInput:null},enableAutocomplete:!1,enableAutocompleteBlur:!1,enableReverseGeocode:!0,draggable:!0,onchanged:function(){},onlocationnotfound:function(){},oninitialized:function(){},markerIcon:void 0}}(jQuery);
//# sourceMappingURL=locationpicker.jquery.min.js.map
/**
 * Created by julien on 04/10/16.
 */
$( document ).ready(function() {


    $('#locationpicker-default').locationpicker({
        location: {latitude: latitude, longitude: longitude},
        radius: 300,
        inputBinding: {
            latitudeInput: $('#latitude'),
            longitudeInput: $('#longitude'),
            radiusInput: $('#us2-radius'),
            locationNameInput: $('#address')
        },
        enableAutocomplete: true,
        onchanged: function (currentLocation, radius, isMarkerDropped) {
            var addressComponents = $(this).locationpicker('map').location.addressComponents;
            $("#latitude").val(currentLocation.latitude);
            $("#longitude").val(currentLocation.longitude);
            updateControls(addressComponents);

        }, oninitialized: function (component) {

            $('#address').val(club.address);
            $('#city').val(club.city);
            $('#CP').val(club.cp);
            $('#state').val(club.state);
            $('#latitude').val(latitude);
            $('#longitude').val(longitude);
        }

    });

    function updateControls(addressComponents) {
        $('#city').val(addressComponents.city);
        $('#CP').val(addressComponents.postalCode);
        $('#state').val(addressComponents.stateOrProvince);

    }
});