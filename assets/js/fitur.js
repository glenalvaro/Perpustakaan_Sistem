! function (e) {
	"use strict";

/***************************************************
****************************************************
// Feather Active Js
****************************************************
***************************************************/

$( function() {
	feather.replace()
});

/***************************************************
****************************************************
// Show and hide Search Form JS
****************************************************
***************************************************/
var handleSearchForm = function() {
	$("#search-button").on('click', function () {
		$('body').addClass('search-open');
	});

	$("#close-search").on('click', function () {
		$('body').removeClass('search-open');
	});
};



/***************************************************
****************************************************
// Tooltip & Popover
****************************************************
***************************************************/
var handelTooltipPopoverActivation = function() {
	"use strict";
	if ($('[data-toggle="tooltip"]').length !== 0) {
		$('[data-toggle=tooltip]').tooltip();
	}
	if ($('[data-toggle="popover"]').length !== 0) {
		$('[data-toggle=popover]').popover();
	}
};

/***************************************************
****************************************************
// Slimscroll Active Code
****************************************************
***************************************************/   
if ($.fn.slimscroll) {
	$('#messageBox, #notificationsBox').slimscroll({
		height: '300px',
		size: '2px',
		position: 'right',
		color: '#2D353E',
		alwaysVisible: false,
		distance: '0px',
		railVisible: false,
		wheelStep: 15
	});
}

	
/***************************************************
****************************************************
// Scrollbar
****************************************************
***************************************************/
var handleSlimScroll = function() {
	"use strict";
	$('[data-scrollbar=true]').each( function() {
		generateSlimScroll($(this));
	});
};
var generateSlimScroll = function(element) {
	if ($(element).attr('data-init')) {
		return;
	}
	var dataHeight = $(element).attr('data-height');
		dataHeight = (!dataHeight) ? $(element).height() : dataHeight;

	var scrollBarOption = {
		height: dataHeight, 
		alwaysVisible: false
	};
	if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
		$(element).css('height', dataHeight);
		$(element).css('overflow-x','scroll');
	} else {
		$(element).slimScroll(scrollBarOption);
		$(element).closest('.slimScrollDiv').find('.slimScrollBar').hide();
	}
	$(element).attr('data-init', true);
};


/***************************************************
****************************************************
// Scroll to Top Button
****************************************************
***************************************************/
var handleScrollToTopButton = function() {
	"use strict";
	$(document).scroll( function() {
		var totalScroll = $(document).scrollTop();

		if (totalScroll >= 200) {
			$('[data-click=scroll-top]').addClass('show');
		} else {
			$('[data-click=scroll-top]').removeClass('show');
		}
	});
	$('.content').scroll( function() {
		var totalScroll = $('.content').scrollTop();

		if (totalScroll >= 200) {
			$('[data-click=scroll-top]').addClass('show');
		} else {
			$('[data-click=scroll-top]').removeClass('show');
		}
	});
	$('[data-click=scroll-top]').on('click', function(e) {
		e.preventDefault();
		$('html, body, .content').animate({
			scrollTop: $("body").offset().top
		}, 500);
	});
};


/***************************************************
****************************************************
// Application Controller
****************************************************
***************************************************/
var App = function () {
	"use strict";
	
	return {
		init: function () {
			this.initComponent();
		},
		initComponent: function() {
			handleSearchForm();
			handleSlimScroll();			
			handelTooltipPopoverActivation();
			handleScrollToTopButton();
		},
		scrollTop: function() {
			$('html, body, .content').animate({
				scrollTop: $('body').offset().top
			}, 0);
		}
	};
}();

$(document).ready(function() {
	App.init();
});

}(jQuery);


