<title>Peta Kabupaten Gianyar</title>
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class=" container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-xl-9">
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">
                                    Peta Kabupaten Gianyar
                                </h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="map" style="height:650px"></div>
                        </div>
                    </div>
            </div>
            <?php $this->load->view('layouts/partials/side.php'); ?>

        </div>
        <!--end::Row-->

    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
<script>
	  var map = L.map('map').setView([-8.5000047,115.1869968], 11);

	  L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=RR9o7QUfjAF8NvJ7jXkz', {
                attribution:  '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>' ,
            }).addTo(map);

		// Instantiate KMZ parser (async)
		var kmzParser = new L.KMZParser({
			onKMZLoaded: function(layer, name) {
				control.addOverlay(layer, name);
				layer.addTo(map);
			},

		});
		// Add remote KMZ files as layers (NB if they are 3rd-party servers, they MUST have CORS enabled)
		kmzParser.load('assets/gianyar.kmz');
		

	  var control = L.control.layers(null, null, { collapsed:true }).addTo(map);
	</script>