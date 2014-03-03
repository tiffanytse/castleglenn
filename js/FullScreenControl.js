function FullScreenControl(map) {
	var controlDiv = document.createElement('div');
	controlDiv.index = 1;
	controlDiv.style.padding = '5px';

	// Set CSS for the control border.
	var controlUI = document.createElement('div');
	controlUI.style.backgroundColor = 'white';
	controlUI.style.borderStyle = 'solid';
	controlUI.style.borderWidth = '1px';
	controlUI.style.borderColor = '#717b87';
	controlUI.style.cursor = 'pointer';
	controlUI.style.textAlign = 'center';
	controlUI.style.boxShadow = '0px 2px 4px rgba(0,0,0,0.4)';
	controlDiv.appendChild(controlUI);

	// Set CSS for the control interior.
	var controlText = document.createElement('div');
	controlText.style.fontFamily = 'Arial,sans-serif';
	controlText.style.fontSize = '13px';
	controlText.style.paddingTop = '1px';
	controlText.style.paddingBottom = '1px';
	controlText.style.paddingLeft = '6px';
	controlText.style.paddingRight = '6px';
	controlText.innerHTML = '<strong>Full Screen</strong>';
	controlUI.appendChild(controlText);

	var fullScreen = false;
	var interval;
	var mapDiv = map.getDiv();
	var divStyle = mapDiv.style;
	if (mapDiv.runtimeStyle)
		divStyle = mapDiv.runtimeStyle;
	var originalPos = divStyle.position;
	var originalWidth = divStyle.width;
	var originalHeight = divStyle.height;
	
	// IE8 hack
	if (originalWidth == "")
		originalWidth = mapDiv.style.width;
	if (originalHeight == "")
		originalHeight = mapDiv.style.height;
	
	var originalTop = divStyle.top;
	var originalLeft = divStyle.left;
	var originalZIndex = divStyle.zIndex;

	var bodyStyle = document.body.style;
	if (document.body.runtimeStyle)
		bodyStyle = document.body.runtimeStyle;
	var originalOverflow = bodyStyle.overflow;
	
	var goFullScreen = function() {
		var center = map.getCenter();
		mapDiv.style.position = "fixed";
		mapDiv.style.width = "100%";
		mapDiv.style.height = "100%";
		mapDiv.style.top = "0";
		mapDiv.style.left = "0";
		mapDiv.style.zIndex = "100";
		document.body.style.overflow = "hidden";
		controlText.innerHTML = '<strong>Exit full screen</strong>';
		fullScreen = true;
		google.maps.event.trigger(map, 'resize');
		map.setCenter(center);
		// this works around street view causing the map to disappear, which is caused by Google Maps setting the 
		// CSS position back to relative. There is no event triggered when Street View is shown hence the use of setInterval
		interval = setInterval(function() { 
				if (mapDiv.style.position != "fixed") {
					mapDiv.style.position = "fixed";
					google.maps.event.trigger(map, 'resize');
				}
			}, 100);
	};
	
	var exitFullScreen = function() {
		var center = map.getCenter();
		if (originalPos == "")
			mapDiv.style.position = "relative";
		else
			mapDiv.style.position = originalPos;
		mapDiv.style.width = originalWidth;
		mapDiv.style.height = originalHeight;
		mapDiv.style.top = originalTop;
		mapDiv.style.left = originalLeft;
		mapDiv.style.zIndex = originalZIndex;
		document.body.style.overflow = originalOverflow;
		controlText.innerHTML = '<strong>Full Screen</strong>';
		fullScreen = false;
		google.maps.event.trigger(map, 'resize');
		map.setCenter(center);
		clearInterval(interval);
	}
	
	// Setup the click event listener
	google.maps.event.addDomListener(controlUI, 'click', function() {
		if (!fullScreen) {
			goFullScreen();
		}
		else {
			exitFullScreen();
		}
	});
	
	return controlDiv;
}