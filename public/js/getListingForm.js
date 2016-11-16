function getListingForm(ref, brand, model, material, caseSize){
	
	document.getElementById('ref-input').value = ref;
	document.getElementById('brand-input').value = brand;
	document.getElementById('model-input').value = model;
	document.getElementById('material-input').value = material;
	document.getElementById('caseSize-input').value = caseSize + 'mm';

	document.getElementById('brand-input').disabled = true;
	document.getElementById('model-input').disabled = true;
	document.getElementById('material-input').disabled = true;
	document.getElementById('caseSize-input').disabled = true;

}