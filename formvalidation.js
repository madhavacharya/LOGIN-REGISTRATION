const displayMsg=(message,id,colourvalue)=>{
    document.getElementById(id).innerHTML=message
    document.getElementById(id).style.color=colourvalue
}

const fnamevalidate=()=>{
    let first_name= document.querySelector('#firstname').value
    if(first_name==''){
        displayMsg('firstname is mandatory','fnameMsg','red')
        return false
    }
    else if(!first_name.match(/^([A-Za-z])+$/)){
        displayMsg('firstname must contain alphabets','fnameMsg','red')
        return false
    }
    else if(first_name.length<3){
        displayMsg('firstname must be more than two character','fnameMsg','red')
        return false
    }
    else{
        displayMsg('valid firstname','fnameMsg','green')
        return true  
    }
}

const lnamevalidate=()=>{
    let last_name= document.querySelector('#lastname').value
    if(last_name==''){
        displayMsg('lastname is mandatory','lnameMsg','red')
        return false
    }
    else if(!last_name.match(/^([A-Za-z])+$/)){
        displayMsg('lastname must contain alphabets','lnameMsg','red')
        return false
    }
    else if(last_name.length<3){
        displayMsg('lasttname must be more than two character','lnameMsg','red')
        return false
    }
    else{
        displayMsg('valid lasttname','lnameMsg','green')
        return true  
    }
}

const emailvalidate=()=>{
    let email= document.querySelector('#email').value
    if(email==''){
        displayMsg('email is mandatory','emailMsg','red')
        return false
    }
    else if(!email.match(/^([A-Za-z0-9 ])[a-zA-Z0-9\.\_\-]+\@+[a-z]+\.+([a-z])+$/)){
        displayMsg('email must contain alphabets','emailMsg','red')
        return false
    }
    else if(email.length<6){
        displayMsg('email must be more than six character','emailMsg','red')
        return false
    }
    else{
        displayMsg('valid email','emailMsg','green')
        return true  
    }
}
const addressvalidate=()=>{
    let address= document.querySelector('#address').value
    if(address==''){
        displayMsg('address is mandatory','AddressMsg','red')
        return false
    }
    else if(!address.match(/^[A-Za-z0-9 ]+$/)){
        displayMsg('address must contain alphabets or number ','AddressMsg','red')
        return false
    }
    else if(address.length<2){
        displayMsg('address must be more than 2 character','AddressMsg','red')
        return false
    }
    else{
        displayMsg('valid address','AddressMsg','green')
        return true  
    }
}
const dobvalidate=()=>{
    let dob= document.querySelector('#dob').value
    if(dob==''){
        displayMsg('date is mandatory','dobMsg','red')
        return false
    }
    else{
        displayMsg('valid date','dobMsg','green')
        return true  
    }
}
const phonevalidate=()=>{
    let phone= document.querySelector('#phone').value
    if(phone==''){
        displayMsg('phone number is mandatory','phoneMsg','red')
        return false
    }
    else if(phone.length<10){
        displayMsg('phone must be more than 10 character','phoneMsg','red')
        return false
    }
    else if(!phone.match(/^([0-9 ])+$/)){
        displayMsg('phone must contain  number ','phoneMsg','red')
        return false
    }
    else{
        displayMsg('valid phonenumber','phoneMsg','green')
        return true  
    }
}
const passwordvalidate=()=>{
    let pwd= document.querySelector('#pwd').value
    if(pwd==''){
        displayMsg('password is mandatory','passwordMsg','red')
        return false
    }
    else if(pwd.length<8){
        displayMsg('password must be more than 8 character','passwordMsg','red')
        return false
    }
    else if(!pwd.match(/^([A-Za-z0-9 ])+$/)){
        displayMsg('must has  8 character with lowercase uppercase and number  ','passwordMsg','red')
        return false
    }
    else{
        displayMsg('valid password','passwordMsg','green')
        return true  
    }
}
const confirmpasswordvalidate=()=>{
    let pwd=document.querySelector('#pwd').value
    let cpwd= document.querySelector('#cpwd').value
    if(cpwd==''){
        displayMsg('confirm password is mandatory','confirmpasswordMsg','red')
        return false
    }
    else if(cpwd.length<8){ 
        displayMsg(' confirm password must be more than 8 character','confirmpasswordMsg','red')
        return false
    }
    else if(pwd != cpwd){
        displayMsg('password doesnot match','confirmpasswordMsg','red')
        return false 
    }
    else{
        displayMsg('valid password','confirmpasswordMsg','green')
        return true  
    }
}

const validform=()=>{
const captcha=grecaptcha.getResponse()
    if(fnamevalidate()  && lnamevalidate() && emailvalidate() && addressvalidate() && phonevalidate() && dobvalidate()&& passwordvalidate() && confirmpasswordvalidate() && captcha){
        return true
    }
    else{
        return false
    }
}