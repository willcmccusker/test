var tab = false;
var poppedUp = false;
var ready = false;
var drawComplete = true;
var searchPopup = function(){
	if(poppedUp){
		return false;
	}else{
		poppedUp = true;
	}
	$("#citySearch input").focus();
	$("body").addClass("no-scroll");
	$("#citySearch").addClass("poppedUp");
	$(".closeCitySearch").off("click").on("click", function(){
		searchPopdown();
	});
	console.log("search");
};
var searchPopdown = function(){
	$("#citySearch input").val("").blur();
	$("body").removeClass("no-scroll");
	$("#citySearch").removeClass("poppedUp");
	poppedUp = false;
};
var running = false;
/*var buildGraph = function(that){
	if(typeof($(that.element).data("built")) === "undefined"){
		var id = that.element.id;
		$(that.element).data("built", true);
		switchGraph(id);
		Waypoint.refreshAll();
	}
};*/

var buildGraphsInterval = setInterval(function(){
	if($(".city-graphic.done").length == $(".city-graphic").length){
		clearInterval(buildGraphsInterval);
	}else{
		if($(".city-graphic.ready:not(.done)").length > 0){
			$(".city-graphic.ready:not(.done)").each(function(){
				if(!drawComplete){

				}else{
					$(this).addClass("done");
					switchGraph($(this).attr("id"));
				}
			});
			console.log("refresh all");
			Waypoint.refreshAll();	
		}
	}
},600);

var switchGraph = function(id){
	console.log("build "+id);
	switch(id){
		case("population_line"):
		case("density_built_up_line"):
		case("density_urban_extent_line"):
			makeLine(id, city);
		break;
		case("population_change_bar"):
		case("urban_extent_change_bar"):
		case("density_built_up_change_bar"):
		case("density_urban_extent_change_bar"):
			makeChart(id, city);
		break;
		case("roads_in_built_up_area_bar"):
		case("roads_average_width_bar"):
		case("blocks_plots_average_block_bar"):
			makeChart(id, city, true);
		break;
		case("urban_extent_composition_stacked_bar"):
			makeStacked(id, city);
		break;
		case("roads_width_stacked_bar"):
			makeStacked(id, city, true);
		break;
		case("arterial_roads_density_bar"):
		case("arterial_roads_walking_bar"):
		case("arterial_roads_beeline_bar"):
			makeRoadChart(id, city);
		break;
		case("blocks_plots_average_bar"):
			makeBlockChart(id, city);
		break;
		default:
			console.log(id+" doesn't have a function");
	}
};
var loadNextFlag = function(){
	var lazy = $(".lazyimg").first();
	if(lazy.length === 0){
		return;
	}
	var img = new Image();
	img.onload = function(){
		$(lazy).attr("src", $(lazy).data("src")).removeClass("lazyimg");
		loadNextFlag();
	};
	img.onerror = function(){
		$(lazy).removeClass("lazyimg");
		loadNextFlag();
	};
	img.src = $(lazy).data("src");
};

