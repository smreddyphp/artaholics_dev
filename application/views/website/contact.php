<div class="page_strip">
    <div class="container">
        <div class="row">
            <div class="strip_box">
                <p><a href="<?php echo base_url();?>"><i class="fa fa-home" aria-hidden="true"></i></a> &nbsp;- &nbsp; <?php echo @$language['contact_us'];?></p>
            </div>
        </div>
    </div>
</div>

<div class="loader"></div>
<!----------===============contact_section===============---------->
<section class="contact_section">
    <div class="container">
        <h3 class="main_heading"><?php echo @$language['contact_us'];?></h3>
        <div class="row">
            <div class="col-md-4 pad_0">
                <div class="contact_box">
                    <div class="media border  contact_icon" >
                      <img src="<?php echo base_url();?>assets/website/images/address.png" alt="John Doe" class="mr-5" >
                      <div class="media-body">
                        <h4 class="mt-2"><?php echo @$language['address'];?></h4>
                        <p><small><i><?php echo @$contact_us['address'] ; ?></i></small></p>
                      </div>
                    </div>
                </div>
            </div>
             <div class="col-md-4 pad_0">
                <div class="contact_box">
                    <div class="media border contact_icon">
                      <img src="<?php echo base_url();?>assets/website/images/email.png" alt="John Doe" class="mr-5">
                      <div class="media-body">
                        <h4 class="mt-2"><?php echo @$language['email'];?></h4>
                        <p><small ><i><?php echo @$language['email'];?> : <a class="mail_to" href="mailto:example@email.com"><?php echo @$contact_us['email'] ; ?></a></i></small></p>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 pad_0">
                <div class="contact_box">
                    <div class="media border contact_icon">
                      <img src="<?php echo base_url();?>assets/website/images/phone.png" alt="John Doe" class="mr-5">
                      <div class="media-body">
                        <h4 class="mt-2"><?php echo @$language['phone'];?></h4>
                        <p><small ><i><?php echo @$contact_us['phone'] ; ?></i></small></p>
                      </div>
                    </div>
                </div>
            </div>
          </div>
          <form action="" id="contact_us" method="post">
            <div class="row">
              <div class="contact_wrapper">
                <div class="register_card contact_card">
                    <div class="row">
                        <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label for="usr"><?php echo @$language['name'];?></label>
                        <input name="data[name]" type="text" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="usr"><?php echo @$language['email'];?></label>
                        <input name="data[email]" type="email" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="usr"><?php echo @$language['subject'];?></label>
                        <input name="data[subject]" type="text" class="form-control">
                      </div>
                      </div>
                      <div class="col-md-6">
                                  <div class="form-group mb-3">
                        <label for="usr"><?php echo @$language['message'];?></label>
                        <textarea name="data[message]" class="form-control message_box"></textarea>
                      </div>
                      <div class="form-group">
                        <button type="button" class="btn btn-success shop_btn shop_artist_btn save_form"><?php echo @$language['submit'];?></button>
                      </div>
                    </div>
                    </div>
                  </div>
                        </div>
                    </div>
        </form>
    </div>
