document.querySelector('#overview').addEventListener('click', () => {
    document.querySelector('.footer-disclaimer').style.display = 'block';
    document.querySelector('.comp-comment').style.display = 'none';

    document.querySelector('#overview').classList.add('active');
    document.querySelector('#review').classList.remove('active');
});

document.querySelector('#review').addEventListener('click', () => {
    document.querySelector('.footer-disclaimer').style.display = 'none';
    document.querySelector('.comp-comment').style.display = 'block';

    document.querySelector('#review').classList.add('active');
    document.querySelector('#overview').classList.remove('active');
});

document.querySelector('#write-review').addEventListener('click', () => {
    document.querySelector('#review').scrollIntoView({
        behavior: 'smooth'
    });
    document.querySelector('.footer-disclaimer').style.display = 'none';
    document.querySelector('.comp-comment').style.display = 'block';

    document.querySelector('#review').classList.add('active');
    document.querySelector('#overview').classList.remove('active');
});

document.querySelector('#see-more').addEventListener('click', () => {
    document.querySelector('#review').scrollIntoView({
        behavior: 'smooth'
    });
    document.querySelector('.footer-disclaimer').style.display = 'none';
    document.querySelector('.comp-comment').style.display = 'block';

    document.querySelector('#review').classList.add('active');
    document.querySelector('#overview').classList.remove('active');
});

