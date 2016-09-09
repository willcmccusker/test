$(document).ready(function(){

	var route = window.location.href.split("//")[1].split("/").filter(function(e){ return e === 0 || e; });
	var model = false;
	var controller = "index";
	var params = false;

	$(route).each(function(i,e){
		switch(i){
			case(0):
				//domain
			break;
			case(1):
				switch(e){
					case("about"):
						model = "pages";
						controller = "about";
					break;
					case("data"):
						model = "cities";
						controller = "data";
					break;
					default:
					model = e;
				}
			break;
			case(2):
				controller = e;
			break;
			case(3):
				params = [e];
			break;
			default:
				params.push(e);
		}
	});

	switch(model){
		case(false):
			//map
			console.log("map");
		break;
		case("cities"):
			switch(controller){
				case("index"):
					//filter list
					var cityList = new List('cityList', {valueNames: [ 'city', 'region' ]});
				break;
				case("data"):
					//table
					$("table").stupidtable();
				break;
				case("view"):
					//graphs
					// makeGraph("density_change", city);


				break;
				default:
			}
		break;
		case("pages"):
			switch(controller){
				case("about"):

				break;
				default:
				console.log(controller);
			}
		break;
		default:
			console.log(model);
	}
	console.log(model);
	console.log(controller);
});



var makeGraph = function(prefix, city){
	console.log(city);
	var colorScale = new Plottable.Scales.Color();

	var yScale = new Plottable.Scales.Linear();
	var yAxis = new Plottable.Axes.Numeric(yScale, "left");

	var title = new Plottable.Components.TitleLabel(prefix);

	var cityData = [{x:1, y : city.DataSet[prefix+"_t1_t2"], label: "Pre-1990"}, {x:2, y : city.DataSet[prefix+"_t2_t3"], label: "1990-2015"}];
	var xScale_city = new Plottable.Scales.Category().domain(["Pre-1990", "1990-2015"]);
	var xAxis_city = new Plottable.Axes.Category(xScale_city, "bottom");
	var plot_city = new Plottable.Plots.Bar()
	.labelsEnabled(true)
	.animated(true)
	.x(function(d) { return d.label; }, xScale_city)
	.y(function(d) { return d.y; }, yScale)
	.attr("fill", function(d) { return d.x % 2 == 1 ? "#0000FF" : "#FF0000" ;}, colorScale);
	var label_city = new Plottable.Components.AxisLabel(city.City.name, 0);


	var regionData = [{x:5, y : city.Region.DataSet[prefix+"_t1_t2"], label: "Pre-1990"}, {x:6, y : city.Region.DataSet[prefix+"_t2_t3"], label: "1990-2015"}];
	var xScale_region = new Plottable.Scales.Category().domain(["Pre-1990", "1990-2015"]);
	var xAxis_region = new Plottable.Axes.Category(xScale_region, "bottom");
	var plot_region = new Plottable.Plots.Bar()
	.labelsEnabled(true)
	.animated(true)
	.x(function(d) { return d.label; }, xScale_region)
	.y(function(d) { return d.y; }, yScale)
	.attr("fill", function(d) { return d.x % 2 == 1 ? "#0000FF" : "#FF0000" ;}, colorScale);
	var label_region = new Plottable.Components.AxisLabel(city.Region.name, 0);



	console.log(JSON.stringify(cityData));
	console.log(JSON.stringify(regionData));


	var chart = new Plottable.Components.Table([
	  [title],
	  [yAxis, plot_city, plot_region],
	  [null, xAxis_city, xAxis_region],
	  [null, label_city, label_region]
	]);

	chart.renderTo("svg#"+prefix);

	setTimeout(function(){
		plot_city.addDataset(new Plottable.Dataset(cityData)).labelsEnabled();
		plot_region.addDataset(new Plottable.Dataset(regionData)).labelsEnabled();
	}, 1000);

	window.addEventListener("resize", function() {
	  chart.redraw();
	});



	// var xScale_region


	// var xScale_population


	// var xScale_GDP


};










