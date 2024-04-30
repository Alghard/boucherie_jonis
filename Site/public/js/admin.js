const btnModify = document.querySelectorAll('.btn-modify');
console.log(btnModify);

btnModify.forEach((button) => {
    button.addEventListener("click", (e) => {
        let modifyForm = document.querySelector(".modify-article");
        console.log(modifyForm);
        modifyForm.style.display = "block";
    })
})
