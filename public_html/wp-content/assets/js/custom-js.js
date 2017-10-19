 if (document.getElementById("map")) {
              var map_hgr5808a7966a028;
              var gmap_location_hgr5808a7966a028 = new google.maps.LatLng(GOOGLE_LAT, GOOGLE_LON);

              var GMAP_MODULE_hgr5808a7966a028 = "custom_style";

              function initialize() {
                
                var featureOpts = [
                      {
                        stylers: [
                        { "visibility": "on" },
                        { "weight": 1 },
                        { "saturation": -100 },
                        { "lightness": -8 },
                        { "gamma": 1.18 }
                        ]
                      }
                    ];
                var mapOptions = {
                  zoom: 14,
                  mapTypeControl: false,
                  scrollwheel: false,
                  center: gmap_location_hgr5808a7966a028,
                  mapTypeControlOptions: {
                    mapTypeIds: [google.maps.MapTypeId.ROADMAP, GMAP_MODULE_hgr5808a7966a028]
                  },
                  mapTypeId: GMAP_MODULE_hgr5808a7966a028
                };
                
                map_hgr5808a7966a028 = new google.maps.Map(document.getElementById("map"), mapOptions);
                
                marker_hgr5808a7966a028 = new google.maps.Marker({
                  map: map_hgr5808a7966a028,
                  draggable: false,
                  animation: google.maps.Animation.DROP,
                  position: gmap_location_hgr5808a7966a028,
                  icon: ""
                  });

                google.maps.event.addListener(marker_hgr5808a7966a028, "click", function() {
                  if (marker_hgr5808a7966a028.getAnimation() != null) {
                    marker_hgr5808a7966a028.setAnimation(null);
                  } else {
                    marker_hgr5808a7966a028.setAnimation(google.maps.Animation.BOUNCE);
                  }
                });

                var styledMapOptions = {
                  name: "Symphony Cloud"
                };

                var customMapType_hgr5808a7966a028 = new google.maps.StyledMapType(featureOpts, styledMapOptions);

                map_hgr5808a7966a028.mapTypes.set(GMAP_MODULE_hgr5808a7966a028, customMapType_hgr5808a7966a028);
              }

              google.maps.event.addDomListener(window, "load", initialize);
      }