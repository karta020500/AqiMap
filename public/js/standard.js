var center_map;
var draw;
var dragZoom;
var source;
var vector;
var vectorLayer;
var vectorSource = new ol.source.Vector({
	features: []
});;
var isLogin = false;
var vector_kml;

var style_modify;

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
            maxZoom: 19
        })
    });

	center_map = new ol.Map({
		controls: ol.control.defaults({
			attributionOptions: /** @type {olx.control.AttributionOptions} */ ({
				collapsible: false
			})
		}).extend([
            new ol.control.OverviewMap(),
            center_scaleLineControl,
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

		target: "map",
		view: new ol.View({

			center: ol.proj.transform([121.617203, 25.055653], 'EPSG:4326', 'EPSG:900913'),
			projection: "EPSG:900913",
            extent: ol.proj.transform([114.024543, 20.4267532245471, 16474217.640085237, 5813315.416422882], 'EPSG:4326', 'EPSG:900913'),
			zoom: 5,
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

	callback01();
	callback02();
}

var polyCoords = [];

function clear_vector()
{
	vectorSource.clear();
}

function addPointByCoord(Latitude, Longitude) {

	var feature = new ol.Feature({
		geometry: new ol.geom.Point(ol.proj.fromLonLat([parseFloat(Longitude), parseFloat(Latitude)])),
	});

	var iconStyle = new ol.style.Style({
		image: new ol.style.Icon(({
			src: './images/mask.png'
		}))
	});
	feature.setStyle(iconStyle);
	vectorSource.addFeature(feature);
}
