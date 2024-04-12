
const zoomImg = document.querySelectorAll('.zoomable');

zoomImg.forEach(Image => {
    Image.addEventListener('click',()=>{
        const zoomCont = document.createElement('div');
        zoomCont.classList.add('zoomed');

        const zoomImg = document.createElement('img');
        zoomImg.src = Image.src;

        zoomCont.appendChild(zoomImg);
        document.body.appendChild(zoomCont);

        zoomCont.addEventListener('click',()=>{
            zoomCont.remove();
        })
    })
})