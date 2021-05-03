

function doValidate() {
	const username = document.getElementById('username');
	const email = document.getElementById('email');
	const phone = document.getElementById('phone');
	const checkin = document.getElementById('checkin');
	const btime = document.getElementById('btime');
	const guest = document.getElementById('guest');
		alert("naani");			
    console.log('Validating...');
    try {
		
		
		const usernameValue = username.value.trim();
		const emailValue = email.value.trim();
		const phoneValue = phone.value.trim();
		const checikinValue = checkin.value.trim();
		const btimeValue = btime.value.trim();
		const guestValue =guest.value.trim();
		alert(checikinValueValue);	
		
        if(usernameValue === '') {
		alert('Username cannot be blank');
		return false;
		}
		
		if(emailValue === '') {
		alert('Email cannot be blank');
		} else if (!isEmail(emailValue)) {
		alert('Not a valid email');
		return false;
		}
		
		if(phoneValue === '') {
		alert('phone number cannot be blank');
		return false;
		}	

		if(checkinValue === '') {
		alert('checkin cannot be blank');
		return false;
		}
		
		if(btimeValue === '') {
		alert('Booking time cannot be blank');
		return false;
		} 
		
		if(guestValue === '') {
		alert('guest cannot be blank');
		return false;
		}  
        return true;
		} catch(e) {
        return false;
		}
		return false;
}
	
function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}