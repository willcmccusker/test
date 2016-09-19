$(document).ready(function(){
	console.log(Chart.defaults.global);
	// Chart.defaults.global.bar.backgroundColor = '#F0F0F0';
	// Chart.defaults.global.defaultColor = "#F0F0F0";
	// Chart.defaults.global.legend.fullWidth = false;
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
					// makeGraph("density_built_up_change", city);
					makeLine("population_line", city);
					makeChart("population_change_bar", city);

					makeStacked("urban_extent_composition_stacked_bar", city);
					makeChart("urban_extent_change_bar", city);

					makeLine("density_built_up_line", city);
					makeChart("density_built_up_change_bar", city);
					makeLine("density_urban_extent_line", city);
					makeChart("density_urban_extent_change_bar", city);

					makeChart("roads_in_built_up_area_bar", city, true);
					makeChart("roads_average_width_bar", city, true);
					makeStacked("roads_width_stacked_bar", city, true);
					// makePlotly("density_built_up_change", city);
					// makeChartist("density_built_up_change", city);
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



var makeStacked = function(prefix, city, vert){
	vert = typeof(vert) == "undefined" ? false : true;
	var ctx = $("#"+prefix);
	var field = prefix.replace("_stacked_bar", "");

	var data = vert ? {
		labels : ["Pre-1990", "1990-2015"],
		datasets:[
			{
				backgroundColor : 'rgba(94, 151, 246, 1)',
				borderWidth : 0,
				borderColor : 'rgba(94, 151, 246, 1)',
				label : '<4m',
				data : [city.DataSet[field+"_under_4_pre_1990"], city.DataSet[field+"_under_4_1990_2015"] ]
			},
			{
				backgroundColor : 'rgba(28, 68, 135, 1)',
				borderWidth : 0,
				borderColor : 'rgba(28, 68, 135, 1)',
				label : '4-8m',
				data : [city.DataSet[field+"_4_8m_pre_1990"], city.DataSet[field+"_4_8m_1990_2015"] ]
			},
			{
				backgroundColor : 'rgba(242, 166, 1, 1)',
				borderWidth : 0,
				borderColor : 'rgba(242, 166, 1, 1)',
				label : '8-12m',
				data : [city.DataSet[field+"_8_12m_pre_1990"], city.DataSet[field+"_8_12m_1990_2015"] ]
			},
			{
				backgroundColor : 'rgba(14, 157, 88, 1)',
				borderWidth : 0,
				borderColor : 'rgba(14, 157, 88, 1)',
				label : '12-16m',
				data : [city.DataSet[field+"_12_16m_pre_1990"], city.DataSet[field+"_12_16m_1990_2015"] ]
			},
			{
				backgroundColor : 'rgba(171, 71, 188, 1)',
				borderWidth : 0,
				borderColor : 'rgba(171, 71, 188, 1)',
				label : '>16m',
				data : [city.DataSet[field+"_over_16_pre_1990"], city.DataSet[field+"_over_16_1990_2015"] ]
			}
		]

	}
	: {
		labels : ["T1", "T2", "T3"],
		datasets:[
			{
				backgroundColor: "rgba(120, 172, 255, 1)",
				borderWidth : 0,
				borderColor: "rgba(120, 172, 255 ,1)",
				label: ["Urban", "Built Up"],
				data : [city.DataSet[field+"_urban_t1"], city.DataSet[field+"_urban_t2"], city.DataSet[field+"_urban_t3"]]
			},
			{
				backgroundColor: "rgba(28, 68, 135, 1)",
				borderWidth : 0,
				borderColor: "rgba(28, 68, 135, 1)",
				label: ["Suburban", "Built Up"],
				data : [city.DataSet[field+"_suburban_t1"], city.DataSet[field+"_suburban_t2"], city.DataSet[field+"_suburban_t3"]]
			},
			{
				backgroundColor: "rgba(242, 166, 1,1)",
				borderWidth : 0,
				borderColor: "rgba(242, 166, 1,1)",
				label: ["Rural Built Up"],
				data : [city.DataSet[field+"_rural_t1"], city.DataSet[field+"_rural_t2"], city.DataSet[field+"_rural_t3"]]
			},
			{
				backgroundColor: "rgba(14, 157, 88, 1)",
				borderWidth : 0,
				borderColor: "rgba(14, 157, 88, 1)",
				label: ["Urbanized", "Open Space"],
				data : [city.DataSet[field+"_open_t1"], city.DataSet[field+"_open_t2"], city.DataSet[field+"_open_t3"]]
			}
		]
	};

	console.log(data);

	//legendTemplate takes a template as a string, you can populate the template with values from your dataset 
	// var options = {
	// legendTemplate : '<ul>'
	// 				+'<% for (var i=0; i<datasets.length; i++) { %>'
	// 				+'<li>'
	// 				+'<span style=\"background-color:<%=datasets[i].lineColor%>\"></span>'
	// 				+'<% if (datasets[i].label) { %><%= datasets[i].label %><% } %>'
	// 				+'</li>'
	// 			+'<% } %>'
	// 			+'</ul>'
	// }

	//don't forget to pass options in when creating new Chart
	// var lineChart = new Chart(element).Line(data, options);

	//then you just need to generate the legend
	// var legend = lineChart.generateLegend();

	//and append it to your page somewhere
	// $('#chart').append(legend);

	var yAxes = [{
		scaleLabel : {
			display: false,
			labelString: "",
		},
		ticks: {
			beginAtZero:true
		},
		stacked : true,
		gridLines : {
			display: false
		},
		categoryPercentage : 0.6,
		barPercentage : 1,
		
	}];
	var xAxes = [{
		stacked : true,
		ticks: {
			beginAtZero:true,
			max : 100,
			callback: function(value, index, values) {
				return  value+"%";
			}
		},
		gridLines : {
			display: false
		},
	}];
	var myChart = new Chart(ctx, {
		type: vert ? 'bar' : 'horizontalBar',
		data: data,
		options: {
			legend : {
				// display: false,
				position: "right",
				labels : {
					boxWidth : 10,
					// generateLabels: function(chart, e){console.log(e);console.log(chart);}
				}
			},
			tooltips : {
				display : true
			},
			title: {
				display: true,
				text: $(ctx).data("title")
			},
			responsive : true,
			scales: {
				yAxes: vert ? xAxes : yAxes,
				xAxes: vert ? yAxes : xAxes
			}
		}
	});
};

var makeLine = function(prefix, city){
	var ctx = $("#"+prefix);
	var field = prefix.replace("_line", "");
	var data = {
			labels : ["", "T1", "T2", "T3", ""],
			datasets: [{
				pointRadius: 5,	
				borderJoinStyle : "miter",
				lineTension : 0,
				borderWidth : 3,
				borderColor : "black",
				pointBorderColor : "black",
				pointBorderWidth : 1,	
				fill : false,	
				label : ctx.data("title"),
				data : [null, city.DataSet[field+"_t1"], city.DataSet[field+"_t2"], city.DataSet[field+"_t3"], null]
			}]
		};
	var max = Math.max.apply( Math, data.datasets[0].data );
	var min = Math.min.apply( Math, data.datasets[0].data.filter(Boolean));
	var log = Math.floor(Math.log(max)/Math.log(10));
	log = Math.pow(10, log);
	var myChart = new Chart(ctx, {
		type : "line",
		data : data,
		options: {
			title: {
				display: true,
				text: $(ctx).data("title")
			},
			legend : {
				display: false
			},
			scales : {
				yAxes : [{
					ticks: {
						min : 0,
						max : Math.floor((max + min)/log) * log,
						callback: function(value, index, values) {
							if(parseInt(value) > 1000){
								return  value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
							} else {
								return  value;
							}
						}
					}
				}]
			}
		}
	});
};

var makeChart = function(prefix, city, side){
	side = typeof(side) == "undefined" ? false : true;
	console.log(side);
	var ctx = $("#"+prefix);
	var field = prefix.replace("_bar", "");
	var suffix_1 = side ? "_pre_1990" : "_t1_t2";
	var suffix_2 = side ? "_1990_2015" : "_t2_t3";
	var data = {
		labels: [city.City.name, "Region",/*city.Region.name.split(" "),*/ "World"],
		datasets: [{
			label: side ? "Pre-1990" : 'T1-T2',
			backgroundColor: "rgba(255,0,0,0.2)",
			borderWidth : 1,
			borderColor: "rgba(255,0,0,1)",
			data : [city.DataSet[field+suffix_1], city.Region.DataSet[field+suffix_1], city.World.DataSet[field+suffix_1]]
		},{
			label: side ? "1990-2015" : 'T2-T3',
			backgroundColor: "rgba(0,0,255,0.2)",
			borderWidth : 1,
			borderColor: "rgba(0,0,255,1)",
			data : [city.DataSet[field+suffix_2], city.Region.DataSet[field+suffix_2],  city.World.DataSet[field+suffix_2]]
		}
		]
	};

	var max1 = Math.max.apply( Math, data.datasets[0].data );
	var max2 = Math.max.apply( Math, data.datasets[0].data );
	var max = max1 > max2 ? max1 : max2;
	var log = Math.floor(Math.log(max)/Math.log(10));
	log = Math.pow(10, log);
	max = Math.floor((max * 1.9)/log) * log;

	var yAxes = [{
		scaleLabel : {
			display: false,
			labelString: "",
		},
		ticks: {
			beginAtZero:true,
			// max : max,
			callback: function(value, index, values) {
				return  side ? Math.floor(value*100)/100 : value+"%";
			}
		},
		// stacked : true,
	}];
	var xAxes = [{
		// stacked : true,
		ticks: {
			beginAtZero:true
		},
		gridLines : {
			display: false
		},
	}];
	var myChart = new Chart(ctx, {
		type: side ? 'horizontalBar' : 'bar',
		data: data,
		options: {
			legend : {
				position: "right",
				labels : {
					boxWidth : 10,
					// generateLabels: function(chart, e){console.log(e);console.log(chart);}
				}
			},
			responsive : true,
			maintainAspectRation : true,
			gridLines : {
					display: false
				},
			tooltips : {
				display : true
			},
			title: {
				display: true,
				text: $(ctx).data("title")
			},
			scales: {
				yAxes: side ? xAxes : yAxes,
				xAxes: side ? yAxes : xAxes
			}
		}
	});
};











