const header = document.querySelector("header");
window.addEventListner ("scroll",function(){
	header.classlist.toggle ("sticky",window.scrollY>o);
});

let menu= document.querySelector('#menu-icon');
let navbar= document.querySelector('.navbar');

menu.onclick=()=>{
	menu.classList.toggle('bx-x');
	navbar.classList.toggle('open');
};

window.onscroll= ()=>{
	menu.classList.remove('bx-x');
	navbar.classList.remove('open');
}
const form = document.getElementById('form');
const email = document.getElementById('email');

form.addEventListner('submit',e=>{
	e.preventDefault();
	validateInputs();
});
const seterror= (element,message)=>{
	const inputControl=element.parentElement;
	const erroeDisplay=inputControl.querySelector('.error');
	
	errorDisplay.innerText=message;
	inputControl.classList.add('error');
	inputControl.classList.remove('success');

}
const setSuccess = element =>{
	const inputControl =element.parentElement;
	const errorDisplay=inputControl.querySelector('.error');
	
	errorDisplay.innerText='';
	inputControl.classList.add('success');
	inputControl.classList.remove('error');

};
const isValidEmail = email =>{
	const re =/^(([^<>()[\]\\.,;:\s@']+(\.[^<>()[\]\\.,;:s@']+)*)|(".+"))@((\[[0-9]{1,3}\.[[0-9]{1,3}\.[[0-9]{1,3}\.[[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(String (email).toLowerCase());
const validateInputs = () =>{
	const emailValue=amail.value.trim();
};
if(emailValue ===''){
	setError(email, 'Email is required');
}
else if (!isValidEmail(emailValue)){
	setError(email,'Provide a valid email address');
}
else {
	setSuccess(email);
}