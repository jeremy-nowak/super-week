let buttonUsers = document.querySelector('#buttonUsers');
let div = document.querySelector('.result');


buttonUsers.addEventListener('click', async function(e){
    e.preventDefault();


    let promise = await fetch("users")
    let users = await promise.json()
    div.innerHTML = '';

    users.forEach(user => {
        const name = document.createElement("h2");
        const email = document.createElement("h5")

        name.innerHTML = `${user.first_name} ${user.last_name}`;
        div.appendChild(name);

        email.innerHTML = `${user.email}`;
        div.appendChild(email);
        
    });


    




})


// ---------------------------Function------------------------