$(document).ready(function(){

	loadNextFlag();

	$("#citySearch input").on("focus click", function(){
		searchPopup();
	});

	$(document).on("keyup", function(e) {
		if(e.keyCode == 91){
			tab = false;
		}
	});
	$(document).on("keydown", function(e) {
		if(tab){
			return;
		}
		console.log(e.keyCode);
		if(e.keyCode == 91){
			tab = true;
			return;
		}
		if (e.keyCode == 27 && poppedUp) { 
			searchPopdown();
			return;
		}
	    var regex = new RegExp("^[a-zA-Z0-9]+$");
	    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
	    if (regex.test(str) && !poppedUp) {
		     	searchPopup();
	    }

	});


	var citySearch = new List('citySearch', {valueNames: ['popup-city-country', 'popup-city-city', 'popup-city-region' ]});
	
	citySearch.on("updated", function(){
		if($("#citySearch input").val() !== ""){
			$("#citySearch").removeClass("unlisted");
		}else{
			$("#citySearch").addClass("unlisted");
		}
	});



	// console.log(Chart.defaults.global);
	// Chart.defaults.global.bar.backgroundColor = '#F0F0F0';
	// Chart.defaults.global.defaultColor = "#F0F0F0";
	// Chart.defaults.global.legend.fullWidth = false;
	Chart.defaults.global.defaultFontFamily = 'DINNextLTProLight';
	Chart.defaults.global.animation.onComplete = function(){
		drawComplete = true;
	};
	// Chart.defaults.global.animation.duration = 0;
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
					// var cityList = new List('cityList', {valueNames: ['country', 'city', 'region' ], sortFunction: sortCities});

				break;
				case("data"):
					//table
					$("table").stupidtable();
					$(".show-methodology").click(function(){
						if($(this).html() == "Show Methodology"){
							$(this).html("Hide Methodology");
						}else{
							$(this).html("Show Methodology");
						}
						$(".methodology").slideToggle();
					});
					$(".show-links").click(function(){
						var next = $(this).next(".expansion-links");
						$(next).css("z-index", 2);
						$(".hide-on-desktop .expansion-links").not(next).css("z-index", 1).slideUp();
						$(next).slideToggle();
					});
				break;
				case("view"):
					var wayDown = $('.city-graphic').waypoint(function(direction) {
						if(direction == "down"){
							// buildGraph(this);	
							$(this.element).addClass("ready");
						}
					}, {
						offset: '80%',
						// enabled: false,
					});

					//graphs
					// makeGraph("density_built_up_change", city);
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

var sortCities = function(a, b, c){
	console.log(a);
	console.log(b);
	console.log(c);
};


var makeStacked = function(prefix, city, vert){
	vert = typeof(vert) == "undefined" ? false : true;
	var ctx = $("#"+prefix);
	var field = prefix.replace("_stacked_bar", "");

	var data = vert ? {
		labels : ["Pre-1990", "1990-2015"],
		datasets:[
			{
				backgroundColor : '#889A9A',
				borderWidth : 0,
				borderColor : 'rgba(94, 151, 246, 1)',
				label : '<4m',
				data : [city.DataSet[field+"_under_4m_pre_1990"], city.DataSet[field+"_under_4m_1990_2015"] ]
			},
			{
				backgroundColor : '#93AFA9',
				borderWidth : 0,
				borderColor : 'rgba(87, 145, 117, 1)',
				label : '4-8m',
				data : [city.DataSet[field+"_4_8m_pre_1990"], city.DataSet[field+"_4_8m_1990_2015"] ]
			},
			{
				backgroundColor : '#9FC3B5',
				borderWidth : 0,
				borderColor : 'rgba(242, 166, 1, 1)',
				label : '8-12m',
				data : [city.DataSet[field+"_8_12m_pre_1990"], city.DataSet[field+"_8_12m_1990_2015"] ]
			},
			{
				backgroundColor : '#AED7C0',
				borderWidth : 0,
				borderColor : 'rgba(39, 48, 56, 1)',
				label : '12-16m',
				data : [city.DataSet[field+"_12_16m_pre_1990"], city.DataSet[field+"_12_16m_1990_2015"] ]
			},
			{
				backgroundColor : '#BFECCA',
				borderWidth : 0,
				borderColor : 'rgba(171, 71, 188, 1)',
				label : '>16m',
				data : [city.DataSet[field+"_over_16m_pre_1990"], city.DataSet[field+"_over_16m_1990_2015"] ]
			}
		]

	}
	: {
		labels : ["T1", "T2", "T3"],
		datasets:[
			{
				backgroundColor: "#B4A4AF",
				borderWidth : 0,
				borderColor: "rgba(120, 172, 255 ,1)",
				label: ["Urban Built Up"],
				data : [city.DataSet[field+"_urban_t1"], city.DataSet[field+"_urban_t2"], city.DataSet[field+"_urban_t3"]]
			},
			{
				backgroundColor: "#BDB8C2",
				borderWidth : 0,
				borderColor: "rgba(87, 145, 117, 1)",
				label: ["Suburban Built Up"],
				data : [city.DataSet[field+"_suburban_t1"], city.DataSet[field+"_suburban_t2"], city.DataSet[field+"_suburban_t3"]]
			},
			{
				backgroundColor: "#C6CCD4",
				borderWidth : 0,
				borderColor: "rgba(151, 194, 125, 1)",
				label: ["Rural Built Up"],
				data : [city.DataSet[field+"_rural_t1"], city.DataSet[field+"_rural_t2"], city.DataSet[field+"_rural_t3"]]
			},
			{
				backgroundColor: "#CDE0E4",
				borderWidth : 0,
				borderColor: "rgba(39, 48, 56, 1)",
				label: ["Urbanized Open Space"],
				data : [city.DataSet[field+"_open_t1"], city.DataSet[field+"_open_t2"], city.DataSet[field+"_open_t3"]]
			}
		]
	};


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
			fontFamily: "DINNextLTProLight",
			fontColor: "#4A4A4A",
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
			max : vert ? 1 : 100,
			callback: function(value, index, values) {
				return  vert ? Math.floor(value*100)/100 : value+"%";
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
					fontFamily: "DINNextLTProLight",
					fontColor: "#4A4A4A",
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
			labels : [ city.City.t1, city.City.t2, city.City.t3],
			datasets: [{
				pointRadius: 5,	
				borderJoinStyle : "miter",
				lineTension : 0,
				borderWidth : 1,
				borderColor : "#7b7b7b",
				pointBorderColor : "#7b7b7b",
				pointBorderWidth : 1,	
				fill : false,	
				label : ctx.data("title"),
				data : [city.DataSet[field+"_t1"], city.DataSet[field+"_t2"], city.DataSet[field+"_t3"]]
			}]
		};
	var max = Math.max.apply( Math, data.datasets[0].data );
	var min = Math.min.apply( Math, data.datasets[0].data.filter(Boolean));
	var log = Math.floor(Math.log(max)/Math.log(10));
	log = Math.pow(10, log);


	var dateStart = new Date(city.City.t1);
	// console.log(dateStart);

	var dateEnd = new Date(city.City.t3);
	// console.log(dateEnd);

	var dateSpan = dateEnd.getTime() - dateStart.getTime();
	// console.log(dateSpan);

	var dateMin = new Date(dateStart.getTime() - dateSpan);
	// console.log(dateMin);

	var dateMax = new Date(dateEnd.getTime() + dateSpan);
	// console.log(dateMax);

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
						max : Math.ceil((max + min)/log) * log,
						callback: function(value, index, values) {
							if(parseInt(value) > 1000){
								return  value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
							} else {
								return  value;
							}
						}
					}
				}],
				xAxes : [{
					type : 'time',
					time : {
						displayFormats : {
							quarter : 'MMM YYYY'
						},
						min : new Date("1975-01-01"),//dateMin,
						max : new Date("2030-01-01")//dateMax,

					},
					ticks: {
		                callback: function(value, index, values) {
			                return value;
		                }
					}
				}]
			}
		}
	});
};

