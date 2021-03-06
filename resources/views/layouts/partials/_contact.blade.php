<section class="bg-contact bg-section" id="contact">
        <div class="container-fluid">
            <h1 class="container-h1">Contact us</h1>
            <div class="row slideanim">
                <div class="col-md-6 col-sm-6 contact-left">
                    <div class="left-box">
                        <address class="contact">
                            <span class="span-contact">Call:</span>
                            <br>
                            +091 1234 5678
                            <br> 
                            <span class="span-contact">Email:</span> 
                            <br>
                            northstreet@gmail.com
                            <br>
                            <span class="span-contact">Visit:</span>  
                            <br>
                            22, Northstreet Road
                            <br>
                            Melbourne, Victoria
                            <br>
                            Australia
                        </address>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 contact-right" >
                            
                            <form novalidate action="mailto:anttnew@gmmmail.com" name="frm" method="post">
                                 <div class="form-group has-feedback">
                                    <label class="sr-only">First name:</label>
                                    <input type="text" name="name" class="form-control" placeholder="First name" required>
                                    
                                </div>
                                 <div class="form-group has-feedback">
                                    <label class="sr-only">Last name:</label>
                                    <input type="text" name="surname" class="form-control" placeholder="Last name" required>
                                    
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="sr-only">Email:</label>
                                    <input type="email" name="email" class="form-control"  placeholder="Email" required>
                                    
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" name="comment" for="comment">Comment:</label>
                                    <textarea class="form-control" rows="5" id="comment" placeholder="Description"></textarea>
                                </div>
                                <div class="contact-buttons pull-left">
                                    <input type="submit" name="submit"  value="Send" />
                                    <input type="reset" value="Reset" />
                                </div>
                            </form>
                            
                </div>
            </div>
            <div class="row">
                <div id="googleMap" style="height:300px;width:100%;"></div>

                <!-- Add Google Maps -->
                <script src="http://maps.googleapis.com/maps/api/js"></script>
                <script>
                var myCenter = new google.maps.LatLng(-37.817110, 144.959128);

                function initialize() {
                var mapProp = {
                  center:myCenter,
                  zoom:12,
                  scrollwheel:false,
                  draggable:false,
                  mapTypeId:google.maps.MapTypeId.ROADMAP
                  };

                var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

                var marker = new google.maps.Marker({
                  position:myCenter,
                  });

                marker.setMap(map);
                }

                google.maps.event.addDomListener(window, 'load', initialize);
                </script>
            </div>
        </div>    
    </section>