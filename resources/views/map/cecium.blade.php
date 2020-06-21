<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <script src="https://cesium.com/downloads/cesiumjs/releases/1.70.1/Build/Cesium/Cesium.js"></script>
  <link href="https://cesium.com/downloads/cesiumjs/releases/1.70.1/Build/Cesium/Widgets/widgets.css" rel="stylesheet">
</head>
<body>
  <div id="cesiumContainer" style="width: 80%; height:80%"></div>
  <script>
    Cesium.Ion.defaultAccessToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiIyMjJhOWNjMC01MzFmLTQ5OWUtYTY0My1lZjllMzhmMmU1M2QiLCJpZCI6Mjg0OTksInNjb3BlcyI6WyJhc3IiLCJnYyJdLCJpYXQiOjE1OTExNjQ2Mzh9.GUWfCByGKvtGWRnhsO563QdSqrHLSvT7PKMcL_iNcLs';
    var viewer = new Cesium.Viewer('cesiumContainer');
  </script>
</body>
</html>