</section>
    <div class="map_div">
      <div id="outlet_map" style="height:445px" style="border:0" allowfullscreen=""></div>       
      </div>
      <div id="snackbar"></div>
      <script type="text/javascript">
        $("#contact_us").validate({       
            rules: {
                "data[message]"   : "required",
                "data[email]"   : "required",                
                "data[subject]"   : "required",                
                "data[name]"   : "required",                
            },
            messages : {
                "data[message]"   : "Please Enter the Message",
                "data[email]"   : "Please Enter The Valid Email",                
                "data[subject]"   : "Please Enter The Subject",                
                "data[name]"   : "Please Enter the Name",                              
            },      
        });
    $('.save_form').click(function(){    
        var validator = $("#contact_us").validate();
            validator.form();
            if(validator.form() == true){                 
                var data = new FormData($('#contact_us')[0]);   
                $.ajax({                
                    url: "<?php echo base_url();?>website/save_contact_us",
                    type: "POST",
                    data: data,
                    mimeType: "multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData:false,
                    error:function(request,response){
                        console.log(request);
                    },                  
                    success: function(result)
                    { 
                      $("#snackbar").html("We Will Contact You Shortly...!");
                      document.getElementById("contact_us").reset();                  
                         myFunction();
                       
                    }
                });
            }
        });
      </script> 
      <script type="text/javascript">
      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };
      //Set up some of our variables.
      var map; //Will contain map object.
      var marker = false; ////Has the user plotted their location marker? 

   
      function initAutocomplete() {
        //The center location of our map.
        
         <?php if(@$contact_us['latitude']!=0 && @$contact_us['longitude']!=0) {  ?>  

            var centerOfMap   = new google.maps.LatLng(<?php echo $contact_us['latitude']; ?>,<?php echo $contact_us['longitude']; ?>);

            var options      = {center: centerOfMap, zoom: 10};

            //map        = new google.maps.Map(document.getElementById("outlet_map"), mapOptions);
           // marker     = new google.maps.Marker({position:centerOfMap});

            //marker.setMap(map);

         <?php }else{ ?> 

                var centerOfMap = new google.maps.LatLng(24.741112, 46.652154);
                  //Map options.
                  var options = {
                    center: centerOfMap, //Set center.
                    zoom: 10 //The zoom value.
                  };

        <?php } ?>  

                  //Create the map object.
                  map = new google.maps.Map(document.getElementById('outlet_map'), options);

                  var geocoder = new google.maps.Geocoder();

                  //On load show address
                  geocoder.geocode({
                                      'latLng': centerOfMap
                                    }, function(results, status) {
                                      if (status == google.maps.GeocoderStatus.OK) {
                                        if (results[0]) {
                                          $('#show_address').val(results[0].formatted_address);
                                        }
                                      }
                                    });

                  //On click Update address
                  google.maps.event.addListener(map, 'click', function(event) {
                                      geocoder.geocode({
                                        'latLng': event.latLng
                                      }, function(results, status) {
                                        if (status == google.maps.GeocoderStatus.OK) {
                                          if (results[0]) {
                                             $('#show_address').val(results[0].formatted_address);
                                          }
                                        }
                                      });
                                    });



                  marker     = new google.maps.Marker({position:centerOfMap});
                  marker.setMap(map);
               
                  //Listen for any clicks on the map.
                  google.maps.event.addListener(map, 'click', function(event) {                
                      //Get the location that the user clicked.
                      var clickedLocation = event.latLng;
                      //If the marker hasn't been added.
                      if(marker === false)
                      {
                          //Create the marker.
                          marker = new google.maps.Marker({
                              position: clickedLocation,
                              map: map,
                              draggable: true //make it draggable
                          });
                          //Listen for drag events!
                          google.maps.event.addListener(marker, 'dragend', function(event){
                              markerLocation();
                          });
                      } 
                      else
                      {
                          //Marker has already been added, so just change its location.
                          marker.setPosition(clickedLocation);
                      }
                      //Get the marker's location.
                      markerLocation();
                  });

                // Create the autocomplete object, restricting the search to geographical
                // location types.
                autocomplete = new google.maps.places.Autocomplete(
                    /** @type {!HTMLInputElement} */(document.getElementById('show_address')),
                    {types: ['geocode']});
                
                // When the user selects an address from the dropdown, populate the address
                // fields in the form.
                autocomplete.addListener('place_changed', fillInAddress);

              
      }
        
      //This function will get the marker's current location and then add the lat/long
      //values to our textfields so that we can save the location.
      function markerLocation(){
          //Get location.
          var currentLocation = marker.getPosition();
          var geocoder = new google.maps.Geocoder;
          //Add lat and lng values to a field that we can save.
          document.getElementById('latitude').value = currentLocation.lat(); //latitude
          document.getElementById('longitude').value = currentLocation.lng(); //longitude
          var latlng = {lat: currentLocation.lat(), lng: currentLocation.lng()};
          geocoder.geocode({'location': latlng}, function(results, status) {
            if (status === 'OK') {
              if (results[1]) {
                for (var component in componentForm) {
                  document.getElementById(component).value = '';
                  document.getElementById(component).disabled = false;
                }
                //console.log( JSON.stringify(results) );
                // Get each component of the address from the place details
                // and fill the corresponding field on the form.
                for (var i = 0; i < results[0].address_components.length; i++) {
                  var addressType = results[0].address_components[i].types[0];
                  if (componentForm[addressType]) {
                    var val = results[0].address_components[i][componentForm[addressType]];
                    document.getElementById(addressType).value = val;
                  }
                }
              } else {
                window.alert('No results found');
              }
            } else {
              window.alert('Geocoder failed due to: ' + status);
            }
          });
      }
        
        

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();
        
        for (var component in componentForm) 
        {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
        var lat = place.geometry.location.lat();
        var lng = place.geometry.location.lng();
        document.getElementById("latitude").value  = place.geometry.location.lat();
        document.getElementById("longitude").value = place.geometry.location.lng();
        data = {lat: lat, lng: lng};
        var map = new google.maps.Map(document.getElementById('outlet_map'), {
          zoom: 10,
          center: data
        });
        var marker = new google.maps.Marker({
          position: data,
          map: map
        });
        //Listen for any clicks on the map.
          google.maps.event.addListener(map, 'click', function(event) {                
              //Get the location that the user clicked.
              var clickedLocation = event.latLng;
              //If the marker hasn't been added.
              if(marker === false){
                  //Create the marker.
                  marker = new google.maps.Marker({
                      position: clickedLocation,
                      map: map,
                      draggable: true //make it draggable
                  });
                  //Listen for drag events!
                  google.maps.event.addListener(marker, 'dragend', function(event){
                      markerLocation();
                  });
              } else{
                  //Marker has already been added, so just change its location.
                  marker.setPosition(clickedLocation);
              }
              //Get the marker's location.
              markerLocationNew(marker);
          });
      }
      
       function markerLocationNew(marker){
          //Get location.
          var currentLocation = marker.getPosition();
          var geocoder = new google.maps.Geocoder;
          //Add lat and lng values to a field that we can save.
          document.getElementById('latitude').value = currentLocation.lat(); //latitude
          document.getElementById('longitude').value = currentLocation.lng(); //longitude
          var latlng = {lat: currentLocation.lat(), lng: currentLocation.lng()};
          geocoder.geocode({'location': latlng}, function(results, status) {
            if (status === 'OK') {
              if (results[1]) {
                for (var component in componentForm) {
                  document.getElementById(component).value = '';
                  document.getElementById(component).disabled = false;
                }
                //console.log( JSON.stringify(results) );
                // Get each component of the address from the place details
                // and fill the corresponding field on the form.
                for (var i = 0; i < results[0].address_components.length; i++) {
                  var addressType = results[0].address_components[i].types[0];
                  if (componentForm[addressType]) {
                    var val = results[0].address_components[i][componentForm[addressType]];
                    document.getElementById(addressType).value = val;
                  }
                }
              } else {
                window.alert('No results found');
              }
            } else {
              window.alert('Geocoder failed due to: ' + status);
            }
          });
      }
      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }

      /*document.getElementById("map_error").onclick = function() {
        setTimeout(function(){ google.maps.event.trigger(map, "resize"); }, 1000);
      };*/
    </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB985jmPF1O1jxwIROcqBF8c2T2Jd563ZM&libraries=places&callback=initAutocomplete" async defer></script>
 </script>
      </script>

 