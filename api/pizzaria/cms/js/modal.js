//GET MODAL ELEMENTS 
var modal = document.getElementById('modal_produtos');

//GET OPEN MODAL BUTTON
var modalBtn = document.getElementById('modalBtn');

//GET CLOSE MODAL BUTTON
var closeBtn = document.getElementById('closeBtn');

//LISTEN FOR OPEN CLICK
modalBtn.addEventListener('click', openModal);

//LISTEN FOR CLOSE CLICK
closeBtn.addEventListener('click', closeModal);

//LISTEN OR THE OUTSIDE CLICK 
window.addEventListener('click', clickOutside);

//FUNCTION TO OPEN MODAL
function openModal(){
	modal.style.display = 'block';
}

//FUNCTION TO CLOSE MODAL
function closeModal(){
	modal.style.display = 'none';
}

//FUNCTION TO OUTSIDE CLOSE MODAL
function clickOutside(e){
	if(e.target == modal){
		modal.style.display = 'none';
	}
}