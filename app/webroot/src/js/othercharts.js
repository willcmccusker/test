
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
	  type: 'bar',
  	  marker: {
		  color: '#FF0000'
		}
	};

	var trace2 = {
	  x: [city.City.name, city.Region.name, 'World'],
	  y: [city.DataSet[prefix+"_t2_t3"], city.Region.DataSet[prefix+"_t2_t3"], city.World.DataSet[prefix+"_t2_t3"]],
	  name: 'T2-T3',
	  type: 'bar',
	  marker: {
		  color: '#0000FF'
		}
	};

	var data = [trace1, trace2];

	var layout = {barmode: 'group'};

	Plotly.newPlot(prefix+'-plotly', data, layout, {displayModeBar: false});
};


googleChartsReady = function(){
	makeGoogleChart("density_built_up_change", city);
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
			{"v" : parseFloat(city.World.DataSet[prefix+"_t1_t2"]), "f" : null},
			{"v" : parseFloat(city.World.DataSet[prefix+"_t2_t3"]), "f" : null},
		]},
	]};
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
	console.log(document.getElementById(prefix+"-googleChart"));
	var chart = new google.visualization.ColumnChart(document.getElementById(prefix+"-googleChart"));
	chart.draw(data, options);


	data2 = new google.visualization.DataTable();
	data2.addColumn('date', 'Year');
	data2.addColumn('number', 'Density');
	data2.addRows([
		[ new Date(1980, 0, 1), 2457970], [new Date(1990, 0, 1), 2956780], [new Date(2000, 0, 1), 3890876]
		]);
	options2 = {
		legend: {position: 'none'},
		width : 600,
		height: 500,
		pointSize : 5,
        hAxis: {
        	gridlines : {
        		count : 4
        	},
          title: 'Year',
          viewWindow : {
          	max : new Date(2005, 1, 1),
          	min : new Date(1975, 1, 1)
          },
        },
        vAxis: {

        	gridlines : {
        		count : 5
        	},
          title: 'Density',
          format : 'short',
		viewWindow : {
			max : 5500000,
			min : 0
		}
        },
        backgroundColor: '#ffffff'
      };

      var chart2 = new google.visualization.LineChart(document.getElementById('density_line-googleChart'));
      chart2.draw(data2, options2);
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


	var worldData = [{x:5, y : parseFloat(city.World.DataSet[prefix+"_t1_t2"]), label: "T1-T2"}, {x:6, y : parseFloat(city.World.DataSet[prefix+"_t2_t3"]), label: "T2-T3"}];
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