var makeBlockChart = function(prefix, city){
	var ctx = $("#"+prefix);
	var field = prefix.replace("_bar", "");
	var data = {
		labels : ["Informal", "Formal"],
		datasets: [
			{
				label : "Pre-1990",
				backgroundColor: 'rgba(229,223,227,1.0)',
				borderWidth : 0,
				borderColor : 'rgba(142, 179, 237, 0)',
				data: [city.DataSet[field+"_informal_plot_pre_1990"], city.Region.DataSet[field+"_formal_plot_pre_1990"]]
			},
			{
				label : "Narrow",
				backgroundColor: 'rgba(176,171,174,1.0)',
				borderWidth : 0,
				borderColor : 'rgba(87, 145, 117, 0)',
				data: [city.DataSet[field+"_informal_plot_1990_2015"], city.Region.DataSet[field+"_formal_plot_1990_2015"]]
			},
		]
	};
	var yAxes = [{
		scaleLabel : {
			fontFamily: "DINNextLTProLight",
			fontColor: "#afafaf",	
			display: false,
			labelString: "",
		},
		ticks: {
			beginAtZero:true,
			// max : max,
			callback: function(value, index, values) {
				return Math.floor(value*100)/100 ;
			}
		},
	}];
	var xAxes = [{
		ticks: {
			beginAtZero:true
		},
		gridLines : {
			display: false
		},
	}];
	var myChart = new Chart(ctx, {
		type:  'bar',
		data: data,
		options: {
			legend : {
				position: "right",
				labels : {
					fontFamily: "DINNextLTProLight",
					fontColor: "#afafaf",
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
				yAxes: yAxes,
				xAxes: xAxes
			}
		}
	});
};

var makeRoadChart = function(prefix, city){
	var ctx = $("#"+prefix);
	var field = prefix.replace("_bar", "");
	var data = {
		labels : [city.City.name, "Region", "World"],
		datasets: [
			{
				label : "Wide",
				backgroundColor: '#F1E0DE',
				borderWidth : 0,
				borderColor : 'rgba(142, 179, 237, 1)',
				data: [city.DataSet[field+"_wide_1990_2015"], city.Region.DataSet[field+"_wide_pre_1990"], city.World.DataSet[field+"_wide_pre_1990"]]
			},
			{
				label : "Narrow",
				backgroundColor: '#E1C6C4',
				borderWidth : 0,
				borderColor : 'rgba(87, 145, 117, 1)',
				data: [city.DataSet[field+"_narrow_1990_2015"], city.Region.DataSet[field+"_narrow_1990_2015"], city.World.DataSet[field+"_narrow_1990_2015"]]
			},
			{
				label : "All",
				backgroundColor: '#CEADA9',
				borderWidth : 0,
				borderColor : 'rgba(242, 166, 1, 1)',
				data: [city.DataSet[field+"_all_1990_2015"], city.Region.DataSet[field+"_all_1990_2015"], city.World.DataSet[field+"_all_1990_2015"]]
			},
		]
	};
	var xAxes = [{
		scaleLabel : {
			fontFamily: "DINNextLTProLight",
			fontColor: "#afafaf",
			display: false,
			labelString: "",
		},
		ticks: {
			beginAtZero:true,
			// max : max,
			callback: function(value, index, values) {
				return Math.floor(value*100)/100 ;
			}
		},
	}];
	var yAxes = [{
		ticks: {
			beginAtZero:true
		},
		gridLines : {
			display: false
		},
	}];
	var myChart = new Chart(ctx, {
		type:  'horizontalBar',
		data: data,
		options: {
			legend : {
				position: "right",
				labels : {
					fontFamily: "DINNextLTProLight",
					fontColor: "#afafaf",
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
				yAxes: yAxes,
				xAxes: xAxes
			}
		}
	});
};

var makeChart = function(prefix, city, side){
	side = typeof(side) == "undefined" ? false : true;
	var ctx = $("#"+prefix);
	var field = prefix.replace("_bar", "");
	var suffix_1 = side ? "_pre_1990" : "_t1_t2";
	var suffix_2 = side ? "_1990_2015" : "_t2_t3";
	var data = {
		labels: [city.City.name, "Region",/*city.Region.name.split(" "),*/ "World"],
		datasets: [{
			label: side ? "Pre-1990" : city.City.t1.substr(0,4)+"-"+city.City.t2.substr(0,4),//'T1-T2',
			backgroundColor: "#C8C0C3",
			borderWidth : 0,
			borderColor: "rgba(255,0,0,0)",
			data : [city.DataSet[field+suffix_1], city.Region.DataSet[field+suffix_1], city.World.DataSet[field+suffix_1]]
		},{
			label: side ? "1990-2015" : city.City.t2.substr(0,4)+"-"+city.City.t3.substr(0,4),//'T2-T3',
			backgroundColor: "#F1E4DE",
			borderWidth : 0,
			borderColor: "rgba(172,254,165,0)",
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
			fontFamily: "DINNextLTProLight",
			fontColor: "#afafaf",
			display: false,
			labelString: "",
		},
		ticks: {
			beginAtZero:true,
			// max : max,
			callback: function(value, index, values) {
				return  side ? Math.floor(value*100)/100 : (Math.floor(value*100)/100)+"%";
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
					fontFamily: "DINNextLTProLight",
					fontColor: "#afafaf",
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











