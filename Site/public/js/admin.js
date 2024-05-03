const btnModify = document.querySelectorAll('.btn-modify');
console.log(btnModify);

btnModify.forEach((button) => {
    button.addEventListener("click", () => {
        const articleId = button.getAttribute('id');
        console.log("ID DE LARTICLE " + articleId);
        let modifyForm = document.querySelector(".container-modify");
        modifyForm.style.display = "block";
    })
})
