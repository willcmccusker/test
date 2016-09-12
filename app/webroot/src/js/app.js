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
					makeGraph("density_change", city);
					makeChart("density_change", city);
					makePlotly("density_change", city);
					makeChartist("density_change", city);
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


var makeChartist = function(prefix, city){
	var data = {
		labels : [city.City.name, city.Region.name, "World"],
		series : [
			[city.DataSet[prefix+"_t1_t2"], city.Region.DataSet[prefix+"_t1_t2"], city.World.DataSet[prefix+"_t1_t2"]],
			[city.DataSet[prefix+"_t2_t3"], city.Region.DataSet[prefix+"_t2_t3"], city.World.DataSet[prefix+"_t2_t3"]],
		],
		axisX: {
			labelInterpolationFnc: function (value) {
				return value;
			}
		}
	};

	var options = {
		seriesBarDistance: 55
	};
	var chart = new Chartist.Bar('#'+prefix+"-chartist", data, options);
chart.on('draw', function(context) {
	  if(context.type === 'bar') {
			console.log(context);
			context.element.attr({
				style : 'stroke: '+ (context.seriesIndex % 2 === 0 ? "red" : "blue")+";"
			});
		}

});

};

var makePlotly = function(prefix, city){
	console.log(prefix+'-plotly');
	var trace1 = {
	  x: [city.City.name, city.Region.name, 'World'],
	  y: [city.DataSet[prefix+"_t1_t2"], city.Region.DataSet[prefix+"_t1_t2"], city.World.DataSet[prefix+"_t1_t2"]],
	  name: 'T1-T2',
	  type: 'bar'
	};

	var trace2 = {
	  x: [city.City.name, city.Region.name, 'World'],
	  y: [city.DataSet[prefix+"_t2_t3"], city.Region.DataSet[prefix+"_t2_t3"], city.World.DataSet[prefix+"_t2_t3"]],
	  name: 'T2-T3',
	  type: 'bar'
	};

	var data = [trace1, trace2];

	var layout = {barmode: 'group'};

	Plotly.newPlot(prefix+'-plotly', data, layout, {displayModeBar: false});
};


googleChartsReady = function(){
	makeGoogleChart("density_change", city);
};


var makeGoogleChart = function(prefix, city){
 // var data = new google.visualization.DataTable();
 // data.addColumn('string', "Location");
 // data.addColumn('number', "T1-T2");
 // data.addColumn('number', "T2-T3");
 // data.addColumn('style', "Style");
 // var tableData = [
 //        [city.City.name, parseFloat(city.DataSet[prefix+"_t1_t2"]), parseFloat(city.DataSet[prefix+"_t1_t2"])],
 //        [city.Region.name, parseFloat(city.Region.DataSet[prefix+"_t1_t2"]), parseFloat(city.Region.DataSet[prefix+"_t1_t2"])],
 //        ["World", parseFloat(city.GDP.DataSet[prefix+"_t1_t2"]), parseFloat(city.GDP.DataSet[prefix+"_t1_t2"])],
 //  ];
 //  console.log(tableData);
 // data.addRows(tableData);  

  var jsonTable = {
  'cols' : [
	  {id:"", "label" : "", "type" : "string"},
	  {id:"", "label" : "T1-T2", "type" : "number"},
	  {id:"", "label" : "T2-T3", "type" : "number"},
  ],
	"rows" : [
		{"c" : [
			{"v" : city.City.name, "f" : null},
			{"v" : parseFloat(city.DataSet[prefix+"_t1_t2"]), "f" : null},
			{"v" : parseFloat(city.DataSet[prefix+"_t2_t3"]), "f" : null},
		]},
		{"c" : [
			{"v" : city.Region.name, "f" : null},
			{"v" : parseFloat(city.Region.DataSet[prefix+"_t1_t2"]), "f" : null},
			{"v" : parseFloat(city.Region.DataSet[prefix+"_t2_t3"]), "f" : null},
		]},
		{"c" : [
			{"v" : "World", "f" : null},
			{"v" : parseFloat(city.GDP.DataSet[prefix+"_t1_t2"]), "f" : null},
			{"v" : parseFloat(city.GDP.DataSet[prefix+"_t2_t3"]), "f" : null},
		]},
	]};
	console.log(jsonTable);
	var data = new google.visualization.DataTable(jsonTable);


  
      var view = new google.visualization.DataView(data);

      var options = {
          	'width':500,
            'height':500,
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
          vAxis:{
          	// format : "percent"
          }
      };

      var chart = new google.visualization.ColumnChart(document.getElementById(prefix+"-googleChart"));
      chart.draw(data, options);


};

