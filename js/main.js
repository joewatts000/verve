var menu = {};
var grid = null;
var altGrid = null;
var msnry;
var team_members = null;
var teamInfoOpen = false;

window.onload = function(){
	setElements();
};

function setElements(){
	menu.btn = document.querySelector('.menu-toggle');
	menu.menu = document.querySelector('header nav');
	menu.btn.addEventListener('click', toggleMenu, false);
	grid = document.querySelector('.grid');
	if (grid && window.innerWidth > 767){
		prepareMasonry();
	}
	altGrid = document.querySelector('.alternating-grid');
	if (altGrid && window.innerWidth > 767){
		prepareAltGrid();
	}

	var map_filter = document.querySelector('.map-filter');
	if (map_filter) {
		map_filter.addEventListener('click', changeMap, false);
	}

	team_members = document.querySelector('.team');
	if(team_members){
		team_members.addEventListener('click', showTeamInfo, false);
	}

	// for (var i = team_members.length - 1; i >= 0; i--) {
	// 	team_members[i].addEventListener('click', function(e){
	// 		document.querySelector('.active-team') && document.querySelector('.active-team').classList.remove('active-team');
	// 		this.classList.add('active-team');
	// 		this.parentElement.querySelector('.captions').style.color = 'transparent';
	// 		document.querySelector('.active-team button').addEventListener('click', function(){
	// 			document.querySelector('.active-team').classList.remove('active-team');
	// 		}, false);
	// 	}, false);
	// }

	if(document.querySelector('.stats')){
		document.addEventListener('scroll', checkStatsPosition, false);	
	}
}

function showTeamInfo(e){

	console.log(teamInfoOpen);

	if (e.target.classList.contains('info') && !teamInfoOpen){
		document.querySelector('.active-team') && document.querySelector('.active-team').classList.remove('active-team');
		e.target.classList.add('active-team');
		e.target.classList.add('top-team');
		teamInfoOpen = true;
	}else if(e.target.parentElement.classList.contains('info') && !teamInfoOpen){
		document.querySelector('.active-team') && document.querySelector('.active-team').classList.remove('active-team');
		e.target.parentElement.classList.add('active-team');
		e.target.parentElement.classList.add('top-team');
		teamInfoOpen = true;
	}else if(e.target.parentElement.parentElement.classList.contains('info') && !teamInfoOpen){
		document.querySelector('.active-team') && document.querySelector('.active-team').classList.remove('active-team');
		e.target.parentElement.parentElement.classList.add('active-team');
		e.target.parentElement.parentElement.classList.add('top-team');
		teamInfoOpen = true;
	}else if(e.target.classList.contains('close-team') && teamInfoOpen){
		document.querySelector('.active-team') && document.querySelector('.active-team').classList.remove('active-team');
		setTimeout(function(){
			teamInfoOpen = false;
			document.querySelector('.top-team').classList.remove('top-team');
		}, 1100);
	}
}

function checkStatsPosition(){
	var stats_section = document.querySelector('.stats');

	if(isElementInViewport(stats_section)){
		document.removeEventListener('scroll', checkStatsPosition, false);
		var stats = document.querySelectorAll('.stat');

		for (var i = stats.length - 1; i >= 0; i--) {
				var total = parseInt(stats[i].dataset.total);
				var anim = stats[i];
				animateStat(stats[i], total);
			}	
	}
}

function animateStat(el, total) {
	var newTimer = setInterval(function(){
		// console.log(el);
		if(parseInt(el.innerText) < total){
			el.innerText = parseInt(el.innerText) + 1;	
		}else {
			clearInterval(newTimer);
		}
	}, 100);
}

function isElementInViewport (el) {

    //special bonus for those using jQuery
    if (typeof jQuery === "function" && el instanceof jQuery) {
        el = el[0];
    }

    var rect = el.getBoundingClientRect();

    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && /*or $(window).height() */
        rect.right <= (window.innerWidth || document.documentElement.clientWidth) /*or $(window).width() */
    );
}

function changeMap(e){
	document.querySelector('.contact-slider.active').classList.remove('active');
	document.querySelector('#' + e.target.dataset.target).classList.add('active');
	document.querySelector('.map-filter button.active').classList.remove('active');
	e.target.classList.add('active');
}

function prepareMasonry(){
	imagesLoaded( grid, function() {
	    msnry = new Masonry( grid, {
	        itemSelector: '.grid-item',
	        columnWidth: '.grid-sizer',
	        percentPosition: true
	    });
	});
}

function prepareAltGrid(){
	var highest = 0;
	var cols = altGrid.querySelectorAll('.columns');

	for (var j = cols.length - 1; j >= 0; j--) {
		if(cols[j].offsetHeight > highest){
			highest = cols[j].offsetHeight;
			console.log(highest);
			for (var i = cols.length - 1; i >= 0; i--) {
				cols[i].style.height = highest + 'px';
			}
		}
	}
}

function toggleMenu(){
	menu.menu.classList.toggle('open');
}