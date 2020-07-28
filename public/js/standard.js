var center_map ;
var draw;
var dragZoom;
var source;
var vector;
var datas = [];
var labels = [];
var vectorLayer;
var vectorSource = new ol.source.Vector({
	features: []
});
var isLogin = false;
var vector_kml;
var style_modify;

$(function () {
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name="_token"]').attr('content')
		}
	});
});
function init(){
	$('#upload').attr('disabled', true);
	init_map(resize_map_style,map_event);

}
function resize_map_style() {

	$("#map div.ol-overviewmap.ol-custom-overviewmap.ol-unselectable.ol-control.ol-uncollapsible").css("top", "5px").css("bottom", "auto").css("left", "auto").css("right", "5px");
	$("#map div.ol-scale-line.ol-unselectable").css("left", "auto").css("right", "5px");
}

    
function map_event(){

	center_map.on('click',function(e){

	});

}

function init_map(callback01,callback02){

	var center_scaleLineControl = new ol.control.ScaleLine({
    });

    var OSM_baseLayer = new ol.layer.Tile({
        visible: true,
        preload: Infinity,
        source: new ol.source.OSM({
            key: 'AphfyWsW8T9h2m7UnPu0LVDRD93iuJOHQa51y_vDbBug7Zx5XPUJM3mcs9gIHIUr',
            imagerySet: 'AerialWithLabels', //Aerial or 'Road', 'AerialWithLabels', etc.
            maxZoom: 19,
				}),
				
    });

	center_map = new ol.Map({
		controls: ol.control.defaults({
			attributionOptions: /** @type {olx.control.AttributionOptions} */ ({
				collapsible: false
			})
		}).extend([
			new ol.control.Zoom({
				className: 'custom-zoom'
			})
		]),
		interactions: ol.interaction.defaults().extend([
			new ol.interaction.DragRotateAndZoom(),
			new ol.interaction.MouseWheelZoom()
		]),

		layers: [OSM_baseLayer

		],

		target: document.getElementById('map'),
		view: new ol.View({

			center: ol.proj.fromLonLat([120.8718112, 23.8502971]),
			zoom: 8,
			maxZoom: 19,
			minZoom: 2,
			enbaleRotation: false
		})
	});

	source = new ol.source.Vector({
        wrapX: false
    });
	vector = new ol.layer.Vector({
        source: source
    });
	center_map.addLayer(vector);

	vectorLayer = new ol.layer.Vector({
        source: vectorSource
    });
	center_map.addLayer(vectorLayer);

	style_modify = new ol.style.Style({
		stroke: new ol.style.Stroke({
			width: 6,
			color: [123, 160, 52, 1]
		}),
		fill: new ol.style.Fill({
			color: [220, 249, 164, 0.5]
		})
		});
	var element = document.getElementById('popup');

	var popup = new ol.Overlay({
		element: element,
		positioning: 'center',
		stopEvent: false,
		offset: [0, -20]
	});

	center_map.addOverlay(popup);
	var url = "Sitedata";
	// display popup on click
	center_map.on('click', function (evt) {
		
		var feature = center_map.forEachFeatureAtPixel(evt.pixel,
			function (feature) {
				return feature;
			});
		if (feature) {
		$('#sitedata').show();
		var coordinates = feature.getGeometry().getCoordinates();
		popup.setPosition(coordinates);
			$.ajax({
				url: url,
				type: 'POST',
				data: {
						'SiteId': feature.get('name')
				},
				success: function (data) {
					var div_sitedata = $(data).find("#sitedata");
					//alert(data.success);
					$("#sitedata").empty().html(div_sitedata);
				}
				});
	}
	});
	callback01();
	callback02();
}
function clear_vector()
{
	vectorSource.clear();
}
function addPointByCoord(Latitude, Longitude, SiteId, AQI) {
	var Latitude = parseFloat(Latitude)
	var Longitude = parseFloat(Longitude)
	var AQI = parseFloat(AQI)
	var icon_green = './images/triangle(green).png';
	var icon_yellow = './images/triangle(yellow).png';
	var feature = new ol.Feature({
		geometry: new ol.geom.Point(ol.proj.fromLonLat([Longitude, Latitude])),
		name: SiteId
	});
	if (AQI >= 50){
		var iconStyle = new ol.style.Style({
			image: new ol.style.Icon(({
				src: icon_yellow}))
		});
	} else {
		var iconStyle = new ol.style.Style({
			image: new ol.style.Icon(({
				src: icon_green}))
		});
	}
	feature.setStyle(iconStyle);
	vectorSource.addFeature(feature);
}