//grafik bar di dashboard
! function (e) {
   "use strict";

   // Annual Report Chat
   var a = {
      chart: {
         height: 300,
         width: '100%',
         type: "line",
         stacked: false,
         fontFamily: "IBM Plex Sans, sans-serif",
         foreColor: "#6780B1",
      },
      stroke: {
         width: [1, 2, 3, 4],
         curve: "smooth"
      },
      plotOptions: {
         bar: {
            columnWidth: '25%'
         }
      },
      colors: ["#65e0e0", "#f49917", "#66a4fb"],
      series: [{
         name: "Today Sales",
         type: "column",
         data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30, 21]
      }, {
         name: "Today Earning",
         type: "line",
         data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43, 41]
      }, {
         name: "Average Order",
         type: "bar",
         data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43, 56]
      }],
      fill: {
         opacity: [0.85, 0.25, 1, 1],
         gradient: {
            inverseColors: false,
            shade: "light",
            type: "vertical",
            opacityFrom: 0.5,
            opacityTo: 0.1,
            stops: [0, 100, 100, 100]
         }
      },
      labels: ["01/01/2003", "02/01/2003", "03/01/2003", "04/01/2003", "05/01/2003", "06/01/2003", "07/01/2003", "08/01/2003", "09/01/2003", "10/01/2003", "11/01/2003", "12/01/2003"],
      markers: {
         size: 0
      },
      xaxis: {
         type: "datetime"
      },
      yaxis: {
         min: 0
      },
      tooltip: {
         shared: true,
         intersect: false,
         y: {
            formatter: function (i) {
               if (typeof i !== "undefined") {
                  return i.toFixed(0) + ""
               }
               return i
            }
         }
      },
      legend: {
         labels: {
            useSeriesColors: true
         },
      }
   };
   var e = new ApexCharts(document.querySelector("#salesBarChart"), a);
   e.render()


   // Profit Pie
   var donut1 = new Chartist.Pie('#salesDonut1', {
      series: [30, 40, 50]
   }, {
      donut: true,
      donutWidth: 15,
      donutSolid: false,
      startAngle: 20,
      showLabel: false
   });


   // Revenue Pie
   var donut1 = new Chartist.Pie('#salesDonut2', {
      series: [40, 30, 60]
   }, {
      donut: true,
      donutWidth: 15,
      donutSolid: false,
      startAngle: 20,
      showLabel: false
   });


   //Stacked Bar Chart
   $.plot('#stackedBarChart', [{
      data: data1,
      color: '#e1e5ed',
      lines: {
         lineWidth: 1
      }
   }, {
      data: data2,
      color: '#69b2f8',
      lines: {
         lineWidth: 1
      }
   }, {
      data: data3,
      color: '#23BF08'
   }], {
      series: {
         stack: 0,
         shadowSize: 0,
         lines: {
            show: true,
            lineWidth: 1.7,
            fill: true,
            fillColor: {
               colors: [{
                  opacity: 0
               }, {
                  opacity: 0.5
               }]
            }
         }
      },
      grid: {
         borderWidth: 0,
         labelMargin: 5,
         hoverable: true
      },
      yaxis: {
         show: true,
         color: 'rgba(72, 94, 144, .1)',
         min: 0,
         max: 120,
         font: {
            size: 10,
            color: '#8392a5'
         }
      },
      xaxis: {
         show: true,
         color: 'rgba(72, 94, 144, .1)',
         ticks: [
            [0, '08:00'],
            [20, '09:00'],
            [40, '10:00'],
            [60, '11:00'],
            [80, '12:00'],
            [100, '13:00'],
            [120, '14:00'],
            [140, '15:00']
         ],
         font: {
            size: 10,
            family: 'IBM Plex Sans", sans-serif',
            color: '#8392a5'
         },
         reserveSpace: false
      }
   });

   // Float Bar Chat
   var flotChartOption1 = {
      series: {
         shadowSize: 0,
         bars: {
            show: true,
            lineWidth: 0,
            barWidth: .5,
            fill: 1
         }
      },
      grid: {
         aboveData: true,
         color: '#e5e9f2',
         borderWidth: 0,
         labelMargin: 0
      },
      yaxis: {
         show: false,
         min: 0,
         max: 15
      },
      xaxis: {
         show: false
      }
   };

   $.plot('#flotBarRecentOrders', [{
      data: data6,
      color: '#66a4fb'
   }], flotChartOption1);


   $.plot('#flotBarCompleteOrders', [{
      data: data7,
      color: '#e83e8c'
   }], flotChartOption1);

}(jQuery);