var makeChart = function(prefix, city){
	var ctx = $("#"+prefix+"-chartjs");
	var myChart = new Chart(ctx, {
	    type: 'bar',
	    data: {
	        labels: [city.City.name, city.Region.name, "World"],
	        datasets: [{
	            label: 'T1-T2',
	            backgroundColor: "rgba(255,0,0,0.2)",
	            borderWidth : 1,
	            borderColor: "rgba(255,0,0,1)",
	            data : [city.DataSet[prefix+"_t1_t2"], city.Region.DataSet[prefix+"_t1_t2"], city.World.DataSet[prefix+"_t1_t2"]]
	        },{
	            label: 'T2-T3',
	            backgroundColor: "rgba(0,0,255,0.2)",
	            borderWidth : 1,
	            borderColor: "rgba(0,0,255,1)",
	            data : [city.DataSet[prefix+"_t2_t3"], city.Region.DataSet[prefix+"_t2_t3"],  city.World.DataSet[prefix+"_t2_t3"]]
	        }
	        ]
	    },
	    options: {

	    	bar : {
	    		categoryPercentage : 0.5,
	    		barPercentage : 1,
		    	gridLines : {
		    		display: false
		    	},
	    	},
	    	gridLines : {
		    		display: false
		    	},
	    	tooltips : {
	    		display : true
	    	},
	    	title: {
	    		display: true,
	    		text: prefix
	    	},
	    	responsive : true,

	        scales: {
	        	yAxes:[{
	        		scaleLabel : {
	        			display: true,
	        			labelString:"Precentage of Change"
	        		},
	        		height : 500
	        	}],
	            xAxes: [{
	                ticks: {
	                    // beginAtZero:true
	                },
	                gridLines : {
			    		display: false
			    	},
	            }]
	        }
	    }
	});
};



var makeGraph = function(prefix, city){
	console.log(city);
	var colorScale = new Plottable.Scales.Color();

	var yScale = new Plottable.Scales.Linear();
	var yAxis = new Plottable.Axes.Numeric(yScale, "left");

	var title = new Plottable.Components.TitleLabel(prefix);

	var cityData = [{x:1, y : parseFloat(city.DataSet[prefix+"_t1_t2"]), label: "T1-T2"}, {x:2, y : parseFloat(city.DataSet[prefix+"_t2_t3"]), label: "T2-T3"}];
	var xScale_city = new Plottable.Scales.Category().domain(["T1-T2", "T2-T3"]);
	var xAxis_city = new Plottable.Axes.Category(xScale_city, "bottom");
	var plot_city = new Plottable.Plots.Bar()
	.labelsEnabled(true)
	.animated(true)
	.x(function(d) { return d.label; }, xScale_city)
	.y(function(d) { return d.y; }, yScale)
	.attr("fill", function(d) { return d.x % 2 == 1 ? "#0000FF" : "#FF0000" ;}, colorScale);
	var label_city = new Plottable.Components.AxisLabel(city.City.name, 0);


	var regionData = [{x:3, y : parseFloat(city.Region.DataSet[prefix+"_t1_t2"]), label: "T1-T2"}, {x:4, y : parseFloat(city.Region.DataSet[prefix+"_t2_t3"]), label: "T2-T3"}];
	var xScale_region = new Plottable.Scales.Category().domain(["T1-T2", "T2-T3"]);
	var xAxis_region = new Plottable.Axes.Category(xScale_region, "bottom");
	var plot_region = new Plottable.Plots.Bar()
	.labelsEnabled(true)
	.animated(true)
	.x(function(d) { return d.label; }, xScale_region)
	.y(function(d) { return d.y; }, yScale)
	.attr("fill", function(d) { return d.x % 2 == 1 ? "#0000FF" : "#FF0000" ;}, colorScale);
	var label_region = new Plottable.Components.AxisLabel(city.Region.name, 0);


	var worldData = [{x:5, y : parseFloat(city.GDP.DataSet[prefix+"_t1_t2"]), label: "T1-T2"}, {x:6, y : parseFloat(city.GDP.DataSet[prefix+"_t2_t3"]), label: "T2-T3"}];
	var xScale_world = new Plottable.Scales.Category().domain(["T1-T2", "T2-T3"]);
	var xAxis_world = new Plottable.Axes.Category(xScale_world, "bottom");
	var plot_world = new Plottable.Plots.Bar()
	.labelsEnabled(true)
	.animated(true)
	.x(function(d) { return d.label; }, xScale_world)
	.y(function(d) { return d.y; }, yScale)
	.attr("fill", function(d) { return d.x % 2 == 1 ? "#0000FF" : "#FF0000" ;}, colorScale);
	var label_world = new Plottable.Components.AxisLabel("World", 0);



	console.log(JSON.stringify(cityData));
	console.log(JSON.stringify(regionData));


	var chart = new Plottable.Components.Table([
	  [title],
	  [yAxis, plot_city, plot_region, plot_world],
	  [null, xAxis_city, xAxis_region, xAxis_world],
	  [null, label_city, label_region, label_world]
	]);

	chart.renderTo("svg#"+prefix+"-plottable");

	setTimeout(function(){
		plot_city.addDataset(new Plottable.Dataset(cityData)).labelsEnabled();
		plot_region.addDataset(new Plottable.Dataset(regionData)).labelsEnabled();
		plot_world.addDataset(new Plottable.Dataset(worldData)).labelsEnabled();
	}, 1000);

	window.addEventListener("resize", function() {
	  chart.redraw();
	});



	// var xScale_region


	// var xScale_population


	// var xScale_GDP


};










