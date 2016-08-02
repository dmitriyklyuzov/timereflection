
	function getListingForm(ref, brand, model, material, dial, retail){
		
		document.getElementById('brand-input').value = brand;
		document.getElementById('model-input').value = model;
		document.getElementById('ref-input').value = ref;
		document.getElementById('retail-input').value = retail;
		document.getElementById('material-input').value = material;
		// document.getElementById('dial-input').value = dial;


		document.getElementById('brand-input').disabled = true;
		document.getElementById('model-input').disabled = true;
		// document.getElementById('ref-input').disabled = true;
		document.getElementById('retail-input').disabled = true;
		document.getElementById('material-input').disabled = true;
		// document.getElementById('dial-input').disabled = true;

	}
