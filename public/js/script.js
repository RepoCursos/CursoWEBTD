window.addEventListener('load', (event) => {

    let btnPeticionAjax = document.getElementById('btnPeticionAjax');
    btnPeticionAjax.addEventListener('click', function() {

        fetch('api/json')
        .then(response => response.json())
        .then(response => { 
            console.log(response);
        })
    });
});