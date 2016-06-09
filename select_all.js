function selectAll() {
	var elem=document.getElementsByClassName('cb');
	var allSelected=true;
	for(i=0;i<elem.length;i++){
		if(elem.item(i).checked==false){
			allSelected=false;
			elem.item(i).click();
		}
	}
	if(allSelected){
		for(o=0;o<elem.length;o++){
			if(elem.item(o).checked==true){
				elem.item(o).click();
			}
		}
	}
}
