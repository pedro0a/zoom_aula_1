const butao = document.querySelector('.butao');
const titulo = document.querySelector('.titulo');
const caixa = document.querySelector('.caixa');
const input = document.querySelector('.field');

// https://jsonplaceholder.typicode.com/users

// function getUsers() {
//   fetch('https://jsonplaceholder.typicode.com/users')
//     .then((res) => res.json())
//     .then((users) => {
//       users.forEach((user) => {
//         const userParagraph = document.createElement('p');
//         userParagraph.innerText = user.name;
//         caixa.appendChild(userParagraph);
//       });
//     })
//     .catch((err) => console.error(err));
// }

// getUsers();

// ASYNC | AWAIT
async function getUsers() {
  try {
    const res = await fetch('https://jsonplaceholder.typicode.com/users');
    const imagens = await res.json();

    imagens.forEach((img) => {
      const imagem = document.createElement('img');
      imagem.src = img.thumbnailUrl;
      caixa.appendChild(imagem);
    });
  } catch (err) {
    console.error(err);
  }
}

getUsers();
