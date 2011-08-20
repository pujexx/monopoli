$(document).ready(function(){

    $('.map').gmap3(
    {
        action: 'init',
        center:[44.797916,-93.278046],
        onces: {
            bounds_changed: function(){
                $(this).gmap3({
                    action:'getBounds',
                    callback: function (bounds){
                        if (!bounds) return;
                        var southWest = bounds.getSouthWest();
                        var northEast = bounds.getNorthEast();
                        var lngSpan = northEast.lng() - southWest.lng();
                        var latSpan = northEast.lat() - southWest.lat();
                        for (var i = 0; i < 10; i++) {
                            add($(this), i, southWest.lat() + latSpan * Math.random(), southWest.lng() + lngSpan * Math.random());
                        }
                    }
                });
            }
        }
    }
    );

    function add($this, i, lat, lng){
        $this.gmap3({
            action : 'addMarker',
            lat: lat,
            lng: lng,
            callback: function(marker){
                var $button = $('<span> [ '+i+' ] </span>');
                $button
                .click(function(){
                    $this.gmap3({
                        action:'panTo',
                        args:[marker.position]
                    });
                })
                .css('cursor','pointer');
                $('#panTo').append($button);
            }
        });
    }
});
