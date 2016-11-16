function centerChildDiv(parentContainer, childElement){
	var parentContainerHeight = $(parentContainer).height();
	var childElementHeigh = $(childElement).height();

	var childElementPadding = (parentContainerHeight - childElementHeigh) / 2 - 20;

	// $(childElement).css('padding-top', childElementPadding);
	// $(childElement).css('padding-bottom', childElementPadding);


	
	alert('Hello!');
}