const home = document.querySelector("#btn2");
home.addEventListener("click", () => {
  window.location.href = "/books/";
});
const profile = document.querySelector("#btn3");
profile.addEventListener("click", () => {
  const id = profile.getAttribute("data-id");
  window.location.href = `/profile/?id=${id}`;
});

const tambah = document.querySelector(".btn-tambah");
tambah.addEventListener("click", () => {
  window.location.href = "books/";
});

const update = document.querySelectorAll(".btn-update");
update.forEach((c) => {
  c.addEventListener("click", (e) => {
    const id = e.currentTarget.dataset.id;
    window.location.href = `edit/?id=${id}`;
  });
});

const detail = document.querySelectorAll(".btn-detail");
detail.forEach((c) => {
  c.addEventListener("click", (e) => {
    const id = e.currentTarget.dataset.id;
    window.location.href = `http://localhost/books/detail/?id=${id}`;
  });
});

const deletee = document.querySelectorAll(".btn-delete");
deletee.forEach((c) => {
  c.addEventListener("click", (e) => {
    const id = c.getAttribute("data-id");
    window.location.href = `http://localhost/features/delete.php/?id=${id}`;
  });
});
