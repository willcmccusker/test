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
					// makeGraph("density_built_up_change", city);
					makeChart("density_built_up_change", city);
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
	        		height : 500,

	                ticks: {
	                    beginAtZero:true
	                },
			    	// stacked : true,
	        	}],
	            xAxes: [{
			    	// stacked : true,
	                ticks: {
	                    beginAtZero:true
	                },
	                gridLines : {
			    		display: false
			    	},
	            }]
	        }
	    }
	});
};











