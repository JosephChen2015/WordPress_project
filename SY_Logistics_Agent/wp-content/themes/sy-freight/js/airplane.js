/**
     * ---------------------------------------
     * This demo was created using amCharts 4.
     *
     * For more information visit:
     * https://www.amcharts.com/
     *
     * Documentation is available at:
     * https://www.amcharts.com/docs/v4/
     * ---------------------------------------
*/

    // Themes begin
    am4core.useTheme(am4themes_animated)
    // Themes end

    // Create map instance
    var chart = am4core.create("chartdiv", am4maps.MapChart)

    // Set map definition
    chart.geodata = am4geodata_worldLow

    // Set projection
    chart.projection = new am4maps.projections.Miller()
    chart.homeZoomLevel = 2.5
    chart.homeGeoPoint = {
        latitude: 38,
        longitude: -60
    }

    // Create map polygon series
    var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries())

    // Make map load polygon (like country names) data from GeoJSON
    polygonSeries.useGeodata = true

    // Configure series
    var polygonTemplate = polygonSeries.mapPolygons.template
    polygonTemplate.tooltipText = "{name}"
    polygonTemplate.fill = chart.colors.getIndex(0).lighten(0.5)
    polygonTemplate.nonScalingStroke = true
    chart.maxZoomLevel = 1;
    chart.goHome(0);
    // Remove Antarctica
    polygonSeries.exclude = ["AQ"]

    // Global Location Data Collection sample data
    var dockPoints = [
        { latitude: 48.8567, longitude: 2.351, title: "Paris" },
        { latitude: 43.8163, longitude: -79.4287, title: "Toronto" },
        { latitude: 48.8567, longitude: 2.351, title: "Paris" },
        { latitude: 34.3, longitude: -118.15, title: "Los Angeles" },
        { latitude: 48.8567, longitude: 2.351, title: "Paris" },
        { latitude: 23, longitude: -82, title: "Havana" },
        { latitude: 48.8567, longitude: 2.351, title: "Paris" },
        { latitude: 51.5002, longitude: -0.1262, title: "London" }
    ]

    // Add city
    var cities = chart.series.push(new am4maps.MapImageSeries())
    cities.mapImages.template.nonScaling = true
    var city = cities.mapImages.template.createChild(am4core.Circle)
    city.radius = 6
    city.fill = chart.colors.getIndex(0).brighten(-0.2)
    city.strokeWidth = 2
    city.stroke = am4core.color("#fff")
    // Add City
    function addCity(points) {
        let city = cities.mapImages.create()
        city.latitude = points.latitude
        city.longitude = points.longitude
        city.tooltipText = points.title
        return city
    }

    // Add line series
    function addLine(from, to) {
        let lineSeries = chart.series.push(new am4maps.MapLineSeries())
        lineSeries.mapLines.template.strokeWidth = 2
        lineSeries.mapLines.template.strokeOpacity = 0.5
        lineSeries.mapLines.template.stroke = city.fill
        lineSeries.mapLines.template.nonScalingStroke = true
        lineSeries.mapLines.template.strokeDasharray = "1,1"
        lineSeries.zIndex = 10
        let line = lineSeries.mapLines.create()
        line.imagesToConnect = [from, to]
        return lineSeries.mapLines.getIndex(0)
    }

    // Create transppot network map
    function createTransportNetwork(points) {
        for (i = 0; i < points.length - 2; i += 2) {
            from = addCity(points[i])
            to = addCity(points[i + 2])
            addLine(from, to)
        }
    }

    // create a map object to line
    function createBullet(newLine) {
        bullet = newLine.lineObjects.create()
        bullet.position = 0
        bullet.width = 48
        bullet.height = 48
        bullet.adapter.add("scale", function(scale, target) {
            return 0.5 * (1 - Math.abs(0.5 - target.position))
        })
        return bullet
    }

    // create each line's airplane
    function createPlane(newBullet) {
        plane = newBullet.createChild(am4core.Sprite)
        plane.scale = 0.08
        plane.horizontalCenter = "middle"
        plane.verticalCenter = "middle"
        plane.path =
            "m2,106h28l24,30h72l-44,-133h35l80,132h98c21,0 21,34 0,34l-98,0 -80,134h-35l43,-133h-71l-24,30h-28l15,-47"
        plane.fill = chart.colors.getIndex(2).brighten(-0.2)
        plane.strokeOpacity = 0

        return plane
    }

    // calculate speed
    function distanceBetweenTwoPoints(from, to) {
        distance =
            Math.pow(from.latitude - to.latitude, 2) +
            Math.pow(from.longitude - to.longitude, 2)
        return Math.sqrt(distance)
    }

    // Plane animation in each transport line
    function goPlane(symbol, airplane, timelength) {
        // console.log(airplane)
        var from = symbol.position,
            to
        if (from == 0) {
            to = 1
            airplane.rotation = 0
        } else {
            to = 0
            airplane.rotation = 180
        }

        var animation = symbol.animate(
            {
                from: from,
                to: to,
                property: "position"
            },
            timelength,
            am4core.ease.sinInOut
        )

        animation.events.on("animationended", () =>
            goPlane(symbol, airplane, timelength)
        )
    }
    
    // Fly the plane Together!
    function airplaneTransport(points) {
        for (i = 0; i < points.length - 2; i += 2) {
            from = addCity(points[i])
            to = addCity(points[i + 1])
            let line = addLine(from, to)
            let bullet = createBullet(line)
            let plane = createPlane(bullet)
            goPlane(bullet, plane, 70 * distanceBetweenTwoPoints(from, to))
        }
    }

    createTransportNetwork(dockPoints)
    airplaneTransport(dockPoints)

