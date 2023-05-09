// ------------------------Display Users-------------------------
let buttonUsers = document.querySelector("#buttonUsers");
let div = document.querySelector(".result");

buttonUsers.addEventListener("click", async function (e) {
  e.preventDefault();

  let promise = await fetch("/super-week/users");
  let users = await promise.json();
  div.innerHTML = "";

  users.forEach((user) => {
    const name = document.createElement("h2");
    const email = document.createElement("h5");

    name.innerHTML = `${user.first_name} ${user.last_name}`;
    div.appendChild(name);

    email.innerHTML = `${user.email}`;
    div.appendChild(email);
  });



});
  // -----------------------Display Books----------------------------
  let buttonBooks = document.querySelector("#buttonBooks");
  let resultBooks = document.querySelector(".resultBooks");

  buttonBooks.addEventListener("click", async function (e) {
    e.preventDefault();

    let promiseBook = await fetch("/super-week/books");
    let books = await promiseBook.json();
    resultBooks.innerHTML = "";
    
    books.forEach((book) => {
      const title = document.createElement("h2");
      const content = document.createElement("h5");

      title.innerHTML = `${book.title}`;
      resultBooks.appendChild(title);

      content.innerHTML = `${book.content}`;
      resultBooks.appendChild(content);
    });
  });
