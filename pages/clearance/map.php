<!DOCTYPE html>
<html>

<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("Location: ../../login.php");
} else {
    ob_start();
    include('../head_css.php'); ?>
<script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <?php

        include "../connection.php";
        ?>
        <?php include('../header.php'); ?>

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php include('../sidebar-left.php'); ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Map
                    </h1>

                </section>

                <!-- Main content -->
                <section class="content">
                    <h2>I am a map</h2>
                    <!-- start map box -->
                    <div id='map' style='width: 100%; height: 70vh;'></div>
                    <script>
                    mapboxgl.accessToken = 'sk.eyJ1IjoiY2xicHVnYSIsImEiOiJjbHN0eWpsZHAwMG14MmtxazdjbWFwcGNhIn0.ywG5uWznarz3hHpU_rijJA';
                    //'sk.eyJ1IjoiY2xicHVnYSIsImEiOiJjbHN0eWpsZHAwMG14MmtxazdjbWFwcGNhIn0.ywG5uWznarz3hHpU_rijJA';
                    //'pk.eyJ1IjoiY29ucmFkNjE5IiwiYSI6ImNsbDU5bG5vODBneHczZmxvdnR1N21kdHEifQ.nb9wheVK-HBsz01DifodWg';
                    var map = new mapboxgl.Map({
                        container: 'map',
                        style: 'mapbox://styles/mapbox/streets-v12',
                        center: [125.54548960362786,7.076370001485557], // starting position
                        zoom: 15
                        

                    });
                    const geojson = {
                        type: 'FeatureCollection',
                        features: [
                            {
                                type: 'Feature',
                                geometry: {
                                    type: 'Point',
                                    coordinates: [-77.032, 38.913]
                                },
                                properties: {
                                    title: 'Mapbox',
                                    description: 'test123'
                                }
                            },
                            {
                                type: 'Feature',
                                geometry: {
                                type: 'Point',
                                coordinates: [-122.414, 37.776]
                            },
                            properties: {
                                title: 'Mapbox',
                                description: 'test3, test4'
                            }
    }
  ]
};
                    
                    // geolocation for mapbox
                    /*map.addControl(
                        new mapboxgl.GeolocateControl({
                        positionOptions: {
                        enableHighAccuracy: true
                    },
                    trackUserLocation: true
                        },
                        ),'bottom-right'
                    );*/
                    
                    /*const bounds = [
                        [-73.990593, 40.740121],
                        [-73.990593, 40.740121]
                    ];
                    map.setMaxBounds(bounds);*/

                    // an arbitrary start will always be the same
                    // only the end or destination will change
                    const start = [125.54548960362786,7.076370001485557];
                    </script>

                    <!-- end map box -->

                    <?php ?>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->

        <script>
        </script>

    <?php }

include "../footer.php"; ?>
    




    </body>

</html